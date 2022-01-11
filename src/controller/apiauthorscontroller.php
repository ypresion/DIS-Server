<?php

namespace src\controller;

use src\model\gateway as Gateway;

class ApiAuthorsController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\ApiAuthorsGateway();
    }
    
    protected function processRequest() {

        if ($this->getRequest()->getRequestMethod() === "GET") {
            $id = $this->getRequest()->getParameter("id");

            if (!is_null($id)) {
            $this->getGateway()->findOne($id);
            } else {
            $this->getGateway()->findAll();
            }
        } else {
            $this->getResponse()->setMessage("Method not supported");
            $this->getResponse()->setStatusCode(405);
        }

        return $this->getGateway()->getResult();
    }
}