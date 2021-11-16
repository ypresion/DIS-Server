<?php

namespace src\controller;

class ApiActorsController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new ActorGateway();
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