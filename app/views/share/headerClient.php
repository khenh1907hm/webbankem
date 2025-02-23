<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="webbanhang/public/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/webbanhang/public/css/reset.css">
    <link rel="stylesheet" href="/webbanhang/public/css/styles.css">
    <link rel="stylesheet" href="/webbanhang/public/css/responsive.css">
    <!-- <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/resposive.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Itim&family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Dely - Kem thuần chay</title>
</head>
<body >
    <!-- Header -->
    <header class="fixed-header">
        <div class="contain">
          <nav class="navbar">
            <!-- Tablet and moblie Navbar -->
             <label for="menu-checkbox" class="toggle-menu">
              <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path fill="currentColor" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
             </label>
            <!-- Logo -->
            <a href="#home"><img src="webbanhang/public/img/logo.png" alt="" class="logo" /></a>
            <!-- Nav Links -->
            <ul id="pc-nav">
              <li><a href="#home">Home</a></li>
              <li><a href="#Service">Service</a></li>
              <li><a href="#features">Features</a></li>
              <li><a href="#Resource">Resource</a></li>
              <li><a href="#Contact">Contact</a></li>
              <li class= "show-mobile separate"><a href="#Contact">Sign in</a></li>
              <li class= "show-mobile"><a href="#Contact">Sign up</a></li>
            </ul>
            <!-- Acticve -->
            <div class="action" id="auth-buttons">
              <!-- Default state - will be updated by JavaScript -->
              <a class="action-link" href="/webbanhang/account/login">Sign in</a>
              <a class="btn action-btn" href="/webbanhang/account/register">Sign up</a>
          </div>

          <nav class="nav">
          </nav>
        </div>
    </header>
    <!--Tablet and moblile Header -->
    <header class="mobile-header">
        <input type="checkbox" name="" id="menu-checkbox" class="menu-checkbox" hidden>
       <label for="menu-checkbox" class="menu-overlay"></label> 
       <!-- menu icon -->
        <div class="menu-drawer">
          <a href="#home"><img src="webbanhang/public/img/Logo.svg" alt=""/></a>
            <!-- Nav Links -->
            <ul id="mobile-nav">
              
            </ul>
            <script>
              const pcNav= document.querySelector("#pc-nav")
              const mobileNav= document.querySelector("#mobile-nav")

              // copy dữ liệu từ nav từ pc
              mobileNav.innerHTML= pcNav.innerHTML;

            </script>
        </div>
      </header>