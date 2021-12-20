<?php

namespace src\model\gateway;

use src\model as Model;

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