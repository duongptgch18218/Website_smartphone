<?php include "../db.php"; ?>
<?php session_start();  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/signIn.css">
</head>
<body>
   <div class="loginbox">
       <img class = "avatar" src="../image/signIn.jpg" alt="">
       <h1>Login</h1>
       <form action="" method="post">
           <p>Username</p>
           <input type="text" name = "username" placeholder="Enter Username">
           <p>Password</p>
           <input type="password" name = "password" placeholder= "Enter Password">
           <?php 
if(isset($_POST['submit'])){
    if($_POST['username'] == "" || $_POST['password'] == ""){
        echo "Username or password doesn't exist";
    }else{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($connect,$username);
    $password = mysqli_real_escape_string($connect,$password);
    $query = "SELECT * FROM account WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);
    if($count == 1){
        while($row = mysqli_fetch_assoc($result)){
            $db_username = $row['username'];
            $db_password = $row['password'];
            $db_email = $row['email'];
            $db_permission = $row['permission'];
            $db_id = $row['id'];
        }
        if($username === $db_username && $password === $db_password){
            $_SESSION['username'] = $db_username;
            $_SESSION['password'] = $db_password;
            $_SESSION['email'] = $db_email;
            $_SESSION['permission'] = $db_permission;
            $_SESSION['id'] = $db_id;
           
            
            header("location: ../index.php");
            
        }else{
            echo "Wrong password";
        }
    }else{
        echo "Don't exist username";
    }
    }
    
    
} ?>
           <input type="submit" name= "submit" value="Login">
           <a href="#">Lost your password?</a>
           <br>
           <a href="signUp.php">Don't have an account?</a>
         <a href="../index.php"><input type="button" value="Home"></a>
       </form>
   </div>
    
</body>
</html>