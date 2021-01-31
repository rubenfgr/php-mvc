<?php

final class MainController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->view("Wellcome", []);
    }
}
