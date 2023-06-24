<?php require("../layout/db.php");?>
<?php

try {
    $last_id = $_GET["id"];
    $sql = "SELECT * FROM token WHERE id='$last_id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $bill = $row["bill"];
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
            Bill Print Preview
        </h4>
        <br>
    <div class="bg-white pb-0 mb-0" style="display:flex;align-items:center;justify-content:center">
        <pre id="pre_print" class="bg-white pb-0 mb-0" style="text-align:left !important;">
********************************
Bill No : <script>document.write(<?php echo($bill)?>)</script>
XXXX    : <script>document.write('<?php echo($membername)?>')</script>
Date    : <script>document.write(moment('<?php echo($date)?>').format("DD/MM/YYYY"))</script>
Type    : <script>document.write('<?php echo($time)?>')</script>
--------------------------------
 Ticket  |    Token     |  Qty
             S  |   E
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
        if(id=="60-3D" || id=="60-4D" || id=="60"){
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
        if(id=="60-3D" || id=="60-4D" || id=="60"){
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
datum=[]
for (i=0;i<data[0].length;i++) {
    if(data[0][i]==data[0][i+1]){
        if(parseInt(data[1][i])==parseInt((data[1][i+1])-1)){
            console.log(tickets);
            starti = i
            console.log(data[1][starti]);
            while(starti<data[1].length) {
                if(parseInt(data[1][starti])==parseInt(data[1][starti+1])-1 && parseInt(data[1][i])==parseInt(data[1][i+1])){
                    val(data[0][starti],data[2][starti])
                    starti++
                }else{
                    break;
                }
            }
            datum.push([data[0][i],data[1][i],data[1][starti],data[2][i]])
            i=starti
        }else{
            datum.push([data[0][i],data[1][i],data[1][i],data[2][i]])
            val(data[0][i],data[2][i])
        }
    }else{
        datum.push([data[0][i],data[1][i],data[1][i],data[2][i]])
        val(data[0][i],data[2][i])
    }
}
ticketsc=0;
totalc=0;
for (i=0;i<=datum.length;i++) {
    if(datum[i][2]-datum[i][1]==0){
        cur=datum[i][3]
    }else{
        cur=(((datum[i][2]-datum[i][1])+1)*datum[i][3])
    }
    ticketsc+=parseInt(cur)
    totalc+=val(datum[i][0],1)*cur
    console.log(totalc);
    document.write(`<?php echo(substr($time,0,2))?>-${datum[i][0].padEnd(5, ' ')}   ${datum[i][1].padStart(4, ' ')} | ${datum[i][2].padEnd(4, ' ')}     ${cur}`)
    if(i!=datum.length){
        document.write('\n')
    }
}
</script>
--------------------------------
Qty   : <script>document.write(ticketsc)</script>
Total : <script>document.write(totalc)</script>
********************************
        </pre>
    </div>
        <br>
        <div class="text-center">
            <br><br><br>
            <a class="btn btn-secondary" href="/admin/tokens.php"><- Go Home</a>
        </div>
    </div>
</div>

<style>
    td{
        padding:10px 4px !important;
    }
</style>

<?php require("../layout/Footer.php") ?>