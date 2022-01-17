<?php

namespace src\controller;

use src\model\gateway as Gateway;
use src\Firebase\JWT\JWT;

/**
 * An implementation of authentication controller for the API.
 * 
 * This class is responsible for processing authentication requests
 * to the API. It verifies user credentials and creates a JWT token 
 * on successful verification.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ApiAuthController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\UserGateway();
    }
    
    /** 
     * This method will process a POST authentication request: it will
     * verify user email and password and set an appropriate response.
     * If user is verified, it will create a JWT token; otherwise it 
     * will set an appropriate status code and message denying authentication.
     *
     * @return array
     */
    protected function processRequest() {
        $data = [];


        if ($this->getRequest()->getRequestMethod() === "POST") {

            $email = $this->getRequest()->getParameter("email");
            $password = $this->getRequest()->getParameter("password"); 

            if (!is_null($email) && !is_null($password)) {
                $this->getGateway()->findPassword($email);

                if (count($this->getGateway()->getResult()) == 1) {
                    $hashpassword = $this->getGateway()->getResult()[0]['password'];

                    if (password_verify($password, $hashpassword)) {
                        $key = SECRET_KEY;
                        $userid = $this->getGateway()->getResult()[0]['id'];
  
                        $payload = array(
                            "user_id" => $userid,
                            "exp" => time() + 7776000
                        );
                    
                        $jwt = JWT::encode($payload, $key);
                    
                        $data = ['token' => $jwt];
                    }
                }

            }
            if (!array_key_exists('token',$data)) {
                $this->getResponse()->setMessage("Unauthorized");
                $this->getResponse()->setStatusCode(401);
            }

        } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        
        return $data;
    }
}