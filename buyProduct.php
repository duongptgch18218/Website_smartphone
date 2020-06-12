<?php include "db.php"; ?>
<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['username'])){
        header("location: ../index.php");
    }

?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id ='$id'";
    $result = mysqli_query($connect,$query);
     while($row = mysqli_fetch_assoc($result)){
        $namePhone = $row['name'];
        $pricePhone = $row['price'];
        $introduction = $row['introduction'];
        $image = $row['image'];
         $cate = $row['category'];
 } ?> 
 
 <?php 
    if(isset($_POST['submit'])){
        if($_POST['name']!= "" && $_POST['phone']!= "" && $_POST['address'] != ""){
        $user_id = $_SESSION['id'];
        $user_name = $_POST['name'];
        $user_phone = $_POST['phone'];
        $user_address = $_POST['address'];
        $user_email = $_SESSION['email'];
        $date = date('d-m-Y H:i:s');
        $price = $_POST['price'];
        $query = "INSERT INTO bill(product_id,price,username_id,phone,address,name,time) VALUES('$id','$price','$user_id','$user_phone','$user_address','$user_name','$date')";
        $result = mysqli_query($connect,$query);
            if(!$result){
                echo "<script>alert('Can not complete bill');</script>";
            }else{
                echo "<script>alert('Thank for purchasing the product,We will send the product to you as soon as possible. Wish you a good day');
                window.location = 'index.php';
                </script>";
            }
        
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Update</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="js/style.js">
    
        
    </script>
</head>

<body>
    <div>
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
            <div class="bar_left">
                <div class="title">
                    <img src="image/logo.png" alt="">
                </div>
                <div class="list">
                    <ul >
                       
                        <li><a href="admin.php?cate=iphone" >Iphone</a></li>
                        <li><a href="admin.php?cate=huawei"  >Huawei</a></li>
                        <li><a href="admin.php?cate=samsung">SamSUng</a></li>
                        <li><a href="admin.php?cate=nokia" >Nokia</a></li>
                        <li><a href="admin.php?cate=sony" >Sony</a></li>
                    </ul>
                </div>
                <div>
                    <input type="text" name="search" id = "search" placeholder="Search..." class="form-control">
                    <input type="button"  class="btn btn-primary" value="Search" onclick="search_admin1();">
                </div>
            </div>
            <div class="content" id="content">
               <h1 class="title-product-admin">Bill - Product</h1>
                
        <form action="" method="post">
        <div class="form-group">
        
      <label for="pwd">Category:</label>
      <input type="text" value="<?=$cate?>" class="form-control" readonly>
    </div>
    <div class="form-group">
      <label for="email">Name Phone:</label>
      <input type="text" class="form-control" id="text"  value = "<?=$namePhone?>" readonly>
    </div>
    <div class="form-group">
      <label for="pwd">Price:</label>
      <input type="text" class="form-control"  value = "<?=$pricePhone?>" name="price" readonly>
    </div>
    <div class="form-group">
      <label for="pwd">Introduction:</label>
    <textarea name="introduction" class="form-control" id="" cols="30" rows="10" readonly><?=$introduction?></textarea>
    </div>
    <div class="form-group">
     <img src="<?=$image?>" alt="" class="">
    </div>
    <div class="form-group">
      <label for="pwd">Your Email:</label>
    <input type="email" class="form-control" value="<?=$_SESSION['email']?>" readonly>
    </div>
    <div class="form-group">
      <label for="pwd">Your Name:</label>
    <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">Your Phone:</label>
    <input type="text" class="form-control" name = "phone" >
    </div>
    <div class="form-group">
      <label for="pwd">Your address:</label>
    <input type="text" class="form-control" name = "address">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Confirm">
  <a href="index.php"><input type="text" class="btn btn-primary" value="Cancle"></a>
     <br>
     <br>
     <br>
      </form>
            </div>
        </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>