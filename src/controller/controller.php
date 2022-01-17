<?php

namespace src\controller;

/**
 * An abstract Controller class.
 * 
 * This class defines basic methods for responding to user requests.
 * It is reponsible for setting the gateway, request and response 
 * objects, while leaving the implementation of the processing of the 
 * requests to its children.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
abstract class Controller {

    private $request;
    private $reponse;
    protected $gateway;
    
    public function __construct($request, $response) {
        $this->setGateway();
        $this->setRequest($request);
        $this->setResponse($response);

        $data = $this->processRequest();
        $this->getResponse()->setData($data);
    }

    private function setRequest($request) {
        $this->request = $request;
    }

    protected function getRequest() {
        return $this->request;
    }

    private function setResponse($response) {
        $this->response = $response;
    }

    protected function getResponse() {
        return $this->response;
    }

    protected function setGateway() {

    }

    protected function getGateway() {
        return $this->gateway;
    }

    protected function processRequest() {

    } 

}