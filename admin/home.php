<?php require("./layout/db.php") ?>
<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 col-xl-6 col-sm-12 col-md-12">
                <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <img src="/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Today Tokens
                            </h4>
                            <h2 class="mb-3" id="tokens">
                            </h2>
                            <?php
                                date_default_timezone_set("Asia/Calcutta");
                                $date=date_create();
                                $newdate = date_format($date,"Y-m-d");
                                $sql = "SELECT token FROM token WHERE DATE(reg_date)='$newdate'";
                                $result = $conn->query($sql);
                                $data = "[";
                                while ($row = $result->fetch_assoc()) {
                                    $data=$data.json_decode($row["token"]);
                                    $data=$data.",";
                                }
                                $data = $data."]";
                            ?>
                            <script>
                                data = <?php echo $data ?>;
                                d1_q=0;
                                data.map((i)=>{
                                    i[0].map((j,index)=>{
                                        d1_q+=parseInt(i[2][index]);
                                    })
                                })
                                document.getElementById("tokens").innerHTML=d1_q
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6 col-sm-12 col-md-12">
                <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-primary card-img-holder text-white">
                        <div class="card-body">
                            <img src="/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Today Docoma-01pm Tokens
                            </h4>
                            <h2 class="mb-3" id="d1">
                            </h2>
                            <?php
                                date_default_timezone_set("Asia/Calcutta");
                                $date=date_create();
                                $newdate = date_format($date,"Y-m-d");
                                $sql = "SELECT token FROM token WHERE time='DO-01pm' AND DATE(reg_date)='$newdate'";
                                $result = $conn->query($sql);
                                $data1 = "[";
                                while ($row = $result->fetch_assoc()) {
                                    $data1=$data1.json_decode($row["token"]);
                                    $data1=$data1.",";
                                }
                                $data1 = $data1."]";
                            ?>
                            <script>
                                data1 = <?php echo $data1 ?>;
                                d1=0;
                                data1.map((i)=>{
                                    i[0].map((j,index)=>{
                                        d1+=parseInt(i[2][index]);
                                    })
                                })
                                document.getElementById("d1").innerHTML=d1
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6 col-sm-12 col-md-12">
                <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Today Bhuttan-02pm Tokens
                            </h4>
                            <h2 class="mb-3" id="d2">
                            </h2>
                            <?php
                                date_default_timezone_set("Asia/Calcutta");
                                $date=date_create();
                                $newdate = date_format($date,"Y-m-d");
                                $sql = "SELECT token FROM token WHERE time='BU-02pm' AND DATE(reg_date)='$newdate'";
                                $result = $conn->query($sql);
                                $data2 = "[";
                                while ($row = $result->fetch_assoc()) {
                                    $data2=$data2.json_decode($row["token"]);
                                    $data2=$data2.",";
                                }
                                $data2 = $data2."]";
                            ?>
                            <script>
                                data2 = <?php echo $data2 ?>;
                                d2=0;
                                data2.map((i)=>{
                                    i[0].map((j,index)=>{
                                        d2+=parseInt(i[2][index]);
                                    })
                                })
                                document.getElementById("d2").innerHTML=d2
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6 col-sm-12 col-md-12">
                <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Today Kerala-03pm Tokens
                            </h4>
                            <h2 class="mb-3" id="d3">
                            </h2>
                            <?php
                                date_default_timezone_set("Asia/Calcutta");
                                $date=date_create();
                                $newdate = date_format($date,"Y-m-d");
                                $sql = "SELECT token FROM token WHERE time='KL-03pm' AND DATE(reg_date)='$newdate'";
                                $result = $conn->query($sql);
                                $data3 = "[";
                                while ($row = $result->fetch_assoc()) {
                                    $data3=$data3.json_decode($row["token"]);
                                    $data3=$data3.",";
                                }
                                $data3 = $data3."]";
                            ?>
                            <script>
                                data3 = <?php echo $data3 ?>;
                                d3=0;
                                data3.map((i)=>{
                                    i[0].map((j,index)=>{
                                        d3+=parseInt(i[2][index]);
                                    })
                                })
                                document.getElementById("d3").innerHTML=d3
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6 col-sm-12 col-md-12">
                <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-warning card-img-holder text-white">
                        <div class="card-body">
                            <img src="/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Today Bhuttan-07pm Tokens
                            </h4>
                            <h2 class="mb-3" id="d7">
                            </h2>
                            <?php
                                date_default_timezone_set("Asia/Calcutta");
                                $date=date_create();
                                $newdate = date_format($date,"Y-m-d");
                                $sql = "SELECT token FROM token WHERE time='BU-07pm' AND DATE(reg_date)='$newdate'";
                                $result = $conn->query($sql);
                                $data7 = "[";
                                while ($row = $result->fetch_assoc()) {
                                    $data7=$data7.json_decode($row["token"]);
                                    $data7=$data7.",";
                                }
                                $data7 = $data7."]";
                            ?>
                            <script>
                                data7 = <?php echo $data7 ?>;
                                d7=0;
                                data7.map((i)=>{
                                    i[0].map((j,index)=>{
                                        d7+=parseInt(i[2][index]);
                                    })
                                })
                                document.getElementById("d7").innerHTML=d7
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6 col-sm-12 col-md-12">
                <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-secondary card-img-holder text-white">
                        <div class="card-body">
                            <img src="/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Today Docoma-08pm Tokens
                            </h4>
                            <h2 class="mb-3" id="d8">
                            </h2>
                            <?php
                                date_default_timezone_set("Asia/Calcutta");
                                $date=date_create();
                                $newdate = date_format($date,"Y-m-d");
                                $sql = "SELECT token FROM token WHERE time='DO-08pm' AND DATE(reg_date)='$newdate'";
                                $result = $conn->query($sql);
                                $data8 = "[";
                                while ($row = $result->fetch_assoc()) {
                                    $data8=$data8.json_decode($row["token"]);
                                    $data8=$data8.",";
                                }
                                $data8 = $data8."]";
                            ?>
                            <script>
                                data8 = <?php echo $data8 ?>;
                                d8=0;
                                data8.map((i)=>{
                                    i[0].map((j,index)=>{
                                        d8+=parseInt(i[2][index]);
                                    })
                                })
                                document.getElementById("d8").innerHTML=d8
                            </script>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require("./layout/Footer.php") ?>