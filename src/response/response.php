<?php

namespace src\response;

/**
 * The data is no longer passed to the constructor as a parameter
 * instead there is a public setData() method for adding data.
 */
abstract class Response 
{
    protected $data;

    public function __construct() {
        $this->headers();
    }

    protected function headers() {

    }

    public function setData($data) {
        $this->data = $data;
    }    

    public function getData() {
        return $this->data;
    }
}