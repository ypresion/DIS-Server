<?php
include "config/config.php";
use src\controller as Controller;
use src\controller\request as Request;
use src\controller\response as Response;

$request = new Request\Request();

if (substr($request->getPath(),0,3) === "api") {
    $response = new Response\JSONResponse();
} else {
    $response = new Response\HTMLResponse();
    set_exception_handler("HTMLexceptionHandler");
}

switch ($request->getPath()) {
    case '':
    case 'home':
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