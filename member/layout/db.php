<?php

session_start();
if(isset($_SESSION["memberid"])){

}else{
  header("Location:/?err=Illegal Access!");
  die();
}

$servername = "localhost";
$username = "lottery";
$password = "trysomething";
$db_name = "lottery";
$conn = new mysqli($servername, $username, $password,$db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>