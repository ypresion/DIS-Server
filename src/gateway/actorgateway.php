<?php

namespace src\gateway;

class ActorGateway extends Gateway  {

    public function __construct() {
        $this->setDatabase(DATABASE);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM actor";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    public function findOne($id)
    {
        $sql = "SELECT * FROM actor WHERE actor_id = :id";
        $params = ["id" => $id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }
}