<?php

namespace src\controller;

use src\model\gateway as Gateway;
use src\Firebase\JWT\JWT;

class ApiAuthController extends Controller {
    
    protected function setGateway() {
        $this->gateway = new Gateway\UserGateway();
    }
    
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