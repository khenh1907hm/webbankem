<?php
require_once 'app/models/AccountModel.php';
require_once 'app/helpers/SessionHelper.php';

class ProfileController {
    private $accountModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection(); // Lấy connection từ Database
        $this->accountModel = new AccountModel($this->db);
    }

    public function index() {
        SessionHelper::startSession();

        // Kiểm tra nếu user đã đăng nhập trong session
        $username = SessionHelper::getUser();

        // Nếu session không có, kiểm tra dữ liệu từ frontend gửi lên
        if (!$username && isset($_POST['username'])) {
            $username = $_POST['username'];
            $_SESSION['username'] = $username; // Cập nhật lại session
        }

        // Nếu vẫn không có username => buộc về trang login
        if (!$username) {
            header('Location: /webbanhang/account/login');
            exit();
        }

        // Lấy thông tin tài khoản từ database
        $user = $this->accountModel->getAccountByUserName($username);

        if (!$user) {
            die("Lỗi: Không tìm thấy thông tin tài khoản.");
        }

        include_once 'app/views/profile.php';
    }
}
?>