<?php 
require("./layout/db.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);

$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        session_start();
        $_SESSION["admin"]="u6rv9tb8pq89u";
        $_SESSION["adminid"]=$row["id"];
        header("Location:/admin/home.php");
        die();
    }
}else{
    header("Location:/admin?err=Email or Password is Wrong!");
    die();
}
?>