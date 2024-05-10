<?php
if(session_id() == ''){
session_start();
}
if(isset($_SESSION['is_admin_login'])){
    $aEmail = $_SESSION['aEmail'];
}
else{
    echo "<script>location.href='admin_login.php'</script>";
}

if(isset($_REQUEST['view'])){
$sql ="SELECT * FROM submitrequest WHERE request_id ={$_REQUEST['id']}";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
}
if(isset($_REQUEST['close'])){
    $sql ="DELETE FROM submitrequest WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql)==TRUE)
    {
        echo '<meta http-equiv="refresh" content ="0;URL=?closed"/>';
    }
    else{
        echo "Unable to Delete";
    }
}
if(isset($_REQUEST['assign'])){
    if(($_REQUEST['request_id']=="") || $_REQUEST['request_info']=="" || $_REQUEST['requestdesc']=="" || $_REQUEST['requestname']=="" || 
    $_REQUEST['requestadd1']=="" || $_REQUEST['requestadd2']=="" || $_REQUEST['requestcity']=="" || $_REQUEST['requeststate']=="" ||
    $_REQUEST['requestzip']=="" || $_REQUEST['requestemail']=="" || $_REQUEST['requestmobile']=="" || $_REQUEST['assigntech']=="" ||
    $_REQUEST['inputdate']=="") {
        $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
    else{
        $rid = $_REQUEST['request_id'];
        $rinfo =$_REQUEST['request_info'];
        $rdesc =$_REQUEST['requestdesc'];
        $rname =$_REQUEST['requestname'];
        $radd1 =$_REQUEST['requestadd1'];
        $radd2 =$_REQUEST['requestadd2'];
        $rcity =$_REQUEST['requestcity'];
        $rstate =$_REQUEST['requeststate'];
        $rzip =$_REQUEST['requestzip'];
        $remail =$_REQUEST['requestemail'];
        $rmobile =$_REQUEST['requestmobile'];
        $rassigntech =$_REQUEST['assigntech'];
        $rdate =$_REQUEST['inputdate'];
        $sql ="INSERT INTO assignwork(request_id,request_info,request_desc,request_name,request_add1,
        request_add2,request_city,request_state,request_zip,request_email,request_mobile,assign_tech,assign_date) VALUES(
            '$rid','$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rassigntech',
            '$rdate')";
            if($conn->query($sql) == TRUE){
              $msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Assign Successfully</div>';
            }
            else{
              $msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable Assign Value</div>';

            }
    }
}
?>


<div class="col-sm-5 mt-5 jumbotron">
        
        <form action="" method="POST">
         <h5 class="text-center pb-2">Assign Work Order Request</h5>
         <div class="form-group">
             <label for="request_id">Request Id</label>
             <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id']))echo $row['request_id']; ?>" readonly>
         </div>
         <div class="form-group">
             <label for="inputRequest">Request Info</label>
             <input type="text" class="form-control" id="request_info" placeholder="Request info" name="request_info" required
             value="<?php if(isset($row['request_info']))echo $row['request_info']; ?>">
         </div>
         <div class="form-group">
             <label for="inputRequestDescription">Description</label>
             <input type="text" class="form-control" id="requestdesc" placeholder="Write Description" name="requestdesc" required
             value="<?php if(isset($row['request_desc']))echo $row['request_desc']; ?>">
         </div>
         <div class="form-group">
             <label for="inputName">Name</label>
             <input type="text" class="form-control" id="requestname" placeholder="Name" name="requestname" required
             value="<?php if(isset($row['request_name']))echo $row['request_name']; ?>">
         </div>
         <div class="form-row">
             <div class="form-group col-md-6">
             <label for="inputAddress">Address Line 1</label>
             <input type="text" class="form-control" id="requestadd1" placeholder="House No.123" name="requestadd1" required
             value="<?php if(isset($row['request_add1']))echo $row['request_add1']; ?>">
             </div>

             <div class="form-group col-md-6">
             <label for="inputAddress2">Address Line 2</label>
             <input type="text" class="form-control" id="requestadd2" placeholder="ABC Colony" name="requestadd2" required
             value="<?php if(isset($row['request_add2']))echo $row['request_add2']; ?>">
             </div>

         </div>
         <div class="form-row">
             <div class="form-group col-md-4">
             <label for="inputcity">City</label>
             <input type="text" class="form-control" id="requestcity" name="requestcity" required
             value="<?php if(isset($row['request_city']))echo $row['request_city']; ?>">
             </div>

             <div class="form-group col-md-4">
             <label for="inputState">State</label>
             <input type="text" class="form-control" id="requeststate" name="requeststate" required
             value="<?php if(isset($row['request_state']))echo $row['request_state']; ?>">
             </div>

             <div class="form-group col-md-4">
             <label for="inputZip">Zip</label>
             <input type="number" class="form-control" id="requestzip" name="requestzip" onkeypress="isInputNumber(event)" required
             value="<?php if(isset($row['request_zip']))echo $row['request_zip']; ?>">
             </div>
         </div>

         <div class="form-row">
             <div class="form-group col-md-8">
             <label for="inputEmail">Email</label>
             <input type="email" class="form-control" id="requestemail" name="requestemail" required
             value="<?php if(isset($row['request_email']))echo $row['request_email']; ?>">
             </div>

             <div class="form-group col-md-4">
             <label for="inputMobile">Mobile</label>
             <input type="number" class="form-control" id="requestmobile" name="requestmobile" onkeypress="isInputNumber(event)" required
             value="<?php if(isset($row['request_mobile']))echo $row['request_mobile']; ?>">
             </div>

             <div class="form-group col-md-6">
             <label for="assigntech">Assign to Technician</label>
             <input type="text" class="form-control" id="assigntech" name="assigntech" required>
             </div>

             <div class="form-group col-md-6">
             <label for="inputDate">Date</label>
             <input type="date" class="form-control" id="inputDate" name="inputdate" required>
             </div>
         </div>
         <div class="float-right">
             <button type="submit" class="btn btn-success" name="assign">Assign</button>
             <button type="reset" class="btn btn-secondary">Reset</button>
         </div>
        </form>
             <?php if(isset($msg)) {echo $msg;}?>

                <script>
                 function isInputNumber(evt){
                     var ch= String.fromCharCode(evt.which);
                     if(!(/[0-9]/.test(ch))){
                         evt.preventDefault();
                     }
                 }
                </script>

