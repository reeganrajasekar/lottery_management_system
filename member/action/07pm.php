<?php require("../layout/db.php");?>
<?php
date_default_timezone_set("Asia/Calcutta");
$t=time();

if(isset($_POST["type"]) && isset($_POST["token"]) && isset($_POST["count"])){
    $type = json_encode(array_reverse($_POST["type"]));
    $token = json_encode(array_reverse($_POST["token"]));
    $count = json_encode(array_reverse($_POST["count"]));
    $memberid = $_SESSION["memberid"];
    $membername = $_SESSION["membername"];
    $data = trim(addslashes(json_encode("[".$type.",".$token.",".$count."]")));
    $time=$_POST["time"];
    if(date("G",$t)>="20"){
        $nt = date("Y",$t)."-".date("m",$t)."-".date('d',strtotime("tomorrow"))." 00:00:00";
        $sql = "INSERT INTO token(time,token,memberid,membername,data,reg_date) VALUES('$time','$data','$memberid','$membername','OK','$nt');";
    }else{
        $sql = "INSERT INTO token(time,token,memberid,membername,data) VALUES('$time','$data','$memberid','$membername','OK');";
    }
    try {
        $conn->query($sql);
        $last_id = $conn->insert_id;
        header("Location:/member/action/reprint.php?id=".$last_id);
        die();
    } catch (Exception $e) {
        header("Location:/member/07pmbhuttan.php?err=Something went Wrong!");
        die();
    }
}else{
    header("Location:/member/07pmbhuttan.php?err=Must have atleast one token!");
    die();
}
?>