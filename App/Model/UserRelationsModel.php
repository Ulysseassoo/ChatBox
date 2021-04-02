<?php
namespace App\Model;
// <!-- INSERT INTO `user_has_user` (`sender_id`, `receiver_id`) VALUES ('1', '2');  -->

use Framework\Model;
use \PDO;

class UserRelationsModel extends Model
{
    public function insertUser($sender, $receiver)
    {
        $db = $this->getDb();
        $query = $db->prepare("SELECT * FROM `user_has_user` WHERE `sender_id` = :sender AND `receiver_id` = :receiver");
        $query->execute([
            'sender' => $sender,
            'receiver' => $receiver
        ]);
        if ($query->rowCount() <= 0) {
            
            $query2 = $db->prepare('INSERT INTO `user_has_user`(`sender_id`, `receiver_id`) VALUES (:sender, :receiver)');
            $query2->execute([
            'sender' => $sender,
            'receiver' => $receiver,
            ]);
        }
    }
}