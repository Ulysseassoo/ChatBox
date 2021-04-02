<?php

namespace App\Model;

use Framework\Model;
use \PDO;

class MessageModel extends Model
{
    public function sendMessage($message, $sender, $receiver)
    {
        $db = $this->getDb();
        $query = $db->prepare('INSERT INTO `messages`(`message`, `user_has_user_sender_id`, `user_has_user_receiver_id`) VALUES (:message, :sender, :receiver)');
        $query->execute([
            'message' => $message,
            'sender' => $sender,
            'receiver' => $receiver
        ]);
    }

    public function ListAllMessages()
    // Here we fetch all the messages
    {
        // dd($_SESSION);
        header("Content-Type: application/json");
        $db = $this->getDb();
        $query = $db->prepare('SELECT * FROM `messages` WHERE user_has_user_sender_id = :sender AND user_has_user_receiver_id = :receiver OR user_has_user_sender_id = :receiver AND user_has_user_receiver_id = :sender');
        $query->execute([
            'sender' => $_SESSION['id'],
            'receiver' => $_SESSION['receiver_id']
        ]);
        $messageManager = $query->fetchAll(PDO::FETCH_ASSOC);
        return $messageManager;
    }
}