<?php include "db.php";?>

<?php 
 global $connect;
if(isset($_GET['cate'])){
    $cate = $_GET['cate'];
    
        $query = "SELECT * FROM product WHERE category = '$cate'";
        $result = mysqli_query($connect, $query);
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

<?php } 
    
}else if(isset($_GET['id'])){
    
    $id = $_GET['id'];
$query = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($connect,$query);
while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $intro = $row['introduction'];
        $image = $row['image'];
        $content = $row['content'];
}
    ?>
 <h1 class="title-product">Detail product:<?=$name?></h1>
                <table width="900px" class="table">
                    <tr>
                        <td rowspan="3" class="detail-img"><img class="detail-img1" src="<?=$image?>" width="460px" height="500px" alt=""></td>
                        <td class="detail-name">
                            <h2><i class="fa fa-mobile" aria-hidden="true"></i>:<?=$name?></h2>
                        </td>
                    </tr>
                    <tr>

                        <td class="detail-intro">
                            <h3><?=$intro?></h3>
                        </td>
                    </tr>
                    <tr>

                        <td class="detail-price">
                            <h2><i class="fa fa-money" aria-hidden="true"></i>:<?=$price?></h2>
                        </td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td rowspan="2" class="detail-content">
                            <p class="detail-content1"><?=$content?></p>
                        </td>
                        <td class="buy"><a href="buyProduct.php?id=<?=$id?>"><button type="button" class="btn btn-primary btn-lg custom-1" onclick="checkLogin();">Buy Now</button></a></td>
                    </tr>
                    <tr>

                        <td class="install"><a href="buyProduct.php?id=<?=$id?>"><button type="button" class="btn btn-danger btn-lg custom-2" onclick="checkLogin();">Installment</button></a></td>
                    </tr>
                </table>
<?php
    
}
else{
    $query = "SELECT * FROM product";
    $result = mysqli_query($connect,$query);
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

<?php }
}
?>