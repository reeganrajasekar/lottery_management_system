<?php require("../layout/db.php");?>
<?php
date_default_timezone_set("Asia/Calcutta");
$t=time();
if(date("G",$t)=="14" && date("i",$t)>"50"){
    header("Location:/member/token.php?err=03pm - Kerala Tickets Closed!");
    die();
}elseif(date("G",$t)>"14"){
    header("Location:/member/token.php?err=03pm - Kerala Tickets Closed!");
    die();
}
if(isset($_POST["type"]) && isset($_POST["token"]) && isset($_POST["count"])){
    $type = json_encode($_POST["type"]);
    $token = json_encode($_POST["token"]);
    $count = json_encode($_POST["count"]);
    $memberid = $_SESSION["memberid"];
    $membername = $_SESSION["membername"];
    $data = trim(addslashes(json_encode("[".$type.",".$token.",".$count."]")));
    $time=$_POST["time"];
    $sql = "INSERT INTO token(time,token,memberid,membername) VALUES('$time','$data','$memberid','$membername');";

    try {
        $conn->query($sql);
        $last_id = $conn->insert_id;
        header("Location:/member/action/reprint.php?id=".$last_id);
        die();
    } catch (Exception $e) {
        header("Location:/member/03pmkerala.php?err=Something went Wrong!");
        die();
    }
}else{
    header("Location:/member/03pmkerala.php?err=Must have atleast one token!");
    die();
}
?>