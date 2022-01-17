<?php 

namespace src\controller\response;

/**
 * An implementation of a JSON response to the client.
 * 
 * This class provides basic methods to create a response in a JSON format. 
 * It sets appropriate headers and provides methods
 * to set a custom message and an appropriate status code.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class JSONResponse extends Response
{
    private $message;
    private $statusCode;

    protected function headers() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    }
 
    /** 
     * This method will set an appropriate status code if one was not set manually,
     * and encode the response in a JSON format.
     *
     * @return string|bool
     */
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