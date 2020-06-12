<?php include "db.php"; ?>
<?php 
if(isset($_GET['search'])){
    $search = $_GET['search'];
    
    $query = "SELECT * FROM product WHERE tag LIKE '%$search%'";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
    
    if($count == 0){
        echo "<h1>No result</h1>";
    }else{
         while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $intro = $row['introduction'];
        $image = $row['image'];
        ?>
<div class="products">

    <a href="detail.php?id=<?=$id?>"><img class="image" src="<?=$image?>" alt=""></a>
    <div class="pro_body">
        <a href="detail.php?id=<?=$id?>">
            <h4 class="pro_title"><?=$name?></h4>
        </a>
        <h5 style="font-size: 25px;"><?=$price?></h5>
        <p class="text"><?=$intro?>
        </p>
    </div>
    <div class="pro_footer">
        <small class="evaluate"> &#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
</div>
 

        <?php
        
    }
}
}


?>