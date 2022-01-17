<?php

namespace src\controller;

use src\Firebase\JWT\JWT;
use src\Firebase\JWT\Key;
use src\model\gateway as Gateway;

/**
 * An implementation of a reading list controller.
 * 
 * This class is responsible for processing POST requests 
 * related to user's private reading list - accessing it, 
 * adding and removing papers.
 *
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class ApiReadingListController extends Controller {

    protected function setGateway() {
        $this->gateway = new Gateway\ListGateway();
    }
    
    /** 
     * This method will process a POST request for the reading list 
     * API endpoint. It will check if the user is authorized to do so
     * by verifying the JWT token provided. Depending on the parameter specified, 
     * it will add/remove a paper from the list, or return its contents. 
     *
     * @return array
     */
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