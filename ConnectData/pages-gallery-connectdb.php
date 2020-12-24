<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sale_system";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'utf8'");

if(!$conn){
    die('Could not connect:'. mysqli_connect_error());
}

?>