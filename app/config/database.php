<?php
class Database {
    private $host = "localhost";
    private $db_name = "my_store";
    private $username = "root";
    private $password = "";
    private $port = "3308"; // Thêm cổng 3308
    public $conn;
    
    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
