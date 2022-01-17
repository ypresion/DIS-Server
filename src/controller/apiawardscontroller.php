<?php

namespace src\controller;

use src\model\gateway as Gateway;

/**
 * An implementation of DIS awards controller for the API.
 * 
 * This class is responsible for processing GET requests for the
 * awards list.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ApiAwardsController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\ApiAwardsGateway();
    }
    
    /** 
     * This method will process a GET request for the list of 
     * awards.
     *
     * @return array
     */
    protected function processRequest() {

        if ($this->getRequest()->getRequestMethod() === "GET") {
            $this->getGateway()->findAll();
        } else {
            $this->getResponse()->setMessage("Method not supported");
            $this->getResponse()->setStatusCode(405);
        }

        return $this->getGateway()->getResult();
    }
}