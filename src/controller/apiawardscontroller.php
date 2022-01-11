<?php

namespace src\controller;

use src\model\gateway as Gateway;

class ApiAwardsController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\ApiAwardsGateway();
    }
    
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