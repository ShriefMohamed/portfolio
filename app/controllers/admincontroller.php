<?php


namespace Framework\controllers;


use Framework\Lib\AbstractController;
use Framework\lib\Cipher;
use Framework\lib\FilterInput;
use Framework\lib\Helper;
use Framework\lib\Request;
use Framework\Lib\Session;
use Framework\models\ClientsModel;
use Framework\models\PasswordsModel;
use Framework\models\UsersModel;

class AdminController extends AbstractController
{
    public function DefaultAction()
    {
        $users = UsersModel::Count();
        $admins = UsersModel::Count(" WHERE role = 'admin' ");
        $collaborators = UsersModel::Count(" WHERE role = 'collaborator' ");
        $clients = ClientsModel::Count();
        $passwords = PasswordsModel::Count();

        $this->_template
            ->SetData([
                'users' => $users,
                'admins' => $admins,
                'collaborators' => $collaborators,
                'clients' => $clients,
                'passwords' => $passwords
            ])
            ->SetViews([
                'topbar', 'leftbar', 'view'
            ])
            ->Render();
    }

    public function SearchAction()
    {
        if (Request::Check('q', 'get')) {
            $query = FilterInput::String(Request::Get('q', false, true));
            if ($query) {
                $passwords = PasswordsModel::Search($query);
                $users = UsersModel::Search($query);
                $clients = ClientsModel::Search($query);

                $this->_template->SetData([
                    'passwords' => $passwords,
                    'users' => $users,
                    'clients' => $clients
                    ])
                    ->SetViews(['topbar', 'leftbar', 'view'])
                    ->Render();
            }
        }
    }

    public function Check_passwordAction()
    {
        $target_password = Request::Post('target-password', false, true);
        $password = Helper::Hash(Request::Post('password', false, true));

        $authenticate = UsersModel::Authenticate(Session::Get('loggedin')->email, $password);

        $response = ''; $client = ''; $username = ''; $dec_password = '';
        if ($authenticate) {
            $response = 1;
            $res_password = PasswordsModel::getPasswords(" WHERE passwords.id = '$target_password' ", true);
            if ($res_password) {
                $cipher = new Cipher();
                $client = $res_password->name;
                $username = $res_password->username;
                $dec_password = $cipher->Decrypt($res_password->password);
            }
        } else {
            $response = 2;
        }

        die(json_encode(array(
            'response' => $response,
            'client' => $client,
            'username' => $username,
            'password' => $dec_password
        )));
    }


    /* Users Section */
    public function UsersAction()
    {
        $type = Request::Get('type', false, true);
        $filter = Request::Get('filter', false, true);

        $condition = '';
        if ($type) {
            $condition = " WHERE role = '$type' ";
        } elseif ($filter) {
            $condition = " WHERE id = '$filter' ";
        }

        $users = UsersModel::getAll($condition);
        $this->_template->SetData(['data' => $users])
            ->SetViews(['topbar', 'leftbar', 'view'])
            ->Render();
    }

    public function User_addAction()
    {
        if (Request::Check('submit')) {
            $item = new UsersModel();
            $item->firstName = FilterInput::String(Request::Post('firstName', false, true));
            $item->lastName = FilterInput::String(Request::Post('lastName', false, true));
            $item->username = FilterInput::String(Request::Post('username', false, true));
            $item->email = FilterInput::Email(Request::Post('email', false, true));
            $item->password = Helper::Hash(Request::Post('password', false, false));
            $item->phone = FilterInput::String(Request::Post('phone', false, true));
            $item->role = FilterInput::String(Request::Post('role', false, true));

            $check_username = UsersModel::Count(" WHERE username = '$item->username' ");
            $check_email = UsersModel::Count(" WHERE email = '$item->email' ");
            $check_phone = UsersModel::Count(" WHERE phone = '$item->phone' ");

            if ($check_email > 0) {
                $this->logger->error("Failed to create new User", array('error: ' => "Email already exists" ,'Admin' => Session::Get('loggedin')->username));
                Session::Set('messages', array('error', 'Failed to create user, Email already exists!'));
            } elseif ($check_username > 0) {
                $this->logger->error("Failed to create new User", array('error: ' => "Username already exists" ,'Admin' => Session::Get('loggedin')->username));
                Session::Set('messages', array('error', 'Failed to create user, Username already exists!'));
            } elseif ($check_phone > 0) {
                $this->logger->error("Failed to create new User", array('error: ' => "Phone number already exists" ,'Admin' => Session::Get('loggedin')->username));
                Session::Set('messages', array('error', 'Failed to create user, Phone number already exists!'));
            } else {
                if ($item->Save()) {
                    $this->logger->info("Created new User", array('user_id' => $item->id ,'Admin' => Session::Get('loggedin')->username));
                    Session::Set('messages', array('success', 'New User Was Created Successfully.'));
                    header("location: " . HOST_NAME . 'admin/users');
                } else {
                    $this->logger->error("Failed to create new User", array('error: ' => "Unknown saving error" ,'Admin' => Session::Get('loggedin')->username));
                    Session::Set('messages', array('error', 'Failed to create user, Unknowing Error!'));
                }
            }
        }

        $this->_template->SetViews(['topbar', 'leftbar', 'view'])
            ->Render();
    }

    public function User_editAction()
    {
        $id = ($this->_params) != null ? $this->_params[0] : false;
        if ($id !== false) {
            $user = UsersModel::getOne($id);

            if (Request::Check('submit')) {
                $item = new UsersModel();
                $item->id = $id;
                $item->firstName = FilterInput::String(Request::Post('firstName', false, true));
                $item->lastName = FilterInput::String(Request::Post('lastName', false, true));
                $item->username = FilterInput::String(Request::Post('username', false, true));
                $item->email = FilterInput::Email(Request::Post('email', false, true));
                $item->password = Helper::Hash(Request::Post('password', false, false));
                $item->phone = FilterInput::String(Request::Post('phone', false, true));
                $item->role = FilterInput::String(Request::Post('role', false, true));
                $item->lastUpdate = date('Y-m-d h:i:s');

                $check_email = UsersModel::Count(" WHERE email = '$item->email' ");
                $check_username = UsersModel::Count(" WHERE username = '$item->username' ");
                $check_phone = UsersModel::Count(" WHERE phone = '$item->phone' ");

                if ($check_email > 0 && $user->email !== $item->email) {
                    $this->logger->error("Failed to update User", array('error: ' => "Email already exists" ,'Admin' => Session::Get('loggedin')->username));
                    Session::Set('messages', array('error', 'Failed to update user, Email already exists!'));
                } elseif ($check_username > 0 && $user->username !== $item->username) {
                    $this->logger->error("Failed to update User", array('error: ' => "Username already exists" ,'Admin' => Session::Get('loggedin')->username));
                    Session::Set('messages', array('error', 'Failed to update user, Username already exists!'));
                } elseif ($check_phone > 0 && $user->phone !== $item->phone) {
                    $this->logger->error("Failed to update User", array('error: ' => "Phone number already exists" ,'Admin' => Session::Get('loggedin')->username));
                    Session::Set('messages', array('error', 'Failed to update user, Phone number already exists!'));
                } else {
                    if ($item->Save()) {
                        $this->logger->info("Updated User", array('user_id' => $item->id ,'Admin' => Session::Get('loggedin')->username));
                        Session::Set('messages', array('success', 'User Was Updated Successfully.'));
                        header("location: " . HOST_NAME . 'admin/users');
                    } else {
                        $this->logger->error("Failed to update User, Unknown saving error.", array('user_id' => $item->id ,'Admin' => Session::Get('loggedin')->username));
                        Session::Set('messages', array('error', 'Failed to update user, Unknowing Error!'));
                    }
                }
            }

            $this->_template->SetData(['user' => $user])
                ->SetViews(['topbar', 'leftbar', 'view'])
                ->Render();
        }
    }

    public function User_deleteAction()
    {
        $id = ($this->_params) != null ? $this->_params[0] : false;
        if ($id !== false) {
            $item = new UsersModel();
            $item->id = $id;

            if ($item->Delete()) {
                $this->logger->info("Deleted User", array('user_id' => $item->id ,'Admin' => Session::Get('loggedin')->username));
                Session::Set('messages', array('success', 'User Was Deleted Successfully.'));
                header("location: " . HOST_NAME . 'admin/users');
            } else {
                $this->logger->error("Failed to delete User, Unknown error.", array('user_id' => $item->id ,'Admin' => Session::Get('loggedin')->username));
                Session::Set('messages', array('error', 'Failed to delete user, Unknowing Error!'));
            }
        }
    }
    /* End Users Section */




    public function ProfileAction()
    {
        $user = UsersModel::getOne(Session::Get('loggedin')->id);
        $this->_template->SetData(['user' => $user])
            ->SetViews(['topbar', 'leftbar', 'view'])
            ->Render();
    }

    public function SignoutAction()
    {
        Session::Remove('loggedin');
        header("location: " . HOST_NAME . 'login');
    }
}