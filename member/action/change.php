<?php require("../layout/db.php");?>
<?php

try {
    $email = $_POST["email"];
    $new = $_POST["newpassword"];
    $old = $_POST["oldpassword"];
    $memberid = $_SESSION["memberid"];
    $sql = "SELECT * FROM member WHERE email='$email' AND password='$old'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $conn->query("UPDATE member SET password='$new' WHERE id='$memberid'");
        header("Location:/member/home.php?msg=Password Changed!");
        die();
    }else{
        header("Location:/member/home.php?err=Email or Password is Wrong!");
        die();
    }
} catch (Exception $e) {
    header("Location:/member/home.php?err=Something went Wrong!");
    die();
}