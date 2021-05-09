<?php
namespace Matt;

use DateTime;
use DateTimeZone;
use PDO;
use PDOException;

class Users {
    private $db;
    private $table = 'users';

    public $user_id;
    public $nick_name;
    public $email;
    public $img_url;
    public $status;
    public $created_at;
    private $password;
    private $api_token;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create(array $data)
    {
        if ($this->getUser($data['email'])) {
            return ['errors' => ['User is existed.'], 'data' => ''];
        }
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Taipei'));

        $this->user_id = rand(time(), 10000000);
        $this->nick_name = $data['nick_name'];
        $this->email = $data['email'];
        $this->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->img_url = $data['image'];
        $this->status = true;
        $this->created_at = $dateTime->format('Y-m-d H:i:s');

        $insertQuery = "INSERT INTO $this->table (user_id, nick_name, email, password, image_url, status, created_at) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
        try {
            $stmt = $this->db->prepare($insertQuery);
            $stmt->execute([$this->user_id, $this->nick_name, $this->email, $this->password, $this->img_url, $this->status, $this->created_at]);
            $user = $this->getUser($this->email);
            unset($user['password']);
            unset($user['id']);
            unset($user['created_at']);
            return ['errors' => [], 'data' => $user];
        } catch (PDOException $e) {
            return ['errors' => [$e->getMessage(), $insertQuery], 'data' => ''];
        }
    }

    public function getUser(string $email)
    {
        $email = $this->db->quote($email);
        $email = strtr($email, ['_' => '\_', '%' => '\%']);
        $sql = "SELECT * FROM $this->table WHERE email = $email";
        
        $user = $this->fetchQuery($sql);
        
        return $user;
    }

    public function getUserByUserId(int $user_id)
    {
        $sql = "SELECT nick_name, email, image_url, status FROM $this->table WHERE user_id = $user_id";

        $user = $this->fetchQuery($sql);

        return $user;
    }

    public function search(string $name)
    {
        // $name = $this->db->quote($name);
        // $name = strtr($name, ['_' => '\_', '%' => '\%']);

        $sql = "SELECT * FROM $this->table WHERE nick_name LIKE '%$name%'";

        $users = $this->fetchAllQuery($sql);

        return $users;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";

        $users = $this->fetchAllQuery($sql);

        return $users;
    }

    private function fetchQuery(string $sql)
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $user;
    }

    private function fetchAllQuery(string $sql)
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $user ? $user : [];
    }
}