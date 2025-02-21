<?php 
Class AccountModel{
    private $conn;

    private $table_name = "users";

    public function __construct($db){
        $this-> conn = $db;
    }
    public function getAccountByUsername($username){
        $query = "SELECT id, username, password, role FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function checkLogin($username, $password) {
        $sql = "SELECT id, username, password, role FROM users 
                WHERE username = :username LIMIT 1";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        // Debug
        error_log("User data: " . print_r($user, true));
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    function save($username, $name, $password, $role="user"){
        $query = "INSERT INTO " . $this->table_name . "(username, password, role) 
        VALUES (:username,:password, :role)";
        $stmt = $this->conn->prepare($query);
        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $username = htmlspecialchars(strip_tags($username));
        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
            return false;
    }
}
?>