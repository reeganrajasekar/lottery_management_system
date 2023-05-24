<?php require("./layout/db.php");?>
<?php

try {
    $email = $_POST["email"];
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $conn->query("UPDATE admin SET password='admin'");
        header("Location:/admin/?msg=Password Changed!");
        die();
    }else{
        header("Location:/admin/?err=Email or Password is Wrong!");
        die();
    }
} catch (Exception $e) {
    header("Location:/admin/?err=Something went Wrong!");
    die();
}