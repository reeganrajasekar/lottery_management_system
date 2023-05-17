<?php require("./layout/db.php");?>
<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>

<div class="main-panel">
    <div class="content-wrapper">
        <h4 class="text-secondary mb-3">
            Genarate Reports :
        </h4>
        <?php if(!isset($_GET["date"]) && !isset($_GET["memberid"])){ ?>
        <form action="" method="get" class="row">
            <h4 class="text-secondary mb-2">1 . General Report:</h4>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="form-floating mb-3">
                    <input required type="date" class="form-control bg-white"  name="date" placeholder="Date">
                    <label>Date</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="form-floating mb-3">
                    <select name="memberid" class="form-select" required>
                        <option value="" selected disabled>Select Member</option>
                        <?php
                        $sql = "SELECT name,id FROM member";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Member</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="text-center">
                    <button class="btn btn-primary h-100 mt-2">Search</button>
                </div>
            </div>
        </form>
        <br><br>
        <form target="_blank" action="/admin/action/report.php" method="POST" class="row">
            <h4 class="text-secondary mb-2">2 . Tickets Report:</h4>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="form-floating mb-3">
                    <input required type="datetime-local" class="form-control bg-white"  name="from" placeholder="Date">
                    <label>From Datetime</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="form-floating mb-3">
                    <input required type="datetime-local" class="form-control bg-white"  name="to" placeholder="Date">
                    <label>To Datetime</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4"></div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="form-floating mb-3">
                    <select name="memberid" class="form-select" required>
                        <option value="" selected disabled>Select Member</option>
                        <?php
                        $sql = "SELECT name,id FROM member";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Member</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="form-floating mb-3">
                    <select name="type" class="form-select" required>
                        <option value="" selected disabled>Select Type</option>
                        <option value="DO-01pm">Docoma - 01pm</option>
                        <option value="BU-02pm">Bhutan - 02pm</option>
                        <option value="KL-03pm">Kerala - 03pm</option>
                        <option value="BU-07pm">Bhutan - 07pm</option>
                        <option value="DO-08pm">Docoma - 08pm</option>
                    </select>
                    <label>Type</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="text-center">
                    <button class="btn btn-primary h-100 mt-2">Download</button>
                </div>
            </div>
        </form>
        <?php }else {

            $memberid=$_GET["memberid"];
            $sql = "SELECT * FROM member";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $membername=$row["name"];
                $membermobile=$row["mobile"];
            }
        ?>
            <div class="text-center mt-5">
                <button id="download-btn" onclick="demoFromHTML();" class="btn btn-primary">Download</button>
                <br><br><br>
                <a class="btn btn-secondary" href="/admin/report.php"><- Go Home</a>
            </div>
            <div class="container mt-3 bg-white border p-4" style="visibility:hidden" id="mypdf">
                <table style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>Agent id :<?php echo $memberid ?></th>
                            <th>Agent Name : <?php echo $membername ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Agent Mobile : <?php echo $membermobile ?></td>
                            <td>Date : <?php echo $_GET["date"] ?></td>
                        </tr>
                        <tr>
                            <td>Total Tokens : <span id="token"></span></td>
                            <td>Total Amount : <span id="total"></span></td>
                        </tr>
                    </tbody>
                </table>

                <table style="font-size: 13px;">
                    <?php
                        $date = $_GET["date"];
                        $memberid = $_GET["memberid"];
                        $sql = "SELECT token FROM token WHERE memberid='$memberid' AND time='DO-01pm' AND DATE(reg_date)='$date'";
                        $result = $conn->query($sql);
                        $data = "[";
                        while ($row = $result->fetch_assoc()) {
                            $data=$data.json_decode($row["token"]);
                            $data=$data.",";
                        }
                        $data = $data."]";
                    ?>
                    <h3>01pm - Docoma</h3>
                    <thead>
                        <tr>
                            <th>Token </th>
                            <th>Qty </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>30rs Tokens : </td>
                            <td id="d1_30"></td>
                        </tr>
                        <tr>
                            <td>AB Tokens : </td>
                            <td id="d1_AB"></td>
                        </tr>
                        <tr>
                            <td>AC Tokens : </td>
                            <td id="d1_AC"></td>
                        </tr>
                        <tr>
                            <td>BC Tokens : </td>
                            <td id="d1_BC"></td>
                        </tr>
                        <tr>
                            <td>A Tokens : </td>
                            <td id="d1_A"></td>
                        </tr>
                        <tr>
                            <td>B Tokens : </td>
                            <td id="d1_B"></td>
                        </tr>
                        <tr>
                            <td>C Tokens : </td>
                            <td id="d1_C"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Total Qty </th>
                            <th id="d1_q"></th>
                        </tr>
                        <tr>
                            <th>Total Amount </th>
                            <th id="d1_tot"></th>
                        </tr>
                    </tbody>
                    <script>
                        data = <?php echo $data ?>;
                        d1_30=0;d1_AB=0;d1_AC=0;d1_BC=0;d1_A=0;d1_B=0;d1_C=0;d1_q=0;d1_tot=0;
                        data.map((i)=>{
                            i[0].map((j,index)=>{
                                if(j=="30"){
                                    d1_30+=parseInt(i[2][index]);
                                }else if(j=="AB"){
                                    d1_AB+=parseInt(i[2][index]);
                                }else if(j=="AC"){
                                    d1_AC+=parseInt(i[2][index]);
                                }else if(j=="BC"){
                                    d1_BC+=parseInt(i[2][index]);
                                }else if(j=="A"){
                                    d1_A+=parseInt(i[2][index]);
                                }else if(j=="B"){
                                    d1_B+=parseInt(i[2][index]);
                                }else if(j=="C"){
                                    d1_C+=parseInt(i[2][index]);
                                }
                                d1_q+=parseInt(i[2][index]);
                            })
                        })
                        document.getElementById("d1_30").innerHTML=d1_30
                        document.getElementById("d1_AB").innerHTML=d1_AB
                        document.getElementById("d1_AC").innerHTML=d1_AC
                        document.getElementById("d1_BC").innerHTML=d1_BC
                        document.getElementById("d1_A").innerHTML=d1_A
                        document.getElementById("d1_B").innerHTML=d1_B
                        document.getElementById("d1_C").innerHTML=d1_C
                        document.getElementById("d1_q").innerHTML=d1_q
                        d1_tot=(d1_30*30)+(d1_AB*12)+(d1_AC*12)+(d1_BC*12)+(d1_A*12)+(d1_B*12)+(d1_C*12);
                        document.getElementById("d1_tot").innerHTML=d1_tot;
                    </script>
                </table>

                <table style="font-size: 13px">
                    <?php
                        $sql = "SELECT token FROM token WHERE memberid='$memberid' AND time='BU-02pm' AND DATE(reg_date)='$date'";
                        $result = $conn->query($sql);
                        $data2 = "[";
                        while ($row = $result->fetch_assoc()) {
                            $data2=$data2.json_decode($row["token"]);
                            $data2=$data2.",";
                        }
                        $data2 = $data2."]";
                    ?>
                    <h3>02pm - BHUTTAN</h3>
                    <thead>
                        <tr>
                            <th>Token </th>
                            <th>Qty </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>70rs Tokens : </td>
                            <td id="d2_70"></td>
                        </tr>
                        <tr>
                            <td>30rs Tokens : </td>
                            <td id="d2_30"></td>
                        </tr>
                        <tr>
                            <td>AB Tokens : </td>
                            <td id="d2_AB"></td>
                        </tr>
                        <tr>
                            <td>AC Tokens : </td>
                            <td id="d2_AC"></td>
                        </tr>
                        <tr>
                            <td>BC Tokens : </td>
                            <td id="d2_BC"></td>
                        </tr>
                        <tr>
                            <td>A Tokens : </td>
                            <td id="d2_A"></td>
                        </tr>
                        <tr>
                            <td>B Tokens : </td>
                            <td id="d2_B"></td>
                        </tr>
                        <tr>
                            <td>C Tokens : </td>
                            <td id="d2_C"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Total Qty </th>
                            <th id="d2_q"></th>
                        </tr>
                        <tr>
                            <th>Total Amount </th>
                            <th id="d2_tot"></th>
                        </tr>
                    </tbody>
                    <script>
                        data2 = <?php echo $data2 ?>;
                        d2_70=0;d2_30=0;d2_AB=0;d2_AC=0;d2_BC=0;d2_A=0;d2_B=0;d2_C=0;d2_q=0;d2_tot=0;
                        data2.map((i)=>{
                            i[0].map((j,index)=>{
                                if(j=="70"){
                                    d2_70+=parseInt(i[2][index]);
                                }else if(j=="30"){
                                    d2_30+=parseInt(i[2][index]);
                                }else if(j=="AB"){
                                    d2_AB+=parseInt(i[2][index]);
                                }else if(j=="AC"){
                                    d2_AC+=parseInt(i[2][index]);
                                }else if(j=="BC"){
                                    d2_BC+=parseInt(i[2][index]);
                                }else if(j=="A"){
                                    d2_A+=parseInt(i[2][index]);
                                }else if(j=="B"){
                                    d2_B+=parseInt(i[2][index]);
                                }else if(j=="C"){
                                    d2_C+=parseInt(i[2][index]);
                                }
                                d2_q+=parseInt(i[2][index]);
                            })
                        })
                        document.getElementById("d2_70").innerHTML=d2_70
                        document.getElementById("d2_30").innerHTML=d2_30
                        document.getElementById("d2_AB").innerHTML=d2_AB
                        document.getElementById("d2_AC").innerHTML=d2_AC
                        document.getElementById("d2_BC").innerHTML=d2_BC
                        document.getElementById("d2_A").innerHTML=d2_A
                        document.getElementById("d2_B").innerHTML=d2_B
                        document.getElementById("d2_C").innerHTML=d2_C
                        document.getElementById("d2_q").innerHTML=d2_q
                        d2_tot=(d2_70*70)+(d2_30*30)+(d2_AB*12)+(d2_AC*12)+(d2_BC*12)+(d2_A*12)+(d2_B*12)+(d2_C*12);
                        document.getElementById("d2_tot").innerHTML=d2_tot;
                    </script>
                </table>
                /n
                <table style="font-size: 14px;">
                    <?php
                        $sql = "SELECT token FROM token WHERE memberid='$memberid' AND time='KL-03pm' AND DATE(reg_date)='$date'";
                        $result = $conn->query($sql);
                        $data3 = "[";
                        while ($row = $result->fetch_assoc()) {
                            $data3=$data3.json_decode($row["token"]);
                            $data3=$data3.",";
                        }
                        $data3 = $data3."]";
                    ?>
                    <h3>03pm - KERALA</h3>
                    <thead>
                        <tr>
                            <th>Token </th>
                            <th>Qty </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <tr>
                            <td>110rs Tokens : </td>
                            <td id="d3_110"></td>
                        </tr>
                        <tr>
                            <td>70rs Tokens : </td>
                            <td id="d3_70"></td>
                        </tr>
                        <tr>
                            <td>60rs Tokens : </td>
                            <td id="d3_60"></td>
                        </tr>
                        <tr>
                            <td>30rs Tokens : </td>
                            <td id="d3_30"></td>
                        </tr>
                        <tr>
                            <td>AB Tokens : </td>
                            <td id="d3_AB"></td>
                        </tr>
                        <tr>
                            <td>AC Tokens : </td>
                            <td id="d3_AC"></td>
                        </tr>
                        <tr>
                            <td>BC Tokens : </td>
                            <td id="d3_BC"></td>
                        </tr>
                        <tr>
                            <td>A Tokens : </td>
                            <td id="d3_A"></td>
                        </tr>
                        <tr>
                            <td>B Tokens : </td>
                            <td id="d3_B"></td>
                        </tr>
                        <tr>
                            <td>C Tokens : </td>
                            <td id="d3_C"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Total Qty </th>
                            <th id="d3_q"></th>
                        </tr>
                        <tr>
                            <th>Total Amount </th>
                            <th id="d3_tot"></th>
                        </tr>
                    </tbody>
                    <script>
                        data3 = <?php echo $data3 ?>;
                        d3_110=0;d3_70=0;d3_60=0;d3_30=0;d3_AB=0;d3_AC=0;d3_BC=0;d3_A=0;d3_B=0;d3_C=0;d3_q=0;d3_tot=0;
                        data3.map((i)=>{
                            i[0].map((j,index)=>{
                                if(j=="110"){
                                    d3_110+=parseInt(i[2][index]);
                                }else if(j=="70"){
                                    d3_70+=parseInt(i[2][index]);
                                }else if(j=="60"){
                                    d3_60+=parseInt(i[2][index]);
                                }else if(j=="30"){
                                    d3_30+=parseInt(i[2][index]);
                                }else if(j=="AB"){
                                    d3_AB+=parseInt(i[2][index]);
                                }else if(j=="AC"){
                                    d3_AC+=parseInt(i[2][index]);
                                }else if(j=="BC"){
                                    d3_BC+=parseInt(i[2][index]);
                                }else if(j=="A"){
                                    d3_A+=parseInt(i[2][index]);
                                }else if(j=="B"){
                                    d3_B+=parseInt(i[2][index]);
                                }else if(j=="C"){
                                    d3_C+=parseInt(i[2][index]);
                                }
                                d3_q+=parseInt(i[2][index]);
                            })
                        })
                        document.getElementById("d3_110").innerHTML=d3_110
                        document.getElementById("d3_70").innerHTML=d3_70
                        document.getElementById("d3_60").innerHTML=d3_60
                        document.getElementById("d3_30").innerHTML=d3_30
                        document.getElementById("d3_AB").innerHTML=d3_AB
                        document.getElementById("d3_AC").innerHTML=d3_AC
                        document.getElementById("d3_BC").innerHTML=d3_BC
                        document.getElementById("d3_A").innerHTML=d3_A
                        document.getElementById("d3_B").innerHTML=d3_B
                        document.getElementById("d3_C").innerHTML=d3_C
                        document.getElementById("d3_q").innerHTML=d3_q
                        d3_tot=(d3_110*110)+(d3_70*70)+(d3_60*60)+(d3_30*30)+(d3_AB*12)+(d3_AC*12)+(d3_BC*12)+(d3_A*12)+(d3_B*12)+(d3_C*12);
                        document.getElementById("d3_tot").innerHTML=d3_tot;
                    </script>
                </table>

                <table style="font-size: 13px;">
                    <?php
                        $sql = "SELECT token FROM token WHERE memberid='$memberid' AND time='BU-07pm' AND DATE(reg_date)='$date'";
                        $result = $conn->query($sql);
                        $data7 = "[";
                        while ($row = $result->fetch_assoc()) {
                            $data7=$data7.json_decode($row["token"]);
                            $data7=$data7.",";
                        }
                        $data7 = $data7."]";
                    ?>
                    <h3>07pm - BHUTTAN</h3>
                    <thead>
                        <tr>
                            <th>Token </th>
                            <th>Qty </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>70rs Tokens : </td>
                            <td id="d7_70"></td>
                        </tr>
                        <tr>
                            <td>30rs Tokens : </td>
                            <td id="d7_30"></td>
                        </tr>
                        <tr>
                            <td>AB Tokens : </td>
                            <td id="d7_AB"></td>
                        </tr>
                        <tr>
                            <td>AC Tokens : </td>
                            <td id="d7_AC"></td>
                        </tr>
                        <tr>
                            <td>BC Tokens : </td>
                            <td id="d7_BC"></td>
                        </tr>
                        <tr>
                            <td>A Tokens : </td>
                            <td id="d7_A"></td>
                        </tr>
                        <tr>
                            <td>B Tokens : </td>
                            <td id="d7_B"></td>
                        </tr>
                        <tr>
                            <td>C Tokens : </td>
                            <td id="d7_C"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Total Qty </th>
                            <th id="d7_q"></th>
                        </tr>
                        <tr>
                            <th>Total Amount </th>
                            <th id="d7_tot"></th>
                        </tr>
                    </tbody>
                    <script>
                        data7 = <?php echo $data7 ?>;
                        d7_70=0;d7_30=0;d7_AB=0;d7_AC=0;d7_BC=0;d7_A=0;d7_B=0;d7_C=0;d7_q=0;d7_tot=0;
                        data7.map((i)=>{
                            i[0].map((j,index)=>{
                                if(j=="70"){
                                    d7_70+=parseInt(i[2][index]);
                                }else if(j=="30"){
                                    d7_30+=parseInt(i[2][index]);
                                }else if(j=="AB"){
                                    d7_AB+=parseInt(i[2][index]);
                                }else if(j=="AC"){
                                    d7_AC+=parseInt(i[2][index]);
                                }else if(j=="BC"){
                                    d7_BC+=parseInt(i[2][index]);
                                }else if(j=="A"){
                                    d7_A+=parseInt(i[2][index]);
                                }else if(j=="B"){
                                    d7_B+=parseInt(i[2][index]);
                                }else if(j=="C"){
                                    d7_C+=parseInt(i[2][index]);
                                }
                                d7_q+=parseInt(i[2][index]);
                            })
                        })
                        document.getElementById("d7_70").innerHTML=d7_70
                        document.getElementById("d7_30").innerHTML=d7_30
                        document.getElementById("d7_AB").innerHTML=d7_AB
                        document.getElementById("d7_AC").innerHTML=d7_AC
                        document.getElementById("d7_BC").innerHTML=d7_BC
                        document.getElementById("d7_A").innerHTML=d7_A
                        document.getElementById("d7_B").innerHTML=d7_B
                        document.getElementById("d7_C").innerHTML=d7_C
                        document.getElementById("d7_q").innerHTML=d7_q
                        d7_tot=(d7_70*70)+(d7_30*30)+(d7_AB*12)+(d7_AC*12)+(d7_BC*12)+(d7_A*12)+(d7_B*12)+(d7_C*12);
                        document.getElementById("d7_tot").innerHTML=d7_tot;
                    </script>
                </table>

                /n
                <table style="font-size: 14px;">
                    <?php
                        $sql = "SELECT token FROM token WHERE memberid='$memberid' AND time='DO-08pm' AND DATE(reg_date)='$date'";
                        $result = $conn->query($sql);
                        $data8 = "[";
                        while ($row = $result->fetch_assoc()) {
                            $data8=$data8.json_decode($row["token"]);
                            $data8=$data8.",";
                        }
                        $data8 = $data8."]";
                    ?>
                    <h3>08pm - Docoma</h3>
                    <thead>
                        <tr>
                            <th>Token </th>
                            <th>Qty </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>30rs Tokens : </td>
                            <td id="d8_30"></td>
                        </tr>
                        <tr>
                            <td>AB Tokens : </td>
                            <td id="d8_AB"></td>
                        </tr>
                        <tr>
                            <td>AC Tokens : </td>
                            <td id="d8_AC"></td>
                        </tr>
                        <tr>
                            <td>BC Tokens : </td>
                            <td id="d8_BC"></td>
                        </tr>
                        <tr>
                            <td>A Tokens : </td>
                            <td id="d8_A"></td>
                        </tr>
                        <tr>
                            <td>B Tokens : </td>
                            <td id="d8_B"></td>
                        </tr>
                        <tr>
                            <td>C Tokens : </td>
                            <td id="d8_C"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Total Qty </th>
                            <th id="d8_q"></th>
                        </tr>
                        <tr>
                            <th>Total Amount </th>
                            <th id="d8_tot"></th>
                        </tr>
                    </tbody>
                    <script>
                        data8 = <?php echo $data8 ?>;
                        d8_30=0;d8_AB=0;d8_AC=0;d8_BC=0;d8_A=0;d8_B=0;d8_C=0;d8_q=0;d8_tot=0;
                        data8.map((i)=>{
                            i[0].map((j,index)=>{
                                if(j=="30"){
                                    d8_30+=parseInt(i[2][index]);
                                }else if(j=="AB"){
                                    d8_AB+=parseInt(i[2][index]);
                                }else if(j=="AC"){
                                    d8_AC+=parseInt(i[2][index]);
                                }else if(j=="BC"){
                                    d8_BC+=parseInt(i[2][index]);
                                }else if(j=="A"){
                                    d8_A+=parseInt(i[2][index]);
                                }else if(j=="B"){
                                    d8_B+=parseInt(i[2][index]);
                                }else if(j=="C"){
                                    d8_C+=parseInt(i[2][index]);
                                }
                                d8_q+=parseInt(i[2][index]);
                            })
                        })
                        document.getElementById("d8_30").innerHTML=d8_30
                        document.getElementById("d8_AB").innerHTML=d8_AB
                        document.getElementById("d8_AC").innerHTML=d8_AC
                        document.getElementById("d8_BC").innerHTML=d8_BC
                        document.getElementById("d8_A").innerHTML=d8_A
                        document.getElementById("d8_B").innerHTML=d8_B
                        document.getElementById("d8_C").innerHTML=d8_C
                        document.getElementById("d8_q").innerHTML=d8_q
                        d8_tot=(d8_30*30)+(d8_AB*12)+(d8_AC*12)+(d8_BC*12)+(d8_A*12)+(d8_B*12)+(d8_C*12);
                        document.getElementById("d8_tot").innerHTML=d8_tot;
                    </script>
                </table>


            </div>
        <?php } ?>
    </div>
</div>

<script>
    document.getElementById("token").innerHTML=d1_q+d2_q+d3_q+d7_q+d8_q;
    document.getElementById("total").innerHTML=d1_tot+d2_tot+d3_tot+d7_tot+d8_tot;
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'px', 'a4');
        source = $('#mypdf')[0];
        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 20,
            bottom: 20,
            left: 50
        };
        pdf.fromHTML(
        source, 
        margins.left,
        margins.top, { 
            'elementHandlers': specialElementHandlers
        },

        function (dispose) {
            pdf.save('<?php echo($membername."_".$_GET["date"]) ?>.pdf');
        }, margins);
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

<?php require("./layout/Footer.php") ?>