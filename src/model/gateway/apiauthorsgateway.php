<?php

namespace src\model\gateway;

class ApiAuthorsGateway extends Gateway  {

    public function __construct() {
        $this->setDatabase(DIS_DATABASE);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM author";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    public function findOne($id)
    {
        $sql = "SELECT * FROM author WHERE author_id = :id";
        $params = ["id" => $id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }
}