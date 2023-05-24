<?php require("../layout/db.php");?>
<?php

try {
    $email = $_POST["email"];
    $new = $_POST["newpassword"];
    $old = $_POST["oldpassword"];
    $adminid = $_SESSION["adminid"];
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$old'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $conn->query("UPDATE admin SET password='$new'");
        header("Location:/admin/home.php?msg=Password Changed!");
        die();
    }else{
        header("Location:/admin/home.php?err=Email or Password is Wrong!");
        die();
    }
} catch (Exception $e) {
    header("Location:/admin/home.php?err=Something went Wrong!");
    die();
}