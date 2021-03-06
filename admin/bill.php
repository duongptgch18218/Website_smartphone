<?php session_start(); ?>
<?php include "../db.php"; ?>
<?php 
    if($_SESSION['permission'] !== 'admin'){
        header("location: ../index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bill</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js_admin.js">
    </script>
</head>

<body>
    <div>
        <div class="header">
            <nav>

                <lable class="logo">Rÿu</lable>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                     <li><a href="bill.php">Bill</a></li>
                    <li><a href="insert.php">Insert</a></li>
                    <li><a href="admin.php">Home-Admin</a></li>
                    <?php 
                    if(isset($_SESSION['username'])){
                        $userSS = $_SESSION['username'];
                        
                        ?>
                    <li><a href="../profile.php">User:<?=$userSS?></a></li>
                    <li><a href="../login/logout.php">LogOut</a></li>
                    <?php     
                    }else{
                    ?>
                    <li><a href="../login/signIn.php">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <div class="body">
            <div class="bar_left">
                <div class="title">
                    <img src="../image/logo.png" alt="">
                </div>
                <div class="list">
                    <ul>

                        <li><a href="#Iphone" onclick="takeData('iphone');">Iphone</a></li>
                        <li><a href="#Huawei" onclick="takeData('huawei');">Huawei</a></li>
                        <li><a href="#Samsung" onclick="takeData('samsung');">SamSUng</a></li>
                        <li><a href="#Nokia" onclick="takeData('nokia');">Nokia</a></li>
                        <li><a href="#Sony" onclick="takeData('sony');">Sony</a></li>
                    </ul>
                </div>
                <div>
                    <input type="text" name="search" id="search" placeholder="Search..." class="form-control">
                    <input type="button" class="btn btn-primary" value="Search" onclick="search_admin();">
                </div>
            </div>
            <h1 class="title-product-admin">Welcome to page bill</h1>
            <?php
            if(isset($_GET['search'])){
                ?>
            <div class="content-admin" id="content">

                <?php
                include "search-admin.php";
                ?>

            </div>
            <?php
            }else{
            ?>
            <div class="content-admin" id="content">

                <table border="" class="table table-striped" width="1000px;">
                    <tr>
                        <th>ID</th>
                        <th>User Id</th>
                        <th>Product ID</th>
                        <th>Name Product</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Email</th>
                        <th>Name Customer</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Time buy</th>
                    </tr>
                    <?php 
    $query = "SELECT * FROM bill,product WHERE bill.product_id = product.id";
    $result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($result)){
        $billId = $row['bill_id'];
        $userId = $row['username_id'];
        $price = $row['price'];
        $productId = $row['product_id'];
        $nameProduct = $row['name'];
        $cate = $row['category'];
        $email = $row['email'];
        $name = $row['name_customer'];
        $phone = $row['phone'];
        $time = $row['time'];
        $address = $row['address'];
?>
                    <tr>
                        <td><?=$billId?></td>
                        <td><?=$userId?></td>
                        <td><?=$productId?></td>
                        <td><?=$nameProduct ?></td>
                        <td><?=$price?></td>
                        <td><?=$cate?></td>
                        <td><?=$email?></td>
                        <td><?=$name?></td>
                        <td><?=$address?></td>
                        <td><?=$phone?></td>
                        <td><?=$time?></td>
                     

                    </tr>
                    <?php
    
    
}
       ?>
                </table>

            

            </div>
            <?php } ?>

        </div>




    </div>


</body>

</html>