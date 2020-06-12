<?php 
$host = "localhost";
$user = "root";
$password = "";
$db = "smartphone";
$port = "3306";

$connect = mysqli_connect($host,$user,$password,$db,$port);
if(!$connect){
    die("Connect failed".mysqli_error($connect));
}

?>