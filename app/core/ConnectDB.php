<?php

/**
 * Clase abstracta para cargar los datos de configuración de la
 * base de datos, conectar y desconectar
 */
abstract class ConnectDB
{
    private string $_driver;
    private string $_host;
    private string $_user;
    private string $_pass;
    private string $_database;

    /**
     * Constructor
     */
    protected function __construct()
    {
        $this->_driver   = DBConf::DRIVER;
        $this->_host     = DBConf::HOST;
        $this->_user     = DBConf::USER;
        $this->_pass     = DBConf::PASS;
        $this->_database = DBConf::DATABASE;
    }

    /**
     * Realiza una nueva conexión con la base de datos o lanza una
     * excepción en caso de no conseguirlo
     *
     * @return PDO
     */
    protected function connect()
    {
        try {
            return new PDO("$this->_driver:host=$this->_host;dbname=$this->_database", $this->_user, $this->_pass);
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    /**
     * Si existe una conexión abierta la elimina igualando
     * la instancia de PDO a null
     *
     * @return void
     */
    protected function disconnect()
    {
        if (isset($this->conn)) {
            $this->conn = null;
        }
    }
}
