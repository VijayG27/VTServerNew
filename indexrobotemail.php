<?php

function IsUTF16Request ()
{
	if (isset ($headers["HTTP_ACCEPT_CHARSET"]))
		$encoding = strtoupper ($headers["HTTP_ACCEPT_CHARSET"]);
	else
		$encoding = "";
	
	if (strpos ($encoding, "UTF-16") !== FALSE)
		return TRUE;
	
	return FALSE;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if ( !isset( $HTTP_RAW_POST_DATA ) ) {
		$HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
		}
}
//For Server

$servername = "localhost";
$username = "vertic14_customers";
$password = "12345";
$dbname = "vertic14_customers";


/*
//For Local
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customerinfovt";
*/


$array = json_decode($HTTP_RAW_POST_DATA, true);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "<br>";
foreach($array as $row)
{
$query = "SELECT * FROM robotemaildb WHERE SerialNo = '".$row["TallySerialNo"]."' AND CompanyName = '".$row["Company Name"]."'";
$result = mysqli_query($conn, $query);
}
$ExpDate=Date('y:m:d', strtotime('+7 days'));

if ($result) {
  if (mysqli_num_rows($result) > 0) {
    //echo 'Alreay Register1 !'. $row['TallyProdTSS'];
	$dt = date('Y-m-d',strtotime($row['TallyProdTSS']));
	$traiDays = ($row['TrailDays']);
	$ExpDtUpdate =Date('y:m:d', strtotime('+3 days'));
	/*print "***";
	print $traiDays;
	print "***";*/
	$sql = "Update robotemaildb SET AccountID = '".$row["Acc ID"]."', ProdName = '".$row["TallyProdInfo"]."', ProdType = '".$row["TallyProd"]."', TSS = '".$dt."' , ProdInfo = '".$row["VTProdInfo"]."' , MobileNo = '".$row["MobileNo"]."', Counter = '".$row["Counts"]."' Where SerialNo = '".$row["TallySerialNo"]."' AND CompanyName ='".$row["Company Name"]."'";
	
	if ($conn->query($sql) === TRUE) {
				//echo "Update record created successfully";
				$query = "SELECT * FROM robotemaildb WHERE SerialNo = '".$row["TallySerialNo"]."' AND CompanyName = '".$row["Company Name"]."'";
				$result = mysqli_query($conn, $query);
				$count = mysqli_num_rows($result);
				if($count>0){
					while($row = mysqli_fetch_assoc($result)){
						$arr[] = $row;
					}
					$respcont = json_encode(['CompanyInfo'=>$arr]);
				}
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
  } else {
		//echo 'not found';
		$dt = date('Y-m-d',strtotime($row['TallyProdTSS']));
		
		$sql = "INSERT INTO robotemaildb (`CompanyName`, `SerialNo`, `AccountID`, `ProdName`, `ProdType`, `TSS`, `ProdInfo`, `MobileNo`, `ExpDt`) VALUES ('".$row["Company Name"]."', '".$row["TallySerialNo"]."', '".$row["Acc ID"]."', '".$row["TallyProdInfo"]."', '".$row["TallyProd"]."', '".$dt."','".$row["VTProdInfo"]."', '".$row["MobileNo"]."', '".$ExpDate."')";
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		echo 'Register Successfully !';
  }
}else {
  echo 'Error: '.mysql_error();
}

if (IsUTF16Request ())
	$respcont = iconv("UTF-8", "UCS-2LE", $respcont);
	
$len = strlen( $respcont );

if (IsUTF16Request ())
	$len = $len * 2;

header ("CONTENT-LENGTH:".$len);
print $respcont;

?>