<?php

namespace App\Controller;

use App\Model\UserRelationsModel;
use Framework\Controller;

class UserRelationController extends Controller {

    public function createRelation() 
    {
        if (isset($_SESSION['id']) && isset($_SESSION['receiver_id'])) {
            $userRelationManager = new UserRelationsModel();
            $userRelationManager->insertUser($_SESSION['id'], $_SESSION['receiver_id']);
        }
    }
}