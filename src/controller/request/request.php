<?php

namespace src\controller\request;

class Request {


    private $basepath = BASEPATH;
    private $path;
    private $requestMethod;
  
    public function __construct() {
        $this->path = parse_url($_SERVER["REQUEST_URI"])['path'];
        $this->path = strtolower(str_replace($this->basepath, "", $this->path));
        $this->path = trim($this->path,"/");
        $this->requestMethod = $_SERVER["REQUEST_METHOD"];
    }

    public function getPath() {
        return $this->path;
    }

    public function getRequestMethod() {
        return $this->requestMethod;
    } 
  
    /** 
     * This method will get and sanitise the given parameter. This approach 
     * will return null if the parameter does not exist or false if the filter
     * is triggered (which may restrict what parameters are possible).
     *
     * @return value OR null OR false
     */
    public function getParameter($param) {
        if ($this->getRequestMethod() === "GET") {
            $param = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($this->getRequestMethod() === "POST") {
            $param = filter_input(INPUT_POST, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $param;
    }
}