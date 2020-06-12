<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <title>Rÿu - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
   

</head>

<body>
    <div class="container123">
        <div class="header">
            <nav>
                <lable class="logo">Rÿu</lable>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="http://google.com">About</a></li>
                    <li><a href="admin/admin.php">Admin</a></li>
                    <?php 
                    if(isset($_SESSION['username'])){
                        $userSS = $_SESSION['username'];
                        ?>
                    <li><a href="profile.php">User:<?=$userSS?></a></li>
                    <li><a href="login/logout.php">LogOut</a></li>
                    <?php     
                    }else{
                    ?>
                    <li><a href="login/signIn.php">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <div class="body">

            <div class="bar_left_active">
                <div class="title">
                    <a href="index.php">
                        <img src="image/logo.png" alt="">
                    </a>
                </div>
                <div class="list">
                    <ul>
                        <li><a href="#Iphone" onclick="takeData('iphone')">Iphone</a></li>
                        <li><a href="#Huawei" onclick="takeData('huawei')">Huawie</a></li>
                        <li><a href="#Samsung" onclick="takeData('samsung')">Samsung</a></li>
                        <li><a href="#Nokia" onclick="takeData('nokia')">Nokia</a></li>
                        <li><a href="#Sony" onclick="takeData('sony')">Sony</a></li>
                    </ul>
                </div>
                <div>
                    <input type="text" name="search" id="search" placeholder="Search..." class="form-control">
                    <input type="button" class="btn btn-primary" value="Search" onclick="search();">
                </div>

            </div>
            <?php
            if(isset($_GET['search'])){
                ?>
            <div class="content">
                <div class="rowa" id="row">
                    <?php
                include "search.php";
                ?>
                </div>
            </div>
            <?php
            }else{
            ?>
            <div class="content">
                <div class="slide">
                    <a href="">

                        <a href="detail.php"..><img name="slide" width="900px" height="350px;" alt=""></a>
                    </a>

                </div>
                <div class="rowa" id="row">
                    <?php 
                    include "read.php";
                    ?>
                </div>

            </div>

            <?php 
            }
            ?>
        </div>
    </div>
    
    
    
    
    
    
    <script src="js/silde.js"></script>
    <script src="js/style.js"></script>
</body>

</html>
