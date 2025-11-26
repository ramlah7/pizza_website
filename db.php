<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pizza_shop";

$conn = mysqli_connect($host, $user, $pass, $db,3308);

if(!$conn){
    die("Connection failed");
}
?>
