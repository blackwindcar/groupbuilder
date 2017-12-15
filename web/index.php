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
if($_SESSION["utilizador"]==null or $_SESSION["password"]==null){
		header("location: login.php");
	}
$sql = "select count(*) from \"utilizador\" where \"user\" = 'admin' and \"$_SESSION["utilizador"]\" = '$_SESSION["password"]'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: registar.php");
}
pg_close($conn);
?>
<title>Home</title>
<head></head>
<body>

</body>
</html>