<?php require("./layout/db.php");?>
<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>

<div class="main-panel">
    <div class="content-wrapper">
        <h4 class="text-secondary">
            Recent Tokens :
        </h4>
        <div class="row">
            <?php
                date_default_timezone_set("Asia/Calcutta");
                $date=date_create();
                $newdate = date_format($date,"Y-m-d");

                $memberid = $_SESSION["memberid"];
                $results_per_page = 15;   
                $query = "SELECT id FROM token WHERE data='OK' AND memberid='$memberid' AND DATE(reg_date)>='$newdate'";  
                $result = mysqli_query($conn, $query);  
                $number_of_result = mysqli_num_rows($result);  
                $number_of_page = ceil ($number_of_result / $results_per_page);  
    
                if (!isset ($_GET['page']) ) {  
                    $page = 1;  
                } else {  
                    $page = $_GET['page'];  
                } 
    
                $page_first_result = ($page-1) * $results_per_page; 

                $sql = "SELECT * FROM token WHERE data='OK' AND memberid='$memberid' AND DATE(reg_date)>='$newdate' ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $datec = strtotime($row["reg_date"]);
                    $datehour = date( 'H', $datec );
                    $datedate = date( 'd', $datec );
                    if($row["time"]=="DO-01pm" && $datedate==strval(date_format($date,'d')) && $datehour<14){continue;}
                    if($row["time"]=="BU-02pm" && $datedate==strval(date_format($date,'d')) && $datehour<15){continue;}
                    if($row["time"]=="KL-03pm" && $datedate==strval(date_format($date,'d')) && $datehour<16){continue;}
                    if($row["time"]=="BU-07pm" && $datedate==strval(date_format($date,'d')) && $datehour<20){continue;}
                    if($row["time"]=="DO-08pm" && $datedate==strval(date_format($date,'d')) && $datehour<21){continue;}
            ?>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Bill No : <?php echo($row["bill"])?></h5>
                            <p class="card-text"><span class="text-muted">Type :</span> <?php echo($row["time"])?></p>
                            <p class="card-text"><span class="text-muted">Date :</span> <script>document.write(moment('<?php echo($row["reg_date"])?>').format("DD/MM/YYYY HH:mm A"))</script></p>
                            <div style="display:flex;justify-content:flex-end" class="w-100">
                                <a target="_blank" href="/member/action/reprint.php?id=<?php echo($row["id"])?>" class="btn btn-primary">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <?php
        if($result->num_rows == 0){
        ?>
            <h4 class="mt-4 text-center text-secondary">Nothing Found!</h4>
        <?php
        }
        ?>
        <p style="text-align:center;line-height:3.5;font-size:16px">
            <?php 
            for($page = 1; $page<= $number_of_page; $page++) { 
                if($page==$_GET['page']){
                    echo '<a class="btn-primary" style="margin:5px;padding:10px;border-radius:5px;font-weight:600;color:#fff;text-decoration:none" href = "?page=' . $page . '">' . $page . ' </a>';  
                }else{
                    echo '<a style="margin:5px;padding:8px;border-radius:5px;border:1px solid #aaa;color:#444;text-decoration:none" href = "?page=' . $page . '">' . $page . ' </a>';  
                }
            }  
            ?>
        </p>
    </div>
</div>

<script>
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      if(urlParams.get('err')){
        document.write("<div id='err' style='position:fixed;bottom:30px; right:10px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
      }
      setTimeout(()=>{
          document.getElementById("err").style.display="none"
      }, 3000)
      if(urlParams.get('msg')){
        document.write("<div id='msg' style='position:fixed;bottom:30px; right:10px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
      }
      setTimeout(()=>{
          document.getElementById("msg").style.display="none"
      }, 3000)
  </script>

<?php require("./layout/Footer.php") ?>