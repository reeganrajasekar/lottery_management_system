<?php 
require("./admin/layout/db.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);

$sql = "SELECT * FROM member WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        session_start();
        $_SESSION["memberid"]=$row["id"];
        $_SESSION["membername"]=$row["name"];
        $_SESSION["membermobile"]=$row["mobile"];
        $_SESSION["memberemail"]=$row["email"];
        header("Location:/member/home.php");
        die();
    }
}else{
    header("Location:/?err=Id or Password is Wrong!");
    die();
}
?>