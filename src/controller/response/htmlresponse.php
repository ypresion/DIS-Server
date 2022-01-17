<?php 

namespace src\controller\response;

/**
 * An implementation of a HTML response to the client.
 * 
 * This class sets headers to create a response in an HTML format.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class HTMLResponse extends Response
{
    protected function headers() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/html; charset=UTF-8");
    }
}