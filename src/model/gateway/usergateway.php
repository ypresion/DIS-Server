<?php

namespace src\model\gateway;

/**
 * An implementation of user gateway for the API.
 * 
 * This class is provides a method for finding a password 
 * hash for email given.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class UserGateway extends Gateway {

    public function __construct() {
        $this->setDatabase(USER_DATABASE);
    }

    public function findPassword($email)
    {
        $sql = " Select id, password from user where email = :email";
        $params = [":email" => $email];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }
}
