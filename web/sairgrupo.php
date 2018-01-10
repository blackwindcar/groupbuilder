<!doctype html>
<?php
// Start the session
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
		
	}
$user = $_SESSION["utilizador"];
$pass = $_SESSION["password"];
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: login.php");
	exit;
}

if($_GET["nome"]==null){
	pg_close($conn);
	header("location: index.php");
	exit;
}
$nome = $_GET["nome"];

$sql = "select count(*) from grupo,uestap where grupoid = id and grupo.projetoadmin = '$user' and grupo.projetonome = '$nome'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	$sql = "UPDATE uestap SET grupoid = null WHERE utilizadoruser = '$user' AND projetonome = '$nome'";
	pg_query($conn,$sql);
	pg_close($conn);
	header("location: project.php?nome=$nome");
	exit;
}else{
	$sql = "select id from grupo,uestap where grupoid = id and grupo.projetoadmin = '$user' and grupo.projetonome = '$nome'";
	$ngrupo = pg_fetch_row(pg_query($conn,$sql))[0];

	$sql = "UPDATE UEstaP SET Grupoid = null WHERE grupoid ='$ngrupo' AND Projetonome = '$nome';
DELETE FROM Grupo WHERE id = '$ngrupo'";
	pg_query($conn,$sql);
	pg_close($conn);
	header("location: project.php?nome=$nome");
	exit;	
}
?>