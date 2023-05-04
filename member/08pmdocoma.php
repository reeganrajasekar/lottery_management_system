<?php require("./layout/db.php");?>
<?php require("./layout/Header.php") ?>
<?php 
require("./layout/Navbar.php");
date_default_timezone_set("Asia/Calcutta");
$t=time();
echo(date("G",$t));
if(date("G",$t)>"20" || date("G",$t)=="20"){
    header("Location:/member/token.php?err=08pm - Docoma Tickets Closed!");
    die();
}
?>

<div class="main-panel">
    <div class="container py-4" style="background-color:#f2edf3;min-height:100%">
        <h4 class="text-secondary">
            08pm - DOCOMA
        </h4>
        <br>
        <form action="/member/action/08pm.php" method="post">
            <input type="hidden" name="time" value="DO-08pm">
            <table class="table table-striped table-bordered w-100 text-center bg-white">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="40%">Type</th>
                        <th width="45%">Token</th>
                        <th width="8%">No</th>
                        <th width="5%">X</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="i0"></tr>
                    <script>
                        i=0
                        function addlist(){
                            document.getElementById("i"+i).innerHTML =`
                            <td>DO -</td>
                            <td>
                                <select class="w-100" onchange="list(${i})" style="height:35px" name="type[]" id="type${i}" required>
                                    <option value="" selected disabled>Choose</option>
                                    <option value="30">30</option>
                                    <option value="AB">AB</option>
                                    <option value="AC">AC</option>
                                    <option value="BC">BC</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </td>
                            <td>
                                <input class="w-100" style="height:35px" name="token[]" type="number"  id="token${i}" required>
                            </td>
                            <td>
                                <input class="w-100" style="height:35px" type="number" name="count[]" id="count${i}" required>
                            </td>
                            <td><i class="mdi mdi-delete menu-icon text-danger" onclick="delete_node(${i})"></i></td>
                            `
                            function insertAfter(referenceNode, newNode) {
                                referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
                            }
                            var el = document.createElement("tr");
                            el.id = 'i'+(i+1);
                            var div = document.getElementById('i'+i);
                            insertAfter(div, el);
                            i = i+1;
                        }
                        addlist()
                        function delete_node(item){
                            document.getElementById("i"+item).remove();
                        }
                        function list(item){
                            key = document.getElementById("type"+item).value;
                            min=0;
                            max=0;
                            switch (key) {
                                case "30":
                                    min=100
                                    max=999
                                    break;
                                case "AB":
                                    min=10
                                    max=99
                                    break;
                                case "AC":
                                    min=10
                                    max=99
                                    break;
                                case "BC":
                                    min=10
                                    max=99
                                    break;
                                case "A":
                                    min=0
                                    max=9
                                    break;
                                case "B":
                                    min=0
                                    max=9
                                    break;
                                case "C":
                                    min=0
                                    max=9
                                    break;
                            }
                            document.getElementById("token"+item).min=min
                            document.getElementById("token"+item).max=max
                        }       
                    </script>
                </tbody>
            </table>
            <br>
            <div style="display:flex;justify-content:space-between">
                <span class="btn btn-secondary" onclick="addlist()">+ Add</span>
                <button class="btn btn-primary">Next</button>
            </div>
        </form>
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
<style>
    td{
        padding:10px 4px !important;
    }
</style>

<?php require("./layout/Footer.php") ?>