<?php include "../db.php"; ?>
<?php session_start(); ?>
<?php 
    if($_SESSION['permission'] !== 'admin'){
        header("location: ../index.php");
    }

?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id ='$id'";
    $result = mysqli_query($connect,$query);
     while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $namePhone = $row['name'];
        $pricePhone = $row['price'];
        $introduction = $row['introduction'];
        $tag = $row['tag'];
        $content = $row['content'];
        $image = $row['image'];
         $category = $row['category'];
 } ?> 
<?php 
if(isset($_POST['submit'])){
    if($_POST['name'] == "" || $_POST['price'] == "" || $_POST['introduction'] =="" || $_POST['tag'] == "" || $_POST['content'] == "" || isset($_POST['file'])){
         echo "<script>alert('Sorry,please check again.');</script>";
    }else{
    
    $target_dir = "../image/";
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $target_file1 = "image/". basename($_FILES['file']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
    
}else{
    if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exist.');</script>";
    
}else{
        
    
    move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
    $id = $_POST['id'];
    $nameUpdate = $_POST['name'];
    $priceUpdate = $_POST['price'];
    $introUpdate = $_POST['introduction'];
    $tagUpdate = $_POST['tag'];
    $contentUpdate = $_POST['content'];
    $cateUpdate = $_POST['category'];
    
    
    $query = "UPDATE product";
    $query .=" SET name = '$nameUpdate', price = '$priceUpdate', introduction = '$introUpdate', tag = '$tag', content = '$contentUpdate', category = '$category', image = '$target_file1' WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    echo $query;
    if(!$result){
        
//        echo "<script>alert('Update failed');</script>";
    }else{
        echo "<script>alert('Update Successfull');</script>";
        header("location: http://localhost:8888/ASM/admin/admin.php");
    
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
    <title>Admin - Update</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script>
    function search_admin1(){
         var search = document.getElementById("search").value;
            window.location="admin.php?search="+search;
    }
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
               <h1 class="title-product-admin">Welcome To Page Update</h1>
                <form action="" method = "post" enctype="multipart/form-data">
        <div class="form-group">
      <label for="text">ID:</label>
      <input type="text" class="form-control" id="text" name="id" value="<?=$id?>" readonly> 
    </div>
        <div class="form-group">
      <label for="pwd">Category:</label>
      <select name="category" class="form-control" id="" value = "<?=$category?>">
          <option value="iphone">Iphone</option>
          <option value="huawei">Huawei</option>
          <option value="nokia">Nokia</option>
          <option value="samsung">Samsung</option>
          <option value="sony">Sony</option>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Name Phone:</label>
      <input type="text" class="form-control" id="text" name="name" value = "<?=$namePhone?>">
    </div>
    <div class="form-group">
      <label for="pwd">Price:</label>
      <input type="text" class="form-control"  value = "<?=$pricePhone?>" name="price">
    </div>
    <div class="form-group">
      <label for="pwd">Introduction:</label>
    <textarea name="introduction" class="form-control" id="" cols="30" rows="10" ><?=$introduction?></textarea>
    </div>
    <div class="form-group">
      <label for="pwd">Tag:</label>
      <input type="text" class="form-control"  value = "<?=$tag?>" name="tag">
    </div>
    <div class="form-group">
      <label for="pwd">Content:</label>
      <textarea class="form-control" name="content" id="" cols="30" rows="10" ><?=$content?></textarea>
    </div>
    <div class="form-group">
     <img src="../<?=$image?>" alt="" class="">
     <br>
      <label for="pwd">Choose file image:</label>
      <input type="file"  name="file">
    </div>
    
    <input type="submit" class="btn btn-primary" name="submit" value="Update">
  <a href="admin.php"><input type="text" class="btn btn-primary" value="Cancle"></a>
  </form>       
            </div>
        </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>

<?php 
    
}


?>