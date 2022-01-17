<?php

namespace src\model\gateway;

/**
 * An implementation of authors gateway for the API.
 * 
 * This class is provides methods for finding authors of DIS papers.
 * It queries the DIS database to find author by ID or return the 
 * author list.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
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