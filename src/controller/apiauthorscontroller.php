<?php

namespace src\controller;

use src\model\gateway as Gateway;

class ApiAuthorsController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\ApiAuthorsGateway();
    }
    
    protected function processRequest() {

        $id = $this->getRequest()->getParameter("id");

        if (!is_null($id)) {
           $this->getGateway()->findOne($id);
        } else {
           $this->getGateway()->findAll();
        }

        return $this->getGateway()->getResult();
    }
}