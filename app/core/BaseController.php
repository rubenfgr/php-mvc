<?php

abstract class BaseController extends ConnectDB
{
    protected PDO $conn;

    protected function __construct()
    {
        parent::__construct();
        $this->conn = $this->connect();
    }

    protected function view($view, array $data)
    {
        foreach ($data as $key => $value) {
            ${$key} = $value;
        }
        $content = $view . 'View.php';
        include_once GlobalConfig::DEFAULT_DIR_VIEW . '/IndexView.php';
    }

    protected function redirect($controller, $action)
    {
        if (!isset($controller)) {
            $controller = GlobalConfig::DEFAULT_CONTROLLER;
        }
        if (!isset($action)) {
            $action = GlobalConfig::DEFAULT_ACTION;
        }
        $url = "index.php?controller=" . $controller .
            "&action=" . $action;
        header("Location:" . $url);
    }
}
