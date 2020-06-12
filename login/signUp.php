<?php include "../db.php"; ?>
<?php 
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);
    $email  = mysqli_real_escape_string($connect,$_POST['email']);
    $permission = "user";
    
    $check = "SELECT * FROM account WHERE username = '$username'";
    $check1 = mysqli_query($connect,$check);
    $count = mysqli_num_rows($check1);
    if($count >= 1 ){
         echo "<script>alert('Username already exist!');</script>";
    }else{
    if($_POST['username']=="" || $_POST['email'] == "" || $_POST['password'] =="" || $_POST['password2'] == ""){
         echo "<script>alert('Please check again!');</script>";
    }else{
        if($_POST['password'] !== $_POST['password2']){
             echo "<script>alert('Wrong password, please check again!');</script>";
        }else{
            
            
            $query = "INSERT INTO account(username,password,email,permission) ";
            $query .= "VALUES('$username','$password','$email','$permission')";
            $result = mysqli_query($connect,$query);
            if(!$result){
                 echo "<script>alert('Sign up failed');</script>";
            }else{
                
                echo "<script>alert('Sign Up Success');
                
                    window.location='signIn.php';
                
                </script>";
                
               
            }   
        } 
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Sign Up</title>  
    <link rel="stylesheet" type="text/css" href="../css/signUp.css">
    <script>
    function alert(){
        alert("Features coming soon");
    }
    </script>
</head>
<body>

    <div id="login-box">
      <div class="left-box">
        <h1> Sign Up</h1>
          <form action="" method="post">
          <input type="text" name="username" placeholder="Username"/>
          <input type="text" name="email" placeholder="Email"/>
          <input type="password" name="password" placeholder="Password"/>
        
          <input type="password" name="password2" placeholder="Retype password"/>
        
          <input type="submit" name="submit" value="Sign Up"/>
         <a href="signIn.php"><input type="submit" value = "Sign In"/></a> 
         </form>
        
        </div>
        <div class="right-box">
          <span class="signinwith">Sign in with<br/>Social Network     </span>
        
        <button class="social facebook" onclick="alert();">Log in with Facebook</button>    
        <button class="social twitter" onclick="alert();">Log in with Twitter</button> 
        <button class="social google" onclick="alert();">Log in with Google+</button> 
            
        
        </div>
        <div class="or">OR</div>
    </div>
    
</body>    
</html>