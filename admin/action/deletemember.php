<?php 
require("../layout/db.php");

$id = $_POST["id"];

$sql = "DELETE FROM member WHERE id='$id'";

try {
    $conn->query($sql);
    header("Location:/admin/members.php?msg=Member Account Deleted Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/admin/members.php?err=Member has Tickets. So we cannot Delete the member right now!");
    die();
}

?>