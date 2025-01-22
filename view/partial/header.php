<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// In the controller
$isLoggedIn = isset($_SESSION['id_user']);
$userData = $isLoggedIn ? $_SESSION['id_user'] : null;

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inspiration&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="/aesthetic_gallery/view/css/header.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<header>
    <div class="header-container">
        <nav class="left-nav">
            <div class="left-upper">
                <div class="top-phone">
                    <div class="hamburger-icon" id="burger">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="web-site-name" id="name">
                        <a href="#">Aesthetic Gallery</a>
                    </div>
                </div>
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Find something you'll love!">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- if am connected remove login sighn in and add card profile -->
                <?php if ($isLoggedIn): ?>
                    <div class="auth-buttons">
                        <a href="profile" class="sign-in">Profile</a>
                        <a href="logout" class="register">Logout</a>
                    </div>
                <?php else: ?>
                    <div class="auth-buttons">
                        <a href="login" class="sign-in">Login</a>
                        <a href="signup" class="register">Register</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="left-lower">
                <ul class="nav-horizontal">
                    <li><a href="home">Home</a></li>
                    <li><a href="#">Artists</a></li>
                    <li><a href="#">Artworks</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="about">About</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>