<?php

final class ControllerFunc
{
    /**
     * Comprueba si existen los parámetros controller y action. Si existen
     * y son correcto llama al controlador con la acción, si no lanza
     * el controlador con la acción por defecto
     *
     * @return void
     */
    public static function launchControllerAction()
    {
        $controllerObj = ControllerFunc::loadController();

        $action = isset($_GET['action']) && !empty($_GET['action']) ?
            trim($_GET['action']) : null;
        
        
        if ($action && method_exists($controllerObj, $action)) {
            $controllerObj->$action();
        } else {
            $action = GlobalConfig::DEFAULT_ACTION;
            $controllerObj->$action();
        }
    }

    private static function loadController()
    {
        $controller = GlobalConfig::DEFAULT_CONTROLLER.'Controller';
        if (isset($_GET["controller"]) || !empty($_GET["controller"])) {
            $controllerGet = ucwords($_GET["controller"]).'Controller';
            $strFileController = 'app/controller/'.$controllerGet.'.php';
            if (is_file($strFileController)) {
                $controller = $controllerGet;
            }
        }
        return new $controller();
    }
}
