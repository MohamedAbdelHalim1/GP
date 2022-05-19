<?php 
session_start();
$localhost = "localhost";
$username = "root";
$password = "";
$db_name = "buyguide";

$conn = mysqli_connect($localhost , $username , $password , $db_name);
if(!$conn){
    die('connection faild ');
}

?>