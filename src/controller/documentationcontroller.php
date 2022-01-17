<?php

namespace src\controller;

use src\view as View;

/**
 * An implementation of a documentation controller.
 * 
 * This class is responsible for processing a request to the 
 * API documentation endpoint and return documentation in an
 * HTML format.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class DocumentationController extends Controller {

    protected function processRequest() {
        $page = new View\DocumentationPage("Documentation","Endpoints available:");
        return $page->generateWebpage();
    }
}
