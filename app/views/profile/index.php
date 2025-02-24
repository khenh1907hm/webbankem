<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /webbanhang/account/login');
    exit();
}
?>

<div class="profile-container">
        <div class="sidebar">
            <div class="avatar">
                <img src="/webbanhang/uploads/avatar.jpg" alt="Avatar">
            </div>
            <ul class="menu">
                <li onclick="showTab('info')">Thông tin cá nhân</li>
                <li onclick="showTab('orders')">Danh sách đơn hàng</li>
                <li onclick="showTab('change-password')">Đổi mật khẩu</li>
                <li><a href="/webbanhang/profile/logout">Đăng xuất</a></li>
            </ul>
        </div>

        <div class="content">
            <div id="info" class="tab active">
                <h2>Thông tin cá nhân</h2>
                <p><strong>Họ và Tên:</strong> <?= $user->fullname ?></p>
                <p><strong>Tên đăng nhập:</strong> <?= $user->username ?></p>
                <p><strong>Email:</strong> <?= $user->email ?></p>
                <p><strong>Vai trò:</strong> <?= $user->role ?></p>
            </div>

            <div id="orders" class="tab">
                <h2>Danh sách đơn hàng</h2>
                <p>Hiện chưa có đơn hàng nào.</p>
            </div>

            <div id="change-password" class="tab">
                <h2>Đổi mật khẩu</h2>
                <form action="/webbanhang/account/changePassword" method="POST">
                    <label>Mật khẩu cũ:</label>
                    <input type="password" name="old_password" required>
                    
                    <label>Mật khẩu mới:</label>
                    <input type="password" name="new_password" required>
                    
                    <label>Xác nhận mật khẩu:</label>
                    <input type="password" name="confirm_password" required>

                    <button type="submit">Đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabId) {
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');
        }
    </script>