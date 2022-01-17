<?php

namespace src\model\gateway;

/**
 * An implementation of awards gateway for the API.
 * 
 * This class is provides a method for fiding all of the awards
 * available.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
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