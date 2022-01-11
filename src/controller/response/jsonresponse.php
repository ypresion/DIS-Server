<?php 

namespace src\controller\response;

class JSONResponse extends Response
{
    private $message;
    private $statusCode;

    protected function headers() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    }
 
    public function getData() {

        if (is_null($this->message)) {
            if (count($this->data) === 0) {
                $this->message = "No content";
                $this->statusCode = 204;
            } else {
                $this->message = "Ok";
                $this->statusCode = 200;
            }
        }
        
        http_response_code($this->statusCode);

        $response['message'] = $this->message;
        $response['count'] = count($this->data);
        $response['results'] = $this->data;
        return json_encode($response);
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }
}