<?php

namespace src\controller;

use Error;

class ErrorController extends Controller {

    protected function processRequest() {
        $message = "You're trying to call an endpoint that doesn't exist. Please view documentation for details about what endpoints are available: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/documentation";

        throw new Error($message);
    }
}