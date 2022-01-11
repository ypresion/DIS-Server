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

        if ($this->getRequest()->getRequestMethod() === "GET") {
            if (!is_null($id)) {
                if ($id === "random") {
                    $this->getGateway()->findRandom();
                } else {
                    $this->getGateway()->findById($id);
                }
            } elseif (!is_null($authorid)) {
                $this->getGateway()->findByAuthorId($authorid);
            } elseif (!is_null($award)) {
                $this->getGateway()->findByAward($award);
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