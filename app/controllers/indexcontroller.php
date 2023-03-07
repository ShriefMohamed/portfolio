<?php


namespace Framework\controllers;


use Framework\Lib\AbstractController;
use Framework\models\WorkModel;

class IndexController extends AbstractController
{
    public function DefaultAction()
    {
        $work = WorkModel::getAllWork("WHERE work.status = 1 ORDER BY work.work_order LIMIT 6 ");
        $this->_template
            ->SetData(['work' => $work])
            ->SetViews(['leftbar', 'view'])
            ->Render();
    }

    public function PortfolioAction()
    {
        $work = WorkModel::getAllWork("WHERE work.status = 1 ");
        $this->_template
            ->SetData(['work' => $work])
            ->SetViews(['leftbar', 'view'])
            ->Render();
    }

    public function WorkAction()
    {
        $sub = ($this->_params) != null ? $this->_params[0] : false;
        if ($sub !== false) {
            $work = WorkModel::getAll(" WHERE subDomain = '$sub' ", true);

            $this->_template
                ->SetData(['work' => $work])
                ->SetViews(['leftbar', 'view'])
                ->Render();
        }
    }

    public function ContactAction()
    {
        $this->_template->SetViews(['leftbar', 'view'])->Render();
    }
}