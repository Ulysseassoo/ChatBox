<?php

require(__DIR__.'/../model/UserRelationsManager.php');
require(__DIR__.'/../model/UserRelations.php');


function createRelation()
{
    if (isset($_SESSION['id']) && isset($_SESSION['receiver_id'])) {
        $userRelation = new UserRelation($_SESSION['id'], $_SESSION['receiver_id']);
        $userRelationManager = new UserRelationsManager();
        $userRelationManager->insertUser($userRelation);
    }
}