<?php
include "config/config.php";
use src\controller as Controller;

$request = new Controller\Request();

if (substr($request->getPath(),0,3) === "api") {
    $response = new JSONResponse();
} else {
    $response = new HTMLResponse();
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
    case 'api/films':
        $controller = new Controller\ApiFilmsController($request, $response);
        break;
    case 'api/actors':
        $controller = new Controller\ApiActorsController($request, $response);
        break;
    default:
        $controller = new Controller\ErrorController($request, $response);
        break;
}

echo $response->getData();