<?php

/**
 * Clase base para los modelos
 */
abstract class BaseModel
{
    protected PDO $conn;
    protected string $table;

    /**
     * Constructor de la clase
     *
     * @param string $table
     */
    protected function __construct(string $table, PDO $conn)
    {
        $this->table = $table;
        $this->conn = $conn;
    }

    /**
     * Ejecución de cualquier consulta sobre la base de datos
     *
     * @param  string $sql_querry
     * @return void
     */
    public function querySQL(string $sql_query)
    {
        return $this->conn->prepare($sql_query)->execute();
    }

    /**
     * Ejecutar cualquier modificación sobre la base de datos
     *
     * @param string $sql_exec
     * @return void
     */
    public function execSQL(string $sql_exec)
    {
        return $this->conn->exec($sql_exec);
    }


    /**
     * Obtiene todas las filas de la DB
     *
     * @return array
     */
    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una fila por su ID
     *
     * @param  integer $id
     * @return void
     */
    public function getById(int $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una fila por un campo y su valor
     *
     * @param  string $column
     * @param  [type] $value
     * @return void
     */
    public function getBy(string $column, $value)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE $column = '$value'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Eliminar una fila por su ID
     *
     * @param  integer $id
     * @return int
     */
    public function deleteById(int $id)
    {
        return $this->conn->exec("DELETE FROM $this->table WHERE id = $id");
    }

    /**
     * Elimina una fila por un campo y su valor
     *
     * @param  string $column
     * @param  [type] $value
     * @return int
     */
    public function deleteBy(string $column, $value)
    {
        return $this->conn->exec("DELETE FROM $this->table WHERE $column = $value");
    }

    /**
     * Inserta una fila pasando una instancia de la clase
     *
     * @param  object $obj
     * @return bool
     */
    public function insert(array $array)
    {
        $keys = join(",", array_keys($array));
        $values = join(",", array_values($array));
        $sql = "INSERT INTO $this->table ($keys) VALUES ($values)";
        return $this->conn->prepare($sql)->execute();
    }

    /**
     * Actualiza una fila pasando una instancia de la clase
     *
     * @param  object $obj
     * @return void
     */
    public function update(array $array)
    {
        $sql = "UPDATE $this->table ";
        foreach ($array as $key => $value) {
            $sql .= "SET $key = $value ";
        }
        $sql .= "WHERE id = " . $array['id'];
        return $this->conn->prepare($sql)->execute();
    }
}
