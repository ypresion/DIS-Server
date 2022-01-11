<?php

namespace src\model\gateway;

class ApiAwardsGateway extends Gateway  {

    public function __construct() {
        $this->setDatabase(DIS_DATABASE);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM award_type";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

}