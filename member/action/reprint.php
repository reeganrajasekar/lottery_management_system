<?php require("../layout/db.php");?>
<?php

try {
    $last_id = $_GET["id"];
    $sql = "SELECT * FROM token WHERE id='$last_id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $memberid = $row["memberid"];
        $membername = $row["membername"];
        $time = $row["time"];
        $date = $row["reg_date"];
        $data = json_decode($row["token"]);
    }
} catch (Exception $e) {
    header("Location:/member/02pmbhuttan.php?err=Something went Wrong!");
    die();
}

require("../layout/Header.php") ?>
<?php require("../layout/Navbar.php") ?>
<script>data = <?php echo($data)?></script>
<div class="main-panel">
    <div class="container py-4" style="background-color:#f2edf3;min-height:100%">
        <h4 class="text-secondary text-center">
            Bill Print
        </h4>
        <br>
    <div class="bg-white pb-0 mb-0" style="display:flex;align-items:center;justify-content:center">
        <pre id="pre_print" class="bg-white pb-0 mb-0" style="text-align:left !important;">
********************************
Bill No : <script>document.write(<?php echo($id)?>)</script>
Agent   : <script>document.write(<?php echo($memberid)?>)</script> - <script>document.write('<?php echo($membername)?>')</script>
Date    : <script>document.write(moment('<?php echo($date)?>').format("DD/MM/YYYY hh:mm A"))</script>
Type    : <script>document.write('<?php echo($time)?>')</script>
--------------------------------
 Ticket   |   Token    |  Qty 
--------------------------------
<script>
total = 0
tickets = 0
<?php
if($time == "KL-03pm"){
    ?>
    function val(id,count){
        tickets+=parseInt(count)
        if(id=="110"){
            total+=110*count
            return 110
        }
        if(id=="30"){
            total+=30*count
            return 30
        }
        if(id=="60"){
            total+=60*count
            return 60
        }
        if(id=="70"){
            total+=70*count
            return 70
        }
        if(id=="AB" || id=="AC" || id=="BC" || id=="A" || id=="B" || id=="C"){
            total+=13*count
            return 13
        }
    }
    <?php
}else{
    ?>
    function val(id,count){
        tickets+=parseInt(count)
        if(id=="30"){
            total+=30*count
            return 30
        }
        if(id=="60"){
            total+=60*count
            return 60
        }
        if(id=="70"){
            total+=70*count
            return 70
        }
        if(id=="AB" || id=="AC" || id=="BC" || id=="A" || id=="B" || id=="C"){
            total+=12*count
            return 12
        }
    }
    <?php
}
?>
for (i=0;i<data[0].length;i++) {
    document.write(`BU-${data[0][i].padEnd(3, ' ')}        ${data[1][i].padEnd(4, ' ')}         ${data[2][i]}  `)
    if(i+1!=data[0].length){
        document.write('\n')
    }
    val(data[0][i],data[2][i])
}
</script>
--------------------------------
Qty   : <script>document.write(tickets)</script>
Total : <script>document.write(total)</script>
********************************
        </pre>
    </div>
        <br>
        <div class="text-center">
            <button class="btn btn-success" onclick="BtPrint(document.getElementById('pre_print').innerText)">Print</button>
            <br><br><br>
            <a class="btn btn-secondary" href="/member/token.php"><- Go Home</a>
        </div>
    </div>
</div>

<script>
        function BtPrint(prn){
            var S = "#Intent;scheme=rawbt;";
            var P =  "package=ru.a402d.rawbtprinter;end;";
            var textEncoded = encodeURI(prn);
            window.location.href="intent:\x1B\x21\1"+textEncoded+S+P;
        }
  
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      if(urlParams.get('err')){
        document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
      }
      setTimeout(()=>{
          document.getElementById("err").style.display="none"
      }, 3000)
      if(urlParams.get('msg')){
        document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
      }
      setTimeout(()=>{
          document.getElementById("msg").style.display="none"
      }, 3000)
  </script>
<style>
    td{
        padding:10px 4px !important;
    }
</style>

<?php require("../layout/Footer.php") ?>