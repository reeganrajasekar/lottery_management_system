<?php 
require("../layout/db.php");

$id = $_GET["id"];

$sql = "UPDATE member SET password=mobile WHERE id='$id'";

try {
    $conn->query($sql);
    header("Location:/admin/members.php?msg=Member Account Reseted Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/admin/members.php?err=Something went wrong!");
    die();
}

?>