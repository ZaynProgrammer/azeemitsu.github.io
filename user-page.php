<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    
    <!-- feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="./img/bulan.png" />

    <!-- css -->
    <link rel="stylesheet" href="/azeemitsu/css/register.css">

</head>
<body>

    <!-- navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">azee<span>mitsu</span>.</a>
        <div class="navbar-nav">
            <a href="logout.php" class="btn">Logout</a> 
        </div>
        <div class="navbar-extra">
            <a href="#" class="headphones" id="music"><i data-feather="headphones"></i> </a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i> </a>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- greet start -->
    <div class="container">
        <div class="content">
            <h3>hi, <span>user</span></h3>
            <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>this is an user page</p>   
        </div>
    </div>
    <!-- greet end -->

    <!-- footer start -->
    <footer>
        <div class="socials">
            <a href="https://www.instagram.com/azee.wyh/"><i data-feather="instagram"></i></a>
            <a href="https://twitter.com/zaynbieeb"><i data-feather="twitter"></i></a>
            <a href="https://github.com/ZaynProgrammer"><i data-feather="github"></i></a>
            <a href="https://www.youtube.com/channel/UC-twD_9aTUo49yBZSEbukbA"><i data-feather="youtube"></i></a>
        </div>

        <div class="credit">
            <p>Created by <a href="https://www.instagram.com/ziehan_labieb/"><span>Azee</span></a> | &copy; 2023</p>
        </div>
    </footer>
    <!-- footer end -->
    
    <!-- javacript -->
    <script src="./js/script.js"></script>

    <!-- feather icon -->
    <script>
        feather.replace()
    </script>

</body>
</html>