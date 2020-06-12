<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <title>Detail Product</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src = "js/style.js"></script>
    <script>
        function checkLogin(){
            <?php 
            if(!isset($_SESSION['username'])){
                ?>
            alert("Please login to buy product");
            <?php    
            }else{
                $idjs = $_GET['id']
                ?>
            window.location="buyProduct.php?id=<?=$id?>";
            <?php
            }
            ?>
            
        }
    
    </script>

</head>
<body>
    <div>
        <div class="header">
            <nav>

                <lable class="logo">Rÿu</lable>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="google.com">About</a></li>
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
                    <img src="image/logo.png" alt="">
                </div>
                <div class="list">
                    <ul>
                        <li><a href="index.php?cate=iphone" >Iphone</a></li>
                        <li><a href="index.php?cate=huawei" >Huawie</a></li>
                        <li><a href="index.php?cate=samsung" >Samsung</a></li>
                        <li><a href="index.php?cate=samsung" >Nokia</a></li>
                        <li><a href="index.php?cate=sony" >Sony</a></li>
                    </ul>
                </div>
                 <div>
                    <input type="text" name="search" id = "search" placeholder="Search..." class="form-control">
                    <input type="button"  class="btn btn-primary" value="Search" onclick="search1();">
                </div>
            </div>
            <div class="content">
            <div class="rowa" id = "row">
<?php include "read.php";?>

            </div>
            </div>


        </div>



    </div>

</body>

</html>