<?php
session_start();

$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}

if($_SESSION["utilizador"]==null or $_SESSION["password"]==null){
		pg_close($conn);
		header("location: login.php");
		exit;
	}

$user = $_SESSION["utilizador"];
$pass = $_SESSION["password"];

$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: login.php");
	exit;
}

if($_POST["nome"] == null){
	pg_close($conn);
	header("location: associar.php?msn=erro");
	exit;
}
$nome = $_POST["nome"];
$sql = "SELECT count(*) FROM \"projeto\" where \"nome\" = '$nome'";

if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: associar.php?msn=erro");
	exit;
}

$sql = "INSERT INTO \"uestap\" VALUES ('$user','$nome' , null, '$user', '$user', CURRENT_TIMESTAMP);";
if(pg_query($conn,$sql)){
	pg_close($conn);
	header("location: index.php?msn=associado");
	exit;
}
pg_close($conn);
header("location: associar.php?msn=erro");
exit;

?>