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

if($_POST["nome"] == null or $_POST["datetime"] == null or $_POST["numMin"] == null or $_POST["numMax"] == null  ){
	pg_close($conn);
	header("location: newProject.php?msn=erro");
	exit;
}

$nome = $_POST["nome"];
$dateTime = $_POST["datetime"];
$numMin = $_POST["numMin"];
$numMax = $_POST["numMax"];

$sql = "SELECT count(*) FROM Projeto where \"nome\" = '$nome'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="1"){
	pg_close($conn);
	header('Location: newProject.php?msn=existe');
	exit;
}

if($numMin > $numMax or $numMin <1 or $numMax < 1 ){
	pg_close($conn);
	header('Location: newProject.php?msn=numero');
	exit;
}

$sql = "INSERT INTO Projeto VALUES ('$nome', '$user', '$nome', TO_TIMESTAMP('$dateTime','yyyy-mm-dd'), $numMin, $numMax)";
if(pg_query($conn,$sql)){
	pg_close($conn);
	header('Location: index.php?msn=projetocriado');
	exit;
}
pg_close($conn);
header("location: newProject.php?msn=erro");
exit;
?>