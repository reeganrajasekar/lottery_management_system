<?php 
require("../layout/db.php");

$id = $_POST["id"];

$sql = "UPDATE member SET data='Active' WHERE id='$id'";

try {
    $conn->query($sql);
    header("Location:/admin/members.php?msg=Member Account Activated Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/admin/members.php?err=Something went wrong!");
    die();
}

?>