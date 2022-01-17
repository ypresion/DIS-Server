<?php

namespace src\model\gateway;

/**
 * An implementation of reading list gateway for the API.
 * 
 * This class is provides methods for finding, adding and 
 * removing user's reading list items.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ListGateway extends Gateway  {

    public function __construct() {
        $this->setDatabase(USER_DATABASE);
    }

    public function findAll($user_id)
    {
        $sql = "SELECT DISTINCT paper_id FROM list WHERE user_id = :id";
        $params = ["id" => $user_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function add($user_id, $paper_id)
    {
        $sql = "INSERT INTO list (user_id, paper_id) VALUES (:user_id, :paper_id)";
        $params = ["user_id" => $user_id, "paper_id" => $paper_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function remove($user_id, $paper_id)
    {
        $sql = "DELETE from list WHERE (user_id = :user_id) AND (paper_id = :paper_id)";
        $params = ["user_id" => $user_id, "paper_id" => $paper_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

}