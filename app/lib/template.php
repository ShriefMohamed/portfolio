<?php


namespace Framework\lib;


class Template
{
    private $controller;
    private $action;
    private $title;
    private $view;
    private $views = array();
    private $date = array();

    public function __construct($controller, $action)
    {
        if ($action == FrontController::NOT_FOUND_ACTION) {
            $this->view = VIEWS_PATH . 'notfound' . DS . 'notfound';
            $action = 'notfound';
        } else {
            $this->view = VIEWS_PATH . $controller . DS . $action;
        }
        $this->title = ucfirst($controller) . ' - ' . ucfirst($action);
        $this->controller = $controller;
        $this->action = $action;
    }

    public function SetData($data)
    {
        $this->date = $data;
        return $this;
    }

    public function SetViews($views)
    {
        $this->views = $views;
        return $this;
    }

    public function Render()
    {
        if (!empty($this->views)) {
            if ($this->date) {extract($this->date);}

            require_once TEMPLATE_PATH . 'head.php';
            foreach ($this->views as $value) {
                if ($value !== 'view') {
                    if (file_exists(TEMPLATE_PATH . $value . '.php')) {
                        require_once TEMPLATE_PATH . $value . '.php';
                    }
                } else {
                    if (file_exists($this->view . '.php')) {
                        require_once $this->view . '.php';
                    } else {
                        require_once VIEWS_PATH . 'notfound' . DS . 'notfound.php';
                    }
                }
            }
            require_once TEMPLATE_PATH . 'footer.php';
        }
    }

    public function LoadTemplate($value)
    {
        if (file_exists(TEMPLATE_PATH . $value . '.php')) {
            require_once TEMPLATE_PATH . $value . '.php';
        }
    }
}