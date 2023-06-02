<?php require("./layout/db.php");?>
<?php require("./layout/Header.php") ?>
<?php 
require("./layout/Navbar.php");
date_default_timezone_set("Asia/Calcutta");
$t=time();
if((date("G",$t)=="20" && date("i",$t)>"10" ) || (date("G",$t)=="21" && date("i",$t)<"10")){
    header("Location:/member/token.php?err=08pm - Docoma Tickets Closed!");
    die();
}
?>

<div class="main-panel">
    <div class="container py-4" style="background-color:#f2edf3;min-height:100%">
        <h4 class="text-secondary">
            08pm - DOCOMA <?php if(date("G",$t)>="21"){?><span class="text-danger">( Tomorrow Token )</span><?php } ?>
        </h4>
        <br>
        <form onsubmit="return addlist(document.getElementById('type').value,document.getElementById('token').value,document.getElementById('qty').value)" class="container py-3 bg-white border">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 mb-3">
                    <div class="form-floating">
                        <select id="type" required onchange="tokenchange()" class="w-100 form-select h-100" placeholder="Type">
                            <option value="" selected disabled>Choose Type</option>
                            <option value="30">30</option>
                            <option value="AB">AB</option>
                            <option value="AC">AC</option>
                            <option value="BC">BC</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                        <label>Type</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-6">
                    <div class="form-floating">
                        <input id="token" required type="number" class="form-control w-100" placeholder="Token">
                        <label>Token</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-6">
                    <div class="form-floating">
                        <input id="qty" required type="number" value="1" class="form-control w-100" placeholder="Qty">
                        <label>Qty</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6 text-start">
                    <span class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropstr">Straight</span>
                    <div class="modal fade" id="staticBackdropstr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Straight</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label class="pb-2">Type :</label>
                                    <select class="form-select mb-3" style="height:35px" id="sttype">
                                        <option value="" selected disabled>Choose</option>
                                        <option value="30">30</option>
                                        <option value="AB">AB</option>
                                        <option value="AC">AC</option>
                                        <option value="BC">BC</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                    <label class="pb-2">Qty :</label>
                                    <input type="number" id="stqty" value="1" class="form-control mb-4" placeholder="Qty">
                                    
                                    <label class="pb-2">Start :</label>
                                    <input type="number" id="ststart" class="form-control mb-3" placeholder="Start Number">
                                    <label class="pb-2">End :</label>
                                    <input type="number" id="stend" class="form-control mb-3" placeholder="End Number">
                                    <div class="text-end">
                                        <button type="button" class="btn btn-primary" onclick="addstraight()">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function addstraight(){
                            stqty = document.getElementById("stqty").value
                            sttype = document.getElementById("sttype").value
                            ststart = document.getElementById("ststart").value
                            stend = document.getElementById("stend").value
                            if (sttype=="30") {
                                if(ststart.length==3 && stend.length==3){
                                    for(st=ststart;st<=stend;st++){
                                        addlist(sttype,st.toString().padStart(3,"0"),stqty)
                                    }
                                    document.getElementById("ststart").value=""
                                    document.getElementById("stend").value=""
                                    $('#staticBackdropstr').modal('hide');
                                }else{
                                    alert("Start and End Should be 3 digit!")
                                }
                            }
                            if (sttype=="AB" || sttype=="BC" || sttype=="AC") {
                                if(ststart.length==2 && stend.length==2){
                                    for(st=ststart;st<=stend;st++){
                                        addlist(sttype,st.toString().padStart(2,"0"),stqty)
                                    }
                                    document.getElementById("ststart").value=""
                                    document.getElementById("stend").value=""
                                    $('#staticBackdropstr').modal('hide');
                                }else{
                                    alert("Start and End Should be 2 digit!")
                                }
                            }
                            if (sttype=="A" || sttype=="B" ||sttype=="C") {
                                if(ststart.length==1 && stend.length==1){
                                    for(st=ststart;st<=stend;st++){
                                        addlist(sttype,st.toString().padStart(1,"0"),stqty)
                                    }
                                    document.getElementById("ststart").value=""
                                    document.getElementById("stend").value=""
                                    $('#staticBackdropstr').modal('hide');
                                }else{
                                    alert("Start and End Should be 1 digit!")
                                }
                            }
                        }
                    </script>
                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-primary">+Add</button>
                </div>
                <div class="col-12">
                    <span class="btn  mt-3 px-4 btn-secondary" onclick="addBoard()">All Board</span>
                    <script>
                        function addBoard(){
                            onv = document.getElementById('token').value;
                            onqty = document.getElementById('qty').value;
                            if(onv && onqty){
                                if (onv.length==2) {
                                    allb = ["AB","BC","AC"]
                                    allb.map((allbone)=>{
                                        addlist(allbone,onv,onqty)
                                    })
                                }else if (onv.length==1) {
                                    allb = ["A","B","C"]
                                    allb.map((allbone)=>{
                                        addlist(allbone,onv,onqty)
                                    })
                                }else{
                                    alert("All Board Token Must be 2 or 3 digit")
                                }
                            }else{
                                alert("Select Token and Qty")
                            }
                        }
                    </script>
                    <span class="btn mt-3 px-4 btn-warning" onclick="addBox()">Box</span>
                    <span class="btn mt-3 px-4 btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Set</span>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add Set</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label class="pb-2">Type :</label>
                                <select class="form-select mb-3" style="height:35px" id="stype">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="30">30</option>
                                    <option value="AB">AB</option>
                                    <option value="AC">AC</option>
                                    <option value="BC">BC</option>
                                </select>
                                <label class="pb-2">Qty :</label>
                                <input type="number" id="sqty" value="1" class="form-control mb-4" placeholder="Qty">
                                
                                <label class="pb-2">Start :</label>
                                <input type="number" id="sstart" class="form-control mb-3" placeholder="Start Number">
                                <label class="pb-2">End :</label>
                                <input type="number" id="send" class="form-control mb-3" placeholder="End Number">
                                <label class="pb-2">Step :</label>
                                <input type="number" id="sstep" class="form-control mb-4" placeholder="Step">
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary" onclick="addSet()">Add</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <form action="/member/action/08pm.php" method="post">
            <input type="hidden" name="time" value="DO-08pm">
            <table class="table table-striped table-bordered w-100 text-center bg-white">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="40%">Type</th>
                        <th width="45%">Token</th>
                        <th width="8%">Qty</th>
                        <th width="5%">X</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="i0"></tr>
                    <script>
                        i=0
                        function addlist(type,token,qty){
                            document.getElementById("i"+i).innerHTML =`
                            <td>DO -</td>
                            <td>
                                <input class="w-100" style="height:35px" value="${type}" name="type[]" type="hidden"  required>
                                <span>${type}</span>
                            </td>
                            <td>
                                <input class="w-100" style="height:35px" value="${token}" name="token[]" type="hidden" required>
                                <span>${token}</span>
                            </td>
                            <td>
                                <input class="w-100" style="height:35px" value="${qty}" type="hidden" name="count[]" required>
                                <span>${qty}</span>
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
                            document.getElementById('token').value=""
                            document.getElementById('token').focus()
                            return false
                        }
                        function delete_node(item){
                            document.getElementById("i"+item).remove();
                        }
                        function addSet(){
                            stype = document.getElementById("stype").value
                            sqty = document.getElementById("sqty").value
                            sstart = Array.from(String(document.getElementById("sstart").value), num => Number(num))
                            send = Array.from(String(document.getElementById("send").value), num => Number(num))
                            sstep = Array.from(String(document.getElementById("sstep").value), num => Number(num))
                            if(stype && sqty){
                                if(stype=="30"){
                                    if(sstart.length==3 && send.length==3 && sstep.length==3){
                                        setlist1=[]
                                        setlist2=[]
                                        setlist3=[]
                                        if(sstep[0]==1 && sstart[0]!=send[0]){
                                            newitem=sstart[0]
                                            while(newitem<=send[0]){
                                                setlist1.push(newitem)
                                                newitem++
                                            }
                                            if (setlist1.length!=10) {
                                                for (let index = 0; index < setlist1.length; index++) {
                                                    if (setlist1.length!=10) {
                                                        setlist1.unshift(0)
                                                    }
                                                }
                                            }
                                        }else{
                                            if (setlist1.length!=10) {
                                                for (let index = 0; index <= 10; index++) {
                                                    if (setlist1.length!=10) {
                                                        setlist1.unshift(send[0])
                                                    }
                                                }
                                            }
                                        }
    
                                        if(sstep[1]==1 && sstart[1]!=send[1]){
                                            newitem=sstart[1]
                                            while(newitem<=send[1]){
                                                setlist2.push(newitem)
                                                newitem++
                                            }
                                            if (setlist2.length!=10) {
                                                for (let index = 0; index < setlist2.length; index++) {
                                                    if (setlist2.length!=10) {
                                                        setlist2.unshift(0)
                                                    }
                                                }
                                            }
                                        }else{
                                            if (setlist2.length!=10) {
                                                for (let index = 0; index <= 10; index++) {
                                                    if (setlist2.length!=10) {
                                                        setlist2.unshift(send[1])
                                                    }
                                                }
                                            }
                                        }
    
                                        if(sstep[2]==1 && sstart[2]!=send[2]){
                                            newitem=sstart[2]
                                            while(newitem<=send[2]){
                                                setlist3.push(newitem)
                                                newitem++
                                            }
                                            if (setlist3.length!=10) {
                                                for (let index = 0; index < setlist3.length; index++) {
                                                    if (setlist3.length!=10) {
                                                        setlist3.unshift(0)
                                                    }
                                                }
                                            }
                                        }else{
                                            if (setlist3.length!=10) {
                                                for (let index = 0; index <= 10; index++) {
                                                    if (setlist3.length!=10) {
                                                        setlist3.unshift(send[2])
                                                    }
                                                }
                                            }
                                        }
                                        newloop=0;
                                        while(newloop<setlist1.length){
                                            newtok = setlist1[newloop]+""+setlist2[newloop]+""+setlist3[newloop]
                                            addlist(stype,newtok,sqty)
                                            newloop++;
                                        }
                                        document.getElementById("send").value=""
                                        document.getElementById("sstart").value=""
                                        document.getElementById("sstep").value=""
                                        $('#staticBackdrop').modal('hide');
                                    }else{
                                        alert("Token must be three digit")
                                    }
                                }else{
                                    if(sstart.length==2 && send.length==2 && sstep.length==2){
                                        setlist1=[]
                                        setlist2=[]
                                        if(sstep[0]==1 && sstart[0]!=send[0]){
                                            newitem=sstart[0]
                                            while(newitem<=send[0]){
                                                setlist1.push(newitem)
                                                newitem++
                                            }
                                            if (setlist1.length!=10) {
                                                for (let index = 0; index < setlist1.length; index++) {
                                                    if (setlist1.length!=10) {
                                                        setlist1.unshift(0)
                                                    }
                                                }
                                            }
                                        }else{
                                            if (setlist1.length!=10) {
                                                for (let index = 0; index <= 10; index++) {
                                                    if (setlist1.length!=10) {
                                                        setlist1.unshift(send[0])
                                                    }
                                                }
                                            }
                                        }
    
                                        if(sstep[1]==1 && sstart[1]!=send[1]){
                                            newitem=sstart[1]
                                            while(newitem<=send[1]){
                                                setlist2.push(newitem)
                                                newitem++
                                            }
                                            if (setlist2.length!=10) {
                                                for (let index = 0; index < setlist2.length; index++) {
                                                    if (setlist2.length!=10) {
                                                        setlist2.unshift(0)
                                                    }
                                                }
                                            }
                                        }else{
                                            if (setlist2.length!=10) {
                                                for (let index = 0; index <= 10; index++) {
                                                    if (setlist2.length!=10) {
                                                        setlist2.unshift(send[1])
                                                    }
                                                }
                                            }
                                        }
                                        newloop=0;
                                        while(newloop<setlist1.length){
                                            newtok = setlist1[newloop]+""+setlist2[newloop]
                                            addlist(stype,newtok,sqty)
                                            newloop++;
                                        }
                                        document.getElementById("send").value=""
                                        document.getElementById("sstart").value=""
                                        document.getElementById("sstep").value=""
                                        $('#staticBackdrop').modal('hide');
                                    }else{
                                        alert("Token must be two digit")
                                    }
                                }
                            }else{
                                alert("Select Token Type and Qty")
                            }
                        }     
                        function tokenchange(){
                            key = document.getElementById("type").value;
                            min=0;
                            max=0;
                            switch (key) {
                                case "30":
                                    min=000
                                    max=999
                                    break;
                                case "AB":
                                    min=00
                                    max=99
                                    break;
                                case "AC":
                                    min=00
                                    max=99
                                    break;
                                case "BC":
                                    min=00
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
                            document.getElementById("token").min=min
                            document.getElementById("token").max=max
                        } 
                        function combinations(array) {
                            return new Array(1 << array.length).fill().map(
                                (e1, i) => array.filter((e2, j) => i & 1 << j));
                        }
                        function permute(permutation) {
                            var length = permutation.length,
                                result = [permutation.slice()],
                                c = new Array(length).fill(0),
                                i = 1, k, p;

                            while (i < length) {
                                if (c[i] < i) {
                                    k = i % 2 && c[i];
                                    p = permutation[i];
                                    permutation[i] = permutation[k];
                                    permutation[k] = p;
                                    ++c[i];
                                    i = 1;
                                    result.push(permutation.slice());
                                } else {
                                    c[i] = 0;
                                    ++i;
                                }
                            }
                            return result;
                        }
                        function calculateAllCombinations(myArray) {
                            var allValues = combinations(myArray)
                            var response = allValues
                            for(let v of allValues) {
                                response = response.concat(permute(v))
                            }
                            return Array.from(new Set(response.map(JSON.stringify)), JSON.parse)
                        }
                        function addBox(){
                            onev = document.getElementById('token').value;
                            onetype = document.getElementById('type').value;
                            oneqty = document.getElementById('qty').value;
                            if(onev && onetype && oneqty){
                                if (onetype=="30" && onev.length==3) {
                                    arr = Array.from(String(onev), num => Number(num))
                                    data=calculateAllCombinations(arr)
                                    data.map((i)=>{
                                        if(i.join("").length==onev.length){
                                            addlist(onetype,i.join(""),oneqty)
                                        }
                                    })
                                } else {
                                    alert("Token Number Must be 3 digit")
                                }
                            }else{
                                alert("Select Token Type , Token and Qty")
                            }
                        }
                    </script>
                </tbody>
            </table>
            <br>
            <div class="mb-4 text-end">
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