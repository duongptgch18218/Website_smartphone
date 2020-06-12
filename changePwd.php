<?php include "db.php"; ?>
<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['username'])){
        header("location: ../index.php");
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
                       
                        <li><a href="index.php?cate=iphone" >Iphone</a></li>
                        <li><a href="index.php?cate=huawei"  >Huawei</a></li>
                        <li><a href="index.php?cate=samsung">SamSUng</a></li>
                        <li><a href="index.php?cate=nokia" >Nokia</a></li>
                        <li><a href="index.php?cate=sony" >Sony</a></li>
                    </ul>
                </div>
            </div>
            <div class="content" id="content">
               <h1 class="title-product-admin">Change Password</h1>
                <form action="" method = "post" >
        <div class="form-group">
      <label for="text">Username:</label>
      <input type="text" class="form-control" id="text" name="id" value="<?=$_SESSION['username']?>" readonly> 
    </div>
       
    <div class="form-group custom">
      <label for="text">Current Password:</label>
      <input type="password" class="form-control" id="text" name="password"> 
    </div>
    <div class="form-group">
      <label for="pwd">New password:</label>
      <input type="password" class="form-control"   name="password1" >
    </div>
    
    <div class="form-group">
      <label for="pwd">Verify password:</label>
      <input type="password" class="form-control"   name="password2">
    </div>
       <?php 
     if(isset($_POST['submit'])){
         
    if($_POST['password'] === $_SESSION['password']){
        if($_POST['password1'] === $_POST['password2']){
            $newpwd = $_POST['password2'];
            $id = $_SESSION['id'];
            $query = "UPDATE account SET password = '$newpwd' WHERE id = '$id'";
            $result = mysqli_query($connect,$query);
            echo $query;
            if(!$result){
                echo "Can't change password";
            }else{
                $_SESSION['username'] = null;
                $_SESSION['password'] = null;
                $_SESSION['email'] = null;
                $_SESSION['permission'] = null;

                header("location: index.php");
            }
        }else{
            echo "password not the same";
        }   
    }else{
        echo "Current password wrong";
    }
}
                    ?>
        <div class="form-group">
      <input type="submit" class="form-control" name = "submit" value="Change password">
      <a href="index.php"><input type="button" class="form-control" value="Exit"></a>
      
    </div>
   
    
  </form>       
            </div>
        </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
