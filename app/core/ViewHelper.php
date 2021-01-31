<?php

final class ViewHelper
{
    /**
     * Devuelve la url con los parámetros de controller y action
     *
     * @param string $controlador
     * @param string $accion
     * @return void
     */
    public function url(
        string $controlador = GlobalConfig::DEFAULT_CONTROLLER,
        string $action = GlobalConfig::DEFAULT_ACTION
    ) {
        $urlString = "index.php?controller=" . $controlador . "&action=" . $action;
        return $urlString;
    }
}
