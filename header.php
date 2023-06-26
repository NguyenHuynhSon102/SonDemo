<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            ob_start();
            
        ?>
        <title>TeCH</title>
        <link rel = "stylesheet" href ="shoptech.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              
        <meta name="viewport" content="width:device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap');
        .dropdown:hover .dropdown-menu{
                display: block;    
            }
        .p1,.p2{
                text-align: center;
                font-family: 'Quicksand', sans-serif;
                margin: 0 auto 10px;
                position: relative;
                line-height: 60px;
                color: black;
                font-weight: bolder;
                border-bottom: 100px purple;
            }
        .about p{
            margin: 150px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

    </style>

    <?php
        include_once ("connect.php");
    ?>   


    <body>
<!-- <div class="body">       -->
    <nav class="navbar navbar-expand-md navbar-light bg-light ">

<div class="container-fluid">
     
    <a href="index.php" class="navbar-brand">
    <b><img id="logo" src="./images/avatarcartoon.webp" width="50px"> TeCH </b><br><h6> Tech heaven be here<h6></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMain">                    
        <div class="navbar-nav">
            <a class="nav-link active" href="index.php">Home</a>
            <div class="dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="smartphone.php">Smartphone</a>
                <a class="dropdown-item" href="laptop.php">Laptop</a>
                <a class="dropdown-item" href="category_management.php">Category Management</a>
            </div>
            </div>
            <a class="nav-link" href="proadd.php">Product</a>
            <a class="nav-link" href="cart.php">Cart</a>
            <a class="nav-link" href="#about1">AboutUs</a>
        </div>
        <div id="account" class="navbar-nav ms-auto">
            <div class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
            <?php 
                if (isset($_SESSION['user_name'])){
                    $sUsername = $_SESSION['user_name'];
                    echo $sUsername;  
                    echo '<div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>';
                }else{
                    $sUsername = NULL;
                    echo "User";
                    echo '<div class="dropdown-menu ">
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="register.php">Register</a>
                        </div>';
                            
                }
            ?>                
            
            </a>
            
        </div>                   
    </div>
</div>
</nav>
