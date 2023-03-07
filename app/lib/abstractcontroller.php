<?php

namespace Framework\Lib;


use Framework\models\UsersModel;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

//Load Composer's autoloader
require APP_PATH . 'vendor/autoload.php';


// all the controllers extends this abstract controller
class AbstractController
{
	protected $_controller;
	protected $_action;
	protected $_params;
	protected $_template;
	public $logger;

	public function __construct()
    {
        // Set Log
        $dateFormat = "Y-m-d H:i:s a";
        $output = "[%datetime%] %channel%.%level_name%: %message% %context%*\n";
        $formatter = new LineFormatter($output, $dateFormat);

        $stream = new StreamHandler(LOG_FILE, Logger::DEBUG);
        $stream->setFormatter($formatter);

        $this->logger = new Logger('logs.Portfolio');
        $this->logger->pushHandler($stream);
        $this->logger->pushHandler(new FirePHPHandler());

        // Set last activity for admins
        if (Session::Exists('loggedin') && Session::Get('loggedin')->role == 'admin') {
            $user = new UsersModel();
            $user->id = Session::Get('loggedin')->id;
            $user->lastSeen = date('Y-m-d h:i:s', SERVER_TIMESTAMP);
            $user->Save();
        }
    }

    ##### NotFoundAction ##########
	// Parameters :- None
	// Return Type :- None
	// Purpose :- at the frontcontroller if the controller class or the function/action doesn't exist then the not found
	// action is the one that get called to display a 404 not found
	###########################
	public function NotFoundAction()
	{
	    $this->_template->SetViews(['view'])->Render();
	}

	public function SetControllerActionParams($controllerName, $actionName, $params)
    {
        $this->_controller = $controllerName;
        $this->_action = $actionName;
        $this->_params = $params;

        $this->InitializeTemplate();
    }

    public function InitializeTemplate()
    {
        $this->_template = new Template($this->_controller, $this->_action);
    }
}
