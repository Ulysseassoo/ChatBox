<?php

namespace App\Controller;

use App\Model\MessageModel;
use Framework\Controller;

class MessageController extends Controller {

    public function GetAllMessages()
    {
        $messageManager = new MessageModel();
        $Allmessages = $messageManager->ListAllMessages();
    
        echo json_encode($Allmessages);
        
    }

    public function SendMessageAction()
    {
        $input = file_get_contents("php://input");
        
        if (isset($input)) {
            if ((string)strlen($input) > 0) {
                header("Content-Type: application/json");
                $messageManager = new MessageModel();
                echo json_encode($messageManager->sendMessage($input, $_SESSION['id'], $_SESSION['receiver_id']));
            }
        }
    }
}