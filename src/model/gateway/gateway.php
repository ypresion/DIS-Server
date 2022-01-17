<?php

namespace src\model\gateway;

use src\model as Model;

/**
 * An abstract Gateway class.
 * 
 * This class provides basic methods for interacting with 
 * provided database.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
abstract class Gateway {

    private $database;
    private $result;

    protected function setDatabase($database) {
        $this->database = new Model\Database($database);
    }

    protected function getDatabase() {
        return $this->database;
    }

    protected function setResult($result) {
        $this->result = $result;
    }

    public function getResult() {
        return $this->result;
    }
}