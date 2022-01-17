<?php

namespace src\controller;

/**
 * An implementation of the base API controller.
 * 
 * This class is responsible for processing GET requests for the
 * base API endpoint which returns general information about the
 * API.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ApiBaseController extends Controller {

    /** 
     * This method will process a GET request for the general 
     * information about the API.
     *
     * @return array
     */
    protected function processRequest() {
        $data = [];

        if ($this->getRequest()->getRequestMethod() === "GET") {
            $data['author']['name'] = "Sylwia Krupa";
            $data['author']['id'] = "w18015597";
            $data['message'] = "This is a basic Web API for DIS research papers.";
            $data['documentation'] = "http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/documentation";
        } else {
            $this->getResponse()->setMessage("Method not supported");
            $this->getResponse()->setStatusCode(405);
        }

        return $data;
    }
}