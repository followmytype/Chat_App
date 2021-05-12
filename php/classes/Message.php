<?php
namespace Matt;

use DateTime;
use DateTimeZone;
use PDO;
use PDOException;

class Message {
    private $db;
    private $table = 'messages';

    private $sender_id;
    private $receiver_id;
    private $msg;
    private $created_at;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create(array $data)
    {        
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Taipei'));

        $this->sender_id = $data['sender_id'];
        $this->receiver_id = $data['receiver_id'];
        $this->msg = $data['message'];
        $this->created_at = $dateTime->format('Y-m-d H:i:s');

        $insertQuery = "INSERT INTO $this->table (sender_id, receiver_id, msg, created_at) 
                        VALUES (?, ?, ?, ?)";
        try {
            $stmt = $this->db->prepare($insertQuery);
            $stmt->execute([$this->sender_id, $this->receiver_id, $this->msg, $this->created_at]);
            return [
                'errors' => [], 
                'data' => $this->getLastTalk($this->sender_id, $this->receiver_id)
            ];
        } catch (PDOException $e) {
            return ['errors' => [$e->getMessage()], 'data' => ''];
        }
    }

    public function getTalk($sender, $receiver, $last_msg_id = 0, $limit = 10)
    {
        $query = "SELECT * FROM $this->table 
                  WHERE id > $last_msg_id AND ((sender_id = $sender AND receiver_id = $receiver) || 
                        (sender_id = $receiver AND receiver_id = $sender))
                  ORDER BY id DESC LIMIT $limit";
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $messages ? array_reverse($messages) : [];
    }

    public function getLastTalk($sender, $receiver)
    {
        $talks = $this->getTalk($sender, $receiver, 0, 1);
        return count($talks) == 1 ? $talks[0] : [
            'msg' => '',
            'sender_id' => $sender,
            'receiver_id' => $receiver,
        ];
    }
}