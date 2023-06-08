<?php 
require("../layout/db.php");
require("../layout/Header.php");
require("../layout/Navbar.php");
try {
    $from = $_POST["from"];
    $to = $_POST["to"];
    $memberid = $_POST["memberid"];
    $type = $_POST["type"];
    $sql = "SELECT * FROM token WHERE data='OK' AND time='$type' AND memberid='$memberid' AND reg_date>'$from' AND reg_date<'$to'";
    $result = $conn->query($sql);
    $data=[];
    while($row = $result->fetch_assoc()){
        $memberid = $row["memberid"];
        $membername = $row["membername"];
        array_push($data,[json_decode($row["token"])]);
    };
} catch (Exception $e) {
    header("Location:/report.php?err=Something went Wrong!");
    die();
}
?>
<script>
data=<?php echo(json_encode($data))?>;
t110=[]
t70=[]
t60=[]
t603=[]
t604=[]
t30=[]
tAB=[]
tAC=[]
tBC=[]
tA=[]
tB=[]
tC=[]
data.map(t=>{
    token=JSON.parse(t)
    loop=0
    token[0].map(i=>{
        if(i=="110"){
            if(t110.length>0){
                re=0;
                for(m=0;t110.length>m;m++){
                    if(t110[m][0]==token[1][loop]){
                        t110[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    t110.push([token[1][loop],token[2][loop]])
                }
            }else{
                t110.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="70"){
            if(t70.length>0){
                re=0;
                for(m=0;t70.length>m;m++){
                    if(t70[m][0]==token[1][loop]){
                        t70[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    t70.push([token[1][loop],token[2][loop]])
                }
            }else{
                t70.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="60"){
            if(t60.length>0){
                re=0;
                for(m=0;t60.length>m;m++){
                    if(t60[m][0]==token[1][loop]){
                        t60[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    t60.push([token[1][loop],token[2][loop]])
                }
            }else{
                t60.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="60-3D"){
            if(t603.length>0){
                re=0;
                for(m=0;t603.length>m;m++){
                    if(t603[m][0]==token[1][loop]){
                        t603[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    t603.push([token[1][loop],token[2][loop]])
                }
            }else{
                t603.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="60-4D"){
            if(t604.length>0){
                re=0;
                for(m=0;t604.length>m;m++){
                    if(t604[m][0]==token[1][loop]){
                        t604[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    t604.push([token[1][loop],token[2][loop]])
                }
            }else{
                t604.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="30"){
            if(t30.length>0){
                re=0;
                for(m=0;t30.length>m;m++){
                    if(t30[m][0]==token[1][loop]){
                        t30[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    t30.push([token[1][loop],token[2][loop]])
                }
            }else{
                t30.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="AB"){
            if(tAB.length>0){
                re=0;
                for(m=0;tAB.length>m;m++){
                    if(tAB[m][0]==token[1][loop]){
                        tAB[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    tAB.push([token[1][loop],token[2][loop]])
                }
            }else{
                tAB.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="AC"){
            if(tAC.length>0){
                re=0;
                for(m=0;tAC.length>m;m++){
                    if(tAC[m][0]==token[1][loop]){
                        tAC[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    tAC.push([token[1][loop],token[2][loop]])
                }
            }else{
                tAC.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="BC"){
            if(tBC.length>0){
                re=0;
                for(m=0;tBC.length>m;m++){
                    if(tBC[m][0]==token[1][loop]){
                        tBC[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    tBC.push([token[1][loop],token[2][loop]])
                }
            }else{
                tBC.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="A"){
            if(tA.length>0){
                re=0;
                for(m=0;tA.length>m;m++){
                    if(tA[m][0]==token[1][loop]){
                        tA[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    tA.push([token[1][loop],token[2][loop]])
                }
            }else{
                tA.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="B"){
            if(tB.length>0){
                re=0;
                for(m=0;tB.length>m;m++){
                    if(tB[m][0]==token[1][loop]){
                        tB[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    tB.push([token[1][loop],token[2][loop]])
                }
            }else{
                tB.push([token[1][loop],token[2][loop]])
            }
        }else if(i=="C"){
            if(tC.length>0){
                re=0;
                for(m=0;tC.length>m;m++){
                    if(tC[m][0]==token[1][loop]){
                        tC[m][1]++;
                        re=0
                        break;
                    }else{
                        re=1
                    }
                }
                if(re==1){
                    tC.push([token[1][loop],token[2][loop]])
                }
            }else{
                tC.push([token[1][loop],token[2][loop]])
            }
        }
        loop++
    })
})
</script>


<div class="main-panel">
    <div class="content-wrapper">
        <br>
        <h4 class="text-secondary mb-2">Tickets Report:</h4>
        <div class="text-center">
            <button type="button" class="btn btn-primary" onclick="tableToCSV()">
                download CSV
            </button>
        </div>
        <br>
        <div class="table-responsive" >
            <table class="table table-striped table-bordered " style="display:none;">
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Entry Report</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>From : </td>
                        <td><?php echo($from)?></td>
                        <td></td>
                        <td>To : </td>
                        <td><?php echo($to)?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Name :</td>
                        <td><?php echo($membername)?></td>
                        <td></td>
                        <td>ID</td>
                        <td><?php echo($memberid)?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <!-- 110 -->
                    <?php if($_POST["token"]=="110" || $_POST["token"]=="all"){ ?>
                    <script>
                        if(t110.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . 110</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            t110.sort()
                            t110.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>
                    
                    <?php 
                    }
                    if($_POST["token"]=="70" || $_POST["token"]=="all"){ 
                    ?>

                    <!-- 70 -->
                    <script>
                        if(t70.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . 70</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            t70.sort()
                            t70.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="60" || $_POST["token"]=="all"){ 
                    ?>
                    <!-- 60 -->
                    <script>
                        if(t60.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . 60</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            t60.sort()
                            t60.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="60-3D" || $_POST["token"]=="all"){ 
                    ?>
                    <!-- 60 -->
                    <script>
                        if(t603.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . 60-3D</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            t603.sort()
                            t603.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="60-4D" || $_POST["token"]=="all"){ 
                    ?>
                    <!-- 60-4D -->
                    <script>
                        if(t604.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . 60-4D</td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            t604.sort()
                            t604.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="30" || $_POST["token"]=="all"){ 
                    ?>
                    <!-- 30 -->
                    <script>
                        if(t30.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . 30</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            t30.sort()
                            t30.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="AB" || $_POST["token"]=="all" || $_POST["token"]=="board"){ 
                    ?>
                    <!-- AB -->
                    <script>
                        if(tAB.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . AB</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0
                            tAB.sort()
                            tAB.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>
                    <?php 
                    }
                    if($_POST["token"]=="BC" || $_POST["token"]=="all" || $_POST["token"]=="board"){ 
                    ?>
                    <!-- BC -->
                    <script>
                        if(tBC.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . BC</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            tBC.sort()
                            tBC.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="AC" || $_POST["token"]=="all" || $_POST["token"]=="board"){ 
                    ?>
                    <!-- AC -->
                    <script>
                        if(tAC.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . AC</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            tAC.sort()
                            tAC.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="A" || $_POST["token"]=="all" || $_POST["token"]=="board"){ 
                    ?>
                    <!-- A -->
                    <script>
                        if(tA.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . A</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            tA.sort()
                            tA.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="B" || $_POST["token"]=="all" || $_POST["token"]=="board"){ 
                    ?>
                    <!-- B -->
                    <script>
                        if(tB.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . B</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            tB.sort()
                            tB.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>''${i[0]}''</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>

                    <?php 
                    }
                    if($_POST["token"]=="C" || $_POST["token"]=="all" || $_POST["token"]=="board"){ 
                    ?>
                    <!-- C -->
                    <script>
                        if(tC.length > 0){
                            text=`
                            <tr>
                                <td><?php echo(substr($type,0,2))?> . C</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            j=0;
                            t=0;
                            tC.sort()
                            tC.map(i=>{
                                j++;
                                if (j==0) {
                                    text+=`<tr>`
                                }
                                text+=`
                                        <td>'${i[0]}'</td>
                                        <td>${i[1]}</td>
                                        <td></td>
                                `
                                t+=parseInt(i[1])
                                if (j==3) {
                                    text+=`</tr>`
                                    j=0
                                }
                            })
                            text+=`
                            <tr>
                                <td>Total : ${t}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            `
                            document.write(text)
                        }
                    </script>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function tableToCSV() {
 
 // Variable to store the final csv data
 var csv_data = [];

 // Get each row data
 var rows = document.getElementsByTagName('tr');
 for (var i = 0; i < rows.length; i++) {

     // Get each column data
     var cols = rows[i].querySelectorAll('td,th');

     // Stores each csv row data
     var csvrow = [];
     for (var j = 0; j < cols.length; j++) {

         // Get the text data of each cell
         // of a row and push it to csvrow
         csvrow.push(cols[j].innerHTML);
     }

     // Combine each column value with comma
     csv_data.push(csvrow.join(","));
 }

 // Combine each row data with new line character
 csv_data = csv_data.join('\n');

 // Call this function to download csv file 
 downloadCSVFile(csv_data);

}

function downloadCSVFile(csv_data) {

 // Create CSV file object and feed
 // our csv_data into it
 CSVFile = new Blob([csv_data], {
     type: "text/csv"
 });

 // Create to temporary link to initiate
 // download process
 var temp_link = document.createElement('a');

 // Download csv file
 temp_link.download = "<?php echo($memberid . "_" . $membername . "_" . $type . "_from_" . $from . "_to_" . $to)?>.csv";
 var url = window.URL.createObjectURL(CSVFile);
 temp_link.href = url;

 // This link should not be displayed
 temp_link.style.display = "none";
 document.body.appendChild(temp_link);

 // Automatically click the link to
 // trigger download
 temp_link.click();
 document.body.removeChild(temp_link);
}
</script>

<?php require("../layout/Footer.php") ?>
