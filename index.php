<?php
include "config/config.php";
use src\controller as Controller;
use src\controller\request as Request;
use src\controller\response as Response;

/**
 * Handle incoming requests.
 * 
 * This is the base index file responsible for setting appropriate 
 * controllers based on the URL requested. Additionally, it sets 
 * appropriate response and exception handlers.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */

$request = new Request\Request();

//Set response to be in JSON format for API endpoints 
if (substr($request->getPath(),0,3) === "api") {
    $response = new Response\JSONResponse();
} else {
    $response = new Response\HTMLResponse();
    //JSON exception handler is set as default in config
    //and it needs to be changed for HTML pages. 
    set_exception_handler("HTMLexceptionHandler");
}

switch ($request->getPath()) {
    case '':
        $controller = new Controller\HomeController($request, $response);
        break;
    case 'documentation':
        $controller = new Controller\DocumentationController($request, $response);
        break;
    case 'api':
        $controller = new Controller\ApiBaseController($request, $response);
        break;
    case 'api/authors':
        $controller = new Controller\ApiAuthorsController($request, $response);
        break;
    case 'api/papers':
        $controller = new Controller\ApiPapersController($request, $response);
        break;
    case 'api/awards':
        $controller = new Controller\ApiAwardsController($request, $response);
        break;
    case 'api/authenticate':
        $controller = new Controller\ApiAuthController($request, $response);
        break; 
    case 'api/readinglist':
        $controller = new Controller\ApiReadingListController($request, $response);
        break;   
    default:
        $controller = new Controller\ErrorController($request, $response);
        break;
}
echo $response->getData();  