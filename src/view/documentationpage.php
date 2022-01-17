<?php

namespace src\view;

/**
 * Generate a Documentation Page.
 * 
 * This class will create a valid HTML5 webpage with all of the 
 * information about the API.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class DocumentationPage extends Webpage
{
    public function __construct($title, $heading)
    {
        parent::__construct($title, $heading);
        $this->createDocumentationPage();
    }

    private function createDocumentationPage() {
        $body = <<<EOT
<div>
<ul>
<li>/api
    <ul>
        <li>Example endpoint: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api</li>
        <li>Description: Returns basic information about this API.</li>
        <li>Methods supported: GET</li>
        <li>Authentication required: False</li>
        <li>Parameters supported: False</li>
        <li>Response Codes:
            <ul>
                <li>200 OK (API details returned)</li>
                <li>405 Method Not Allowed (GET method not used)</li>
            </ul>
        </li>
        <li>Example response:<br/> {"message":"Ok","count":3,"results":{"author":
            {"name":"Sylwia Krupa","id":"w18015597"},"message":"This is a basic Web API 
            for DIS research papers.","documentation":
            "http:\/\/unn-w18015597.newnumyspace.co.uk\/kf6012\/coursework\/part1\/documentation"}}
        </li>
    </ul>
</li>

<li>/api/authors
    <ul>
        <li>Example endpoint: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/authors</li>
        <li>Description: Returns an array of author details.</li>
        <li>Methods supported: GET</li>
        <li>Authentication required: False</li>
        <li>Parameters supported:
            <ul>
                <li>id (int, optional): Returns result for author with corresponding id.</li>
            </ul>
        </li>
        <li>Response Codes:
            <ul>
                <li>200 OK (Author details returned)</li>
                <li>204 No Content (No author found for id)</li>
                <li>405 Method Not Allowed (GET method not used)</li>
            </ul>
        </li>
        <li>Example response:<br/> {"message":"Ok","count":608,"results":[{"author_id":"59463",
            "first_name":"Kerstin","middle_name":"","last_name":"Bongard-Blanchy"}
        </li>
    </ul>

</li>

<li>/api/papers
    <ul>
        <li>Example endpoint: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/papers</li>
        <li>Description: Returns an array of paper details.</li>
        <li>Methods supported: GET</li>
        <li>Authentication required: False</li>
        <li>Parameters supported:
            <ul>
                <li>id (int/"random", optional): Returns result for paper with corresponding id or a random paper.</li>
                <li>authorid (int, optional): Returns result for paper with corresponding author id.</li>
                <li>award (int, optional): Returns result for paper with corresponding award id.</li>
            </ul>
        </li>
        <li>Response Codes:
            <ul>
                <li>200 OK (Paper details returned)</li>
                <li>204 No Content (No paper found for given parameters)</li>
                <li>405 Method Not Allowed (GET method not used)</li>
            </ul>
        </li>
        <li>Example response:<br/> {"message":"Ok","count":1,"results":[{"paper_id":"60083",
            "title":"Participatory Design for the Anarchive: The Amagugu Ethu\/ Our Treasures 
            Documentation Project ","abstract":"This paper documents the collaborative design 
            project: \u201cAmagugu Ethu \/ Our Treasures:  Understanding Zulu History and Language 
            with Zulu-Speaking Communities and Their Belongings.","authors":"Yi-Chin Lee,Lea Albaugh",
            "awards":"Best pictorial"}
        </li>
    </ul>
</li>

<li>/api/awards
    <ul>
        <li>Example endpoint: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/awards</li>
        <li>Description: Returns an array of award details.</li>
        <li>Methods supported: GET</li>
        <li>Authentication required: False</li>
        <li>Parameters supported: False</li>
        <li>Response Codes:
            <ul>
                <li>200 OK (Author details returned)</li>
                <li>405 Method Not Allowed (GET method not used)</li>
            </ul>
        </li>
        <li>Example response:<br/> {"message":"Ok","count":5,"results":[{"award_type_id":"1","name":"Best paper"},
        {"award_type_id":"2","name":"Best paper honourable mention"}
        </li>
    </ul>
</li>

<li>/api/authenticate
    <ul>
        <li>Example endpoint: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/authenticate</li>
        <li>Description: Returns a JWT token.</li>
        <li>Methods supported: POST</li>
        <li>Authentication required: False</li>
        <li>Parameters supported: 
            <ul>
                <li>email (string, required)</li>
                <li>password (string, required)</li>
            </ul>
        </li>
        <li>Response Codes:
            <ul>
                <li>200 OK (User authorized)</li>
                <li>401 Unauthorized (User unauthorized)</li>
                <li>405 Method Not Allowed (POST method not used)</li>
            </ul>
        </li>
        <li>Example response:<br/> {"message":"Ok","count":1,"results":{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9"}}
        </li>
    </ul>
</li>

<li>/api/readingList
    <ul>
        <li>Example endpoint: http://unn-w18015597.newnumyspace.co.uk/kf6012/coursework/part1/api/readingList</li>
        <li>Description: Returns an array of papers on user's reading list.</li>
        <li>Methods supported: POST</li>
        <li>Authentication required: True</li>
        <li>Authentication method: JWT token</li>
        <li>Parameters supported:
            <ul>
                <li>token (int, required): Authentication token to be set in the request header.</li>
                <li>add (int, optional): Adds paper with given id to the reading list.</li>
                <li>remove (int, optional): Removes paper with given id from the reading list.</li>
            </ul>
        </li>
        <li>Response Codes:
            <ul>
                <li>200 OK (Reading list returned / Reading list updated)</li>
                <li>401 Unauthorized (User unauthorized)</li>
                <li>405 Method Not Allowed (POST method not used)</li>
            </ul>
        </li>
        <li>Example response:<br/> {"message":"Ok","count":2,"results":[{"paper_id":"60083"}]}
        </li>
    </ul>
</li>

</ul>
</div>
EOT;
    $this->setBody($body);
    }
}