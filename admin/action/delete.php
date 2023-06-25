<?php require("../layout/db.php");?>
<?php

try {
    $last_id = $_POST["id"];
    $conn->query("UPDATE token SET data='NOT' WHERE id='$last_id'");
    header("Location:/admin/tokens.php?msg=Token Deleted Successully! But you cannot restore the Token");
    die();
} catch (Exception $e) {
    header("Location:/admin/tokens.php?err=Something went Wrong!");
    die();
}