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
?>

      <?php require_once('inc/header.php'); ?>
      <section id="dashboard">
      <div class="container-fluid">

		<form action="" method="post">
		<div class="panel" >

		<div class="container">	
		<table>

			<tr><td width="45%"><label>Company Name : </label></td><td><input type="text" id="cname" class="form-control" name="ucmpname" value='<?php echo $CmpName ?>'></input></td></tr>
			<tr><td width="45%">Serial No : </td><td><input type="text" class="form-control" name="ucmpsn" value='<?php echo $CmpSN ?>'></input></td></tr>
			<tr><td width="45%">Account ID : </td><td><input type="text" class="form-control" name="ucmpaccId" value='<?php echo $cmpAccId ?>'></input></td></tr>
			<tr><td width="45%">Prod Name : </td><td><input type="text" class="form-control" name="ucmpprodname" value='<?php echo $cmpProdName ?>'></input></td></tr>
			<tr><td width="45%">Prod Type : </td><td><input type="text" class="form-control" name="ucmpprodtype" value='<?php echo $cmpProdType ?>'></input></td></tr>
			<tr><td width="45%">TSS : </td><td><input type="text" class="form-control" name="ucmptss" value='<?php echo $cmpTSS ?>'></input></td></tr>
      <tr><td width="45%">Prod Info : </td><td><input type="text" class="form-control" name="ucmpprodInfo" value='<?php echo $cmpProdInfo ?>'></input></td></tr>
			<tr><td width="45%">Mobile No : </td><td><input type="text" class="form-control" name="ucmpmobNo" value='<?php echo $cmpMobNo ?>'></input></td></tr>
			<tr><td width="45%">Expiry Date : </td><td><input type="text" class="form-control" name="ucmpexpDt" value='<?php echo $cmpExpDt ?>'></input></td></tr>
			<tr><td width="45%">Trial No : </td><td><input type="text" class="form-control" name="ucmTrial" value='<?php echo $cmpTrial ?>'></input></td></tr>
			<tr><td width="45%">Counter : </td><td><input type="text" class="form-control" name="ucmpCount" value='<?php echo $cmpCounter ?>'></input></td></tr>
			<tr><td width="45%">Status : </td><td><input type="text" class="form-control" name="ucmpStatus" value='<?php echo $cmpStatus ?>'></input></td></tr>
			<tr><td width="45%">Remark : </td><td><input type="text" class="form-control" name="ucmpRemark" value='<?php echo $cmpRemark ?>'></input></td></tr>

		<table>
		</div>
		</div>
		</div>
		</form>
      </div>
    </section>