<?php

namespace src\controller;

use src\model\gateway as Gateway;

/**
 * An implementation of DIS papers controller for the API.
 * 
 * This class is responsible for processing GET requests for the
 * DIS papers and their related metadata.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ApiPapersController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\ApiPapersGateway();
    }
    
    /** 
     * This method will process a GET request for the list of 
     * papers. Depending on the parameters specified in the request,
     * it will return either a list of all papers, a random paper, 
     * papers written by a specific author or papers with a specific 
     * award. 
     *
     * @return array
     */
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