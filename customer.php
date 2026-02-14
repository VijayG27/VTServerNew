<?php
	ob_start();
	session_start();
	require_once('inc/db.php');
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
    } 

//For Server
/*
$servername = "localhost";
$username = "vertilnn_vtuser";
$password = "12345";
$dbname = "vertilnn_customerinfovt";*/
//For Local
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customerinfovt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/
?> 


      <?php require_once('inc/header.php'); ?>
  <meta charset="UTF-8">
    <section id="tabmodule">
      <div class="container-fluid">        
        <?php
        //execute the SQL query and return records
        $sql = "SELECT * FROM customerinfo";
        $result = $conn->query($sql);
        ?>

<table class="table table-striped table-bordered table-responsive mydatatable1" style="width: 100%;">
		<thead>
			<tr>
				<th>Company Name1</th>
				<th>Serial No</th>
				<th>Account ID</th>
        <th>Prod Name</th>
        <th>Prod Type</th>
        <th>TSS</th>
        <th>Prod Info</th>
				<th>Mobile No</th>
				<th>Expiry Date</th>
				<th>trial period</th>
				<th>Counter</th>
				<th>Status</th>
				<th>Remark</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if ($result->num_rows > 0) {
				// output data of each row
				
				while($row = $result->fetch_assoc()) {
				    $cmpName = urlencode($row['CompanyName']);
					echo "
					</tr>
					
						<td>{$row['CompanyName']}</td>
						<td><a href='updateuserregister.php?editSN={$row['SerialNo']}&editcmp=$cmpName&editAccId={$row['AccountID']}&editProdName={$row['ProdName']}&editProdType={$row['ProdType']}&editTSS={$row['TSS']}&editProdInfo={$row['ProdInfo']}&editMobNo={$row['MobileNo']}&editExpDt={$row['ExpDt']}&editTrial={$row['trialperiod']}&editCounter={$row['Counter']}&editStatus={$row['Status']}&editRemark={$row['Remark']}'>{$row['SerialNo']}</a></td>
						<td>{$row['AccountID']}</td>
                        <td>{$row['ProdName']}</td>
                        <td>{$row['ProdType']}</td>
                        <td>{$row['TSS']}</td>
                        <td>{$row['ProdInfo']}</td>
						<td>{$row['MobileNo']}</td>
						<td>{$row['ExpDt']}</td>
						<td>{$row['trialperiod']}</td>
						<td>{$row['Counter']}</td>
						<td>{$row['Status']}</td>
						<td>{$row['Remark']}</td>
						</tr>
					";
				}
			} else {
				echo "0 results";
			}
			$conn->close();
			
		?>
		</tbody>
  </table>
  
      </div>
    </section>
  </nav>
    </div>
    <!-- /#page-content-wrapper -->

  </div>

<!-- pop up code end -->


  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

  </script>
    <script>
    $('.mydatatable1').DataTable();
  </script>