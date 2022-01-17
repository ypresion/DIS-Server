<?php

namespace src\controller;

use src\view as View;
use ErrorException;

/**
 * An implementation of an error controller.
 * 
 * This class is responsible for processing all incorrect 
 * requests for endpoints that don't exist.
 * If it's an incorrect API endpoint, it throws an error causing 
 * an appropriate JSON response being created. Otherwise,
 * it creates a HTML webpage and points the user to existing 
 * endpoints and documentation.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ErrorController extends Controller {

    protected function processRequest() {
        if (substr($this->getRequest()->getPath(),0,3) === "api") {
            $message = "You're trying to call an API endpoint that doesn't exist. Please view documentation for details about what endpoints are available: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/documentation";
            throw new ErrorException($message);
        } else {
            $page = new View\ErrorPage("404 Page Not Found","404 Page Not Found");
            return $page->generateWebpage();
        }

    }
}