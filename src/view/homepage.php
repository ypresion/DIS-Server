<?php

namespace src\view;

/**
 * Generate a Home Page.
 * 
 * This class will create a valid HTML5 webpage with basic information 
 * about the site.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class HomePage extends Webpage
{
    public function __construct($title, $heading)
    {
        parent::__construct($title, $heading);
        $this->createHomePage();
    }

    private function createHomePage() {
        $body = <<<EOT
<div>
<p>Author: Sylwia Krupa | w18015597</p>
<p>This project is a part of a univeristy coursework. It makes use of Designing 
Interactive Systems (DIS) Conference paper data, and makes that data accessible 
through a Web API and a Client Application. It is not an official DIS site and 
it is not associated with the conference itself, its partner organisations or its 
sponsors.</p>
<p>API Documentation: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/documentation</p>
</div>
EOT;
    $this->setBody($body);
    }
}