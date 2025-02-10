<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lý sản phẩm</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f8f9fa;
  }
  .navbar {
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
  }
  .navbar-brand {
    font-weight: bold;
    color: #007bff !important;
  }
  .nav-link {
    color: #007bff !important;
    font-weight: 500;
  }
  .nav-link:hover {
    color: #0056b3 !important;
  }
  .container {
    margin-top: 30px;
  }
  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,.1);
  }
  .card-header {
    background-color: #007bff;
    color: white;
    border-radius: 10px 10px 0 0;
  }
  .btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 5px;
  }
  .btn-primary:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Quản lý sản phẩm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">