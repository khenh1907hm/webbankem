<?php
require_once 'app/models/AccountModel.php';
require_once 'app/config/database.php';
require_once 'app/utils/JWTHandler.php';

class AccountController {
    private $accountModel;
    private $db;
    private $jwtHandler;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
        $this->jwtHandler = new JWTHandler();
    }

    public function register() {
        include_once 'app/views/account/register.php';
    }

    public function login() {
        include_once 'app/views/account/login.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $errors = [];

            // Validate input
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập userName!";
            }
            if (empty($fullName)) {
                $errors['fullname'] = "Vui lòng nhập fullName!";
            }
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập password!";
            }
            if ($password != $confirmPassword) {
                $errors['confirmPass'] = "Mật khẩu và xác nhận chưa đúng";
            }

            // Check if username exists
            $account = $this->accountModel->getAccountByUsername($username);
            if ($account) {
                $errors['account'] = "Tài khoản này đã có người đăng ký!";
            }

            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->accountModel->save($username, $fullName, $password);
                if ($result) {
                    header('Location: /webbanhang/account/login');
                }
            }
        }
    }

    public function logout() {
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        header('Location: /webbanhang/product');
    }

    public function checkLogin() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';
        $user = $this->accountModel->getAccountByUserName($username);
        if ($user && password_verify($password, $user->password)) {
            $token = $this->jwtHandler->encode(['id' => $user->id, 'username' => $user->username]);
            echo json_encode(['token' => $token]);
        } else {
            http_response_code(401);
            echo json_encode(['message' => 'Invalid  credentials']);
        }         
    }
}
?>