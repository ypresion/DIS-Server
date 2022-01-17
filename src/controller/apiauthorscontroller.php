<?php

namespace src\controller;

use src\model\gateway as Gateway;

/**
 * An implementation of DIS authors controller for the API.
 * 
 * This class is responsible for processing GET requests for the
 * authors list. 
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ApiAuthorsController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\ApiAuthorsGateway();
    }
    
    /** 
     * This method will process a GET request for the list of 
     * authors. If ID parameter is provided, it will try and find an
     * author with that id, otherwise it will return a list of all
     * authors from the database.
     *
     * @return array
     */
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