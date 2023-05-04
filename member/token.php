<?php require("./layout/db.php");?>
<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>

<div class="main-panel">
    <div class="content-wrapper">
        <h4 class="text-secondary">
            Get Ticket :
        </h4>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 my-2">
                <a class="btn btn-danger w-100" href="/member/01pmdocoma.php" style="min-height:90px;display:flex;align-items:center;justify-content:center">
                    <span style="font-size:22px;">01pm - DOCOMA</span>
                </a>
            </div>  
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 my-2">
                <a class="btn btn-info w-100" href="/member/02pmbhuttan.php" style="min-height:90px;display:flex;align-items:center;justify-content:center">
                    <span style="font-size:22px;">02pm - BHUTTAN</span>
                </a>
            </div> 
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 my-2">
                <a class="btn btn-warning w-100" href="/member/03pmkerala.php" style="min-height:90px;display:flex;align-items:center;justify-content:center">
                    <span style="font-size:22px;">03pm - KERALA</span>
                </a>
            </div> 
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 my-2">
                <a class="btn btn-info w-100" href="/member/07pmbhuttan.php" style="min-height:90px;display:flex;align-items:center;justify-content:center">
                    <span style="font-size:22px;">07pm - BHUTTAN</span>
                </a>
            </div> 
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 my-2">
                <a class="btn btn-danger w-100" href="/member/08pmdocoma.php" style="min-height:90px;display:flex;align-items:center;justify-content:center">
                    <span style="font-size:22px;">08pm - DOCOMA</span>
                </a>
            </div> 
        </div>
    </div>
</div>

<script>
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