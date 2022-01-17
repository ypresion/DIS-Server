<?php

namespace src\controller\response;

/**
 * An abstract Response class.
 * 
 * This class defines methods to be used by its children - defining headers 
 * and data to be sent to the client.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
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