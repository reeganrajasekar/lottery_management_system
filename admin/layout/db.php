<?php
$servername = "localhost";
$username = "lottery1";
$password = "trysomething";
$db_name = "lottery1";
$conn = new mysqli($servername, $username, $password,$db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>