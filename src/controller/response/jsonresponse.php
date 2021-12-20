<?php 

namespace src\controller\response;

class JSONResponse extends Response
{
    protected function headers() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("HTTP/1.1 200 OK");
    }
 
    public function getData() {
        return json_encode($this->data);
    }
}