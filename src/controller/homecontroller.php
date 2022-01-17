<?php

namespace src\controller;

use src\view as View;

/**
 * An implementation of an homepage controller.
 * 
 * This class is responsible for processing a request 
 * to the home URL and returning a page with basic information
 * about the site.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class HomeController extends Controller {
    
    protected function processRequest() {
        $page = new View\HomePage("Home","Information about this site:");
        return $page->generateWebpage();
    }
    
}