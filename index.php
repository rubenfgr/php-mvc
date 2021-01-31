<?php

spl_autoload_register(
    function ($name) {
        $pathConfig         = 'app/config/' . $name . '.php';
        $pathControllers    = 'app/controller/' . $name . '.php';
        $pathCore           = 'app/core/' . $name . '.php';
        $pathModel          = 'app/model/' . $name . '.php';
        $pathModelEntity    = 'app/model/entity/' . $name . '.php';
        $pathModelEnums     = 'app/model/enums/' . $name . '.php';

        if (file_exists($pathConfig)) {
            include_once $pathConfig;
        }
        if (file_exists($pathControllers)) {
            include_once $pathControllers;
        }
        if (file_exists($pathCore)) {
            include_once $pathCore;
        }
        if (file_exists($pathModel)) {
            include_once $pathModel;
        }
        if (file_exists($pathModelEntity)) {
            include_once $pathModelEntity;
        }
        if (file_exists($pathModelEnums)) {
            include_once $pathModelEnums;
        }
    }
);
ControllerFunc::launchControllerAction();
