<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
?>
<title>Home</title>
<head></head>
<body>
<?php
	try{
		echo("<a>$_SESSION["utilizador"]</a>");
		echo("<a>$_SESSION["password"]</a>");
	}
	catch(Exception $e){
		pg_close($conn);
		header("location: login.php");
	}
	print_r($_SESSION);
	pg_close($conn);
	?>

</body>
</html>