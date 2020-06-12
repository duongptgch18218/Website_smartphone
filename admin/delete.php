<?php include "../db.php"; ?>
<?php 
$id = $_GET['id'];
echo "<script>alert($id);</script>";
$query = "DELETE FROM product WHERE id = '$id'";
$result = mysqli_query($connect,$query);
echo "<script>alert($query);</script>";
if(!$result){
    echo "<script>alert('Delete failed');</script>";
}else{
     echo "<script>alert('Delete success');</script>";
}
?>
<?php 
include "read.php";

?>