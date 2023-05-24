<?php 
require("../layout/db.php");


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);
$id = $_POST["id"];

$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $sql = "DELETE FROM member WHERE id='$id'";
        try {
            $conn->query($sql);
            header("Location:/admin/members.php?msg=Member Account Deleted Successfully!");
            die();
        } catch (Exception $e) {
            header("Location:/admin/members.php?err=Something went Wrong!");
            die();
        }

    }
}else{
    header("Location:/admin/members.php?err=Admin email or Password is wrong!");
    die();
}


?>