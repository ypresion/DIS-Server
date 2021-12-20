<?php

namespace src\controller;

class ApiBaseController extends Controller {
    
    protected function processRequest() {
        $data['author']['name'] = "Sylwia Krupa";
        $data['author']['id'] = "w18015597";
        $data['message'] = "This is a basic Web API for DIS research papers.";
        $data['documentation'] = "http://www.google.com";

        return $data;
    }
}