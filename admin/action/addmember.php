<?php 
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_POST["name"]);
$mobile = test_input($_POST["mobile"]);
$email = test_input($_POST["email"]);

$sql = "INSERT INTO member(name,mobile,email,password,data) VALUES('$name','$mobile','$email','$mobile','Active');";


try {
    $conn->query($sql);
    header("Location:/admin/members.php?msg=Member Account Created Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/admin/members.php?err=Duplicate Entry Found!");
    die();
}

?>