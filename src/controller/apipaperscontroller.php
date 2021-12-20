<?php

namespace src\controller;

use src\model\gateway as Gateway;

class ApiPapersController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\ApiPapersGateway();
    }
    
    protected function processRequest() {

        $id = $this->getRequest()->getParameter("id");
        $authorid = $this->getRequest()->getParameter("authorid");
        $award = $this->getRequest()->getParameter("award");

        if (!is_null($id)) {
            $this->getGateway()->findById($id);
        } elseif (!is_null($authorid)) {
            $this->getGateway()->findByAuthorId($id);
        } elseif (!is_null($award)) {
            $this->getGateway()->findByAward($id);
        } else {
           $this->getGateway()->findAll();
        }

        return $this->getGateway()->getResult();
    }
}