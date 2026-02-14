<?php
	ob_start();
	session_start();
	require_once('inc/db.php');
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
    } 

if(isset($_GET['editSN'])){
	$CmpName = $_GET['editcmp'];
	$CmpSN = $_GET['editSN'];
	$cmpAccId = $_GET['editAccId'];
  $cmpProdName = $_GET['editProdName'];
  $cmpProdType = $_GET['editProdType'];
  $cmpTSS = $_GET['editTSS'];
  $cmpProdInfo = $_GET['editProdInfo'];
	$cmpMobNo = $_GET['editMobNo'];
	$cmpExpDt = $_GET['editExpDt'];
	$cmpTrial = $_GET['editTrial'];
	$cmpCounter = $_GET['editCounter'];
	$cmpStatus = $_GET['editStatus'];
	$cmpRemark = $_GET['editRemark'];
}
require_once('inc/header.php');
?>

      <section id="dashboard">
      <div class="container-fluid">

		<form action="" method="post">
		<div class="panel" >
			<div class="panel panel-body" style="background:#F5F5F5; color: black">
			<div class="row"> 
			<div class="col-md-7"><h3>Customer Information Update User Details SerialNo : <?php echo $CmpSN; ?></h3></div></br>

		</div>
		<div class="panel panel-body" style="background:#F5F5F5; color: black">
	
		<table>
		
			<tr><td width="45%">Company Name : </td><td><input type="text" class="form-control" name="ucmpname" value='<?php echo $CmpName ?>'></input></td></tr>
			<tr><td width="45%">Serial No : </td><td><input type="text" class="form-control" name="ucmpsn" value='<?php echo $CmpSN ?>'></input></td></tr>
			<tr><td width="45%">Account ID : </td><td><input type="text" class="form-control" name="ucmpaccId" value='<?php echo $cmpAccId ?>'></input></td></tr>
			<tr><td width="45%">Prod Name : </td><td><input type="text" class="form-control" name="ucmpprodname" value='<?php echo $cmpProdName ?>'></input></td></tr>
			<tr><td width="45%">Prod Type : </td><td><input type="text" class="form-control" name="ucmpprodtype" value='<?php echo $cmpProdType ?>'></input></td></tr>
			<tr><td width="45%">TSS : </td><td><input type="text" class="form-control" name="ucmpTss" value='<?php echo $cmpTSS ?>'></input></td></tr>
      		<tr><td width="45%">Prod Info : </td><td><input type="text" class="form-control" name="ucmpprodInfo" value='<?php echo $cmpProdInfo ?>'></input></td></tr>
			<tr><td width="45%">Mobile No : </td><td><input type="text" class="form-control" name="ucmpmobNo" value='<?php echo $cmpMobNo ?>'></input></td></tr>
			<tr><td width="45%">Expiry Date : </td><td><input type="Date" class="form-control" name="ucmpexpDt" value='<?php echo $cmpExpDt ?>'></input></td></tr>
			<tr><td width="45%">Trial No : </td><td><input type="text" class="form-control" name="ucmTrial" value='<?php echo $cmpTrial ?>'></input></td></tr>
			<tr><td width="45%">Counter : </td><td><input type="text" class="form-control" name="ucmpCount" value='<?php echo $cmpCounter ?>'></input></td></tr>
			<tr><td width="45%">Status : </td><td><input type="text" class="form-control" name="ucmpStatus" value='<?php echo $cmpStatus ?>'></input></td></tr>
			<tr><td width="45%">Remark : </td><td><input type="text" class="form-control" name="ucmpRemark" value='<?php echo $cmpRemark ?>'></input></td></tr>
		<table>
		</div>
		</div>
		</form>
      </div>
	  <input type="submit" value="Update Customer(alt+c)" name="submit" class="btn btn-success" accesskey="c">
    </section>
    <?php 
					if(isset($_POST['submit'])){
						$updateCmp = mysqli_real_escape_string($conn,$_POST['ucmpname']);
						$serial_no = mysqli_real_escape_string($conn,$_POST['ucmpsn']);
						$updateAccId = mysqli_real_escape_string($conn,$_POST['ucmpaccId']);
						$updateProdName = mysqli_real_escape_string($conn,$_POST['ucmpprodname']);
						$updateProdType = mysqli_real_escape_string($conn,$_POST['ucmpprodtype']);
						$updateTss = mysqli_real_escape_string($conn,$_POST['ucmpTss']);
						$updateProdInfo = mysqli_real_escape_string($conn,$_POST['ucmpprodInfo']);
						$updateMobNo = mysqli_real_escape_string($conn,$_POST['ucmpmobNo']);
						$updateExpDt = mysqli_real_escape_string($conn,$_POST['ucmpexpDt']);
						$updateTrail = mysqli_real_escape_string($conn,$_POST['ucmTrial']);
						$updateCount = mysqli_real_escape_string($conn,$_POST['ucmpCount']);
						$updateStatus = mysqli_real_escape_string($conn,$_POST['ucmpStatus']);
						$updateRemark = mysqli_real_escape_string($conn,$_POST['ucmpRemark']);
						
			            $update_query = "Update VtAddOns SET ExpDt = '".$updateExpDt."', trialperiod = '".$updateTrail."', Status = '".$updateStatus."', Remark = '".$updateRemark."' Where SerialNo='".$serial_no."' AND CompanyName = '".$updateCmp."'";
						if ($conn->query($update_query) === TRUE) {
							echo "Update record created successfully";
              				header('location: CustomorView.php?editSN='.$serial_no.'&editcmp='.urlencode($updateCmp).'&editAccId='.$updateAccId.'&editProdName='.$updateProdName.'&editProdType='.$updateProdType.'&editTSS='.$updateTss.'&editProdInfo='.$updateProdInfo.'&editMobNo='.$updateMobNo.'&editExpDt='.$updateExpDt.'&editTrial='.$updateTrail.'&editCounter='.$updateCount.'&editStatus='.$updateStatus.'&editRemark='.$updateRemark);

						}else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							 }
							 
						}
	?>