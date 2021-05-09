<?php
namespace Matt;

use PDO;
use PDOException;

class DBLink {
    private $dbHost = '127.0.0.1';
    private $dbName = 'chatapp';
    private $dbUser = 'root';
    private $dbPass = 'password';
    private $db;

    public function __construct() {
        $this->dbConnect();
    }

    private function dbConnect($port = 3306, $charset = 'utf8') {
        $dbHost = $this->dbHost;
        $dbName = $this->dbName;
        $dbUser = $this->dbUser;
        $dbPass = $this->dbPass;
        $connectQuery = "mysql:host=$dbHost;dbname=$dbName;port=$port;charset=$charset";

        try {
            $this->db = new PDO ($connectQuery, $dbUser, $dbPass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("連線失敗：" . $e->getMessage());
        }
    }

    public function connect() {
        return $this->db;
    }
}