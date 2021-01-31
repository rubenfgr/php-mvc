<?php

final class FruitModel extends BaseModel
{
    private string $_table;

    public function __construct(PDO $conn)
    {
        $this->_table = "mvc_fruit";
        parent::__construct($this->_table, $conn);
    }
}
