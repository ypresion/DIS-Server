<?php

namespace src\view;

/**
 * Generate an Error Page.
 * 
 * This class will create a valid HTML5 webpage used for endpoints
 * that don't exist.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ErrorPage extends Webpage
{
    public function __construct($title, $heading)
    {
        parent::__construct($title, $heading);
        $this->createErrorPage();
    }

    private function createErrorPage() {
        $body = <<<EOT
<div>
<p>You're trying to access a page that doesn't exist!</p>
<p>Go back home: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/</p>
<p>API Documentation: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/documentation</p>
</div>
EOT;
    $this->setBody($body);
    }
}