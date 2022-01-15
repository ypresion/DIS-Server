<?php

namespace src\controller;

use src\Firebase\JWT\JWT;
use src\Firebase\JWT\Key;
use src\model\gateway as Gateway;

class ApiReadingListController extends Controller {

    protected function setGateway() {
        $this->gateway = new Gateway\ListGateway();
    }
    
    protected function processRequest() {
        $token = $this->getRequest()->getParameter("token");
        $add = $this->getRequest()->getParameter("add");
        $remove = $this->getRequest()->getParameter("remove");

        if ($this->getRequest()->getRequestMethod() === "POST") {
            if (!is_null($token)) {
                $key = SECRET_KEY;
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $user_id = $decoded->user_id;

                if (!is_null($add)) {
                    $this->getGateway()->add($user_id, $add);
                } elseif (!is_null($remove)) {
                    $this->getGateway()->remove($user_id, $remove);
                } else {
                    $this->getGateway()->findAll($user_id);
                }
            } else {
                $this->getResponse()->setMessage("Unauthorized");
                $this->getResponse()->setStatusCode(401);
            }
        } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        return $this->getGateway()->getResult();
    }
}