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
		
	}
$user = $_SESSION["utilizador"];
$pass = $_SESSION["password"];
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: login.php");
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Projecto</title>
</head>

<body>
<form action="projectCreate.php" method="post" name="form1" id="form1">
  <label for="nome">Nome: </label>
  <input name="nome" type="text" autofocus="autofocus" required="required" id="nome" autocomplete="off">
  <label for="datetime">Data Limite: </label>
  <input name="datetime" type="date" required="required" id="datetime">
  <label for="numMin">Numero mínimo de membros: </label>
  <input name="numMin" type="number" required="required" id="numMin">
  <label for="numMax">Numero maximo de membros: </label>
  <input type="number" name="numMax" id="numMax">
  <input type="submit" name="Criar" id="Criar" value="Criar">
	<a><?php 
		if($_GET["msn"]!=null){
			if($_GET["msn"]==="nome"){echo("Dados incorrectos");}
			if($_GET["msn"]==="existe"){echo("O mome do projecto já existe.");}
			if($_GET["msn"]==="numero"){echo("O numero de grupos é inválido");}
			
		}
		else{
			echo("");
		}
		
		?></a>
</form>
<a href="index.php">voltar</a>
</body>
</html>