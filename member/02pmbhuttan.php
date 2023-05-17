<?php require("./layout/db.php");?>
<?php require("./layout/Header.php") ?>
<?php 
require("./layout/Navbar.php");
date_default_timezone_set("Asia/Calcutta");
$t=time();
if(date("G",$t)=="13" && date("i",$t)>"45"){
    header("Location:/member/token.php?err=02pm - Bhuttan Tickets Closed!");
    die();
}elseif(date("G",$t)>"13"){
    header("Location:/member/token.php?err=02pm - Bhuttan Tickets Closed!");
    die();
}
?>

<div class="main-panel">
    <div class="container py-4" style="background-color:#f2edf3;min-height:100%">
        <h4 class="text-secondary">
            02pm - BHUTTAN
        </h4>
        <br>
        <form action="/member/action/02pm.php" method="post">
            <input type="hidden" name="time" value="BU-02pm">
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
                            <td>BU -</td>
                            <td>
                                <select class="w-100" onchange="list(${i})" style="height:35px" name="type[]" id="type${i}" required>
                                    <option value="" selected disabled>Choose</option>
                                    <option value="70">70</option>
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
                                case "70":
                                    min=100
                                    max=999
                                    break;
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

<style>
    td{
        padding:10px 4px !important;
    }
</style>

<?php require("./layout/Footer.php") ?>