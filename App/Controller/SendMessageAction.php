<?php
session_start();

// To upload an image you need to use the type of file "Blop" on Mysql, and on php, 
// get the filecontent with the gloabl variable $FILES and take it's tmp_name then convert all of that 
// into binary in order to stock it online

function SendMessageAction()
{
    $input = file_get_contents("php://input");
    var_dump($input);
    
    if (isset($input)) {
        if ((string)strlen($input) > 0) {
            var_dump($input);
            header("Content-Type: application/json");
            $messageManager = new MessageModel();
            $messageManager->sendMessage($input, $_SESSION['id'], $_SESSION['receiver_id']);
        }
    }
    var_dump($_SESSION);
}

$send = SendMessageAction();
echo json_encode($send);



// echo json_encode($send);

?>