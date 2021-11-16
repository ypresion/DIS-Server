<?php

namespace src\controller;

class DocumentationController extends Controller {

    protected function processRequest() {
        $page = new DocumentationPage("Documentation","These are the docs");
        return $page->generateWebpage();
    }
}
