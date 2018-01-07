<!doctype html>
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

if($_POST["pass"] == null or $_POST["npass"] == null or $_POST["npass2"] == null){
	header("location: conta.php?pass=erro");
	exit;
}
$oldPass = $_POST["pass"];
$newPass = $_POST["npass"];

if(strcasecmp($pass,$oldPass)!=0){
	pg_close($conn);
	header("location: conta.php?pass=passDiferente&$pass=$oldPass");
	exit;
}

if(strcasecmp($newPass,$oldPass)==0){
	pg_close($conn);
	header("location: conta.php?pass=passOldigual");
	exit;
}

if(strcasecmp($newPass,$_POST["npass2"])!=0){
	pg_close($conn);
	header("location: conta.php?pass=passdiferente");
	exit;
}

$sql = "UPDATE \"utilizador\" SET \"pass\" = '$newPass' WHERE \"user\" = '$user'";

if(pg_query($conn,$sql)){
	pg_close($conn);
	header("location: conta.php?pass=success");
	exit;
}else{
	pg_close($conn);
	header("location: conta.php?pass=falhou");
	exit;
}
?>