<?php include "../db.php"; ?>
<?php 
if(isset($_GET['search'])){
    $search = $_GET['search'];
    echo $search;
    
    $query = "SELECT * FROM product WHERE tag LIKE '%$search%'";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
    
    if($count == 0){
        echo "<h1>No result</h1>";
    }else{
    ?>
   <table border = "" class="table table-striped" width = "1000px;">
   <tr>
       <th>ID</th>
       <th>Cate</th>
       <th>Name</th>
       <th>Price</th>
       <th>Introduction</th>
       <th>Tag</th>
       <th>Content</th>
       <th>Image</th>
       <th>category</th>
       <th>Update</th>
       <th>Delete</th>
   </tr>
   <?php 
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $intro = $row['introduction'];
        $tag = $row['tag'];
        $content = $row['content'];
        $image = $row['image'];
        $cate = $row['category'];
?>
  <tr>
   <td><?=$id?></td>
    <td><?=$cate?></td>
    <td><?=$name?></td>
    <td><?=$price?></td>
    <td><?=$intro?></td>
    <td><?=$tag?></td>
    <td ><?=$content?></td>
    <td><?=$image?></td>
    <td><?=$cate?></td>
    <td><a href="update.php?id=<?=$id?>">Update</a></td>
    <td><a href="#$<?=$id?>" onclick="deleteData(<?=$id?>);">Delete</a></td>
    
    </tr>
    <?php
    
    
}
       ?>
 </table>
 <?php
} 
}


?>