<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/webbanhang/public/css/login_admin.css">
    <style>
        :root {
            --sidebar-width: 70px;
            --sidebar-expanded-width: 250px;
            --transition-speed: 0.3s;
        }

        body {
            margin-left: var(--sidebar-width);
            transition: margin var(--transition-speed);
        }

        .sidebar {
            height: 100%;
            width: var(--sidebar-width);
            position: fixed;
            left: 0;
            top: 0;
            background: #2c3e50;
            padding-top: 20px;
            transition: width var(--transition-speed);
            overflow: hidden;
            z-index: 1000;
        }

        .sidebar:hover {
            width: var(--sidebar-expanded-width);
        }

        .nav-item {
            width: 100%;
            margin-bottom: 5px;
        }

        .nav-link {
            padding: 15px;
            color: white !important;
            white-space: nowrap;
            transition: all var(--transition-speed);
        }

        .nav-link:hover {
            background: #34495e;
        }

        .nav-link i {
            width: 30px;
            text-align: center;
            margin-right: 10px;
        }

        .nav-link span {
            opacity: 0;
            transition: opacity var(--transition-speed);
        }

        .sidebar:hover .nav-link span {
            opacity: 1;
        }

        .main-content {
            /* margin-left: var(--sidebar-width);
            padding: 20px; */
            transition: margin var(--transition-speed);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }
            .sidebar:hover {
                width: var(--sidebar-expanded-width);
            }
            body {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/Product/">
                    <i class="fas fa-box"></i>
                    <span>Sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/Product/add">
                    <i class="fas fa-plus-circle"></i>
                    <span>Thêm sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/categories">
                    <i class="fas fa-tags"></i>
                    <span>Danh mục</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/orders">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Đơn hàng</span>
                </a>
            </li>
            <li class="nav-item" id="nav-login">
                <a class="nav-link" href="/webbanhang/account/login">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Đăng nhập</span>
                </a>
            </li>
            <li class="nav-item" id="nav-logout" style="display: none;">
                <a class="nav-link" href="#" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Đăng xuất</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="container-fluid" style="padding: 0;">
    
    <script>
        function logout() {
            localStorage.removeItem('jwtToken');
            location.href = '/webbanhang/account/login';
        }

        document.addEventListener("DOMContentLoaded", function() {
            const token = localStorage.getItem('jwtToken');
            if (token) {
                document.getElementById('nav-login').style.display = 'none';
                document.getElementById('nav-logout').style.display = 'block';
            } else {
                document.getElementById('nav-login').style.display = 'block';
                document.getElementById('nav-logout').style.display = 'none';
            }
        });
    </script>
    

