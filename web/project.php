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

$sql = "select count(*) from \"projeto\" where \"nome\" = '$nome' and \"admin\" = '$user'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="1"){
	$administrador = true;
}else{
	$administrador = false;
	$sql = "select count(*) from \"grupo\",\"uestap\" where \"grupoid\" = \"id\" and \"utilizadoruser\" = '$user'";
	if(pg_fetch_row(pg_query($conn,$sql))[0]=="1"){
		$grupo = true;
	}else{
		$grupo = false;
	}
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Projeto</title>
</head>

<body>
<?php if($grupo){echo("Com grupo");}else{echo("Sem grupo");} ?>
<?php if($administrador){echo("Administrador");}else{echo("Não administrador");}?>
<a href="conta.php"><?php echo($user); ?></a>
<a href="index.php">Voltar</a>
<a href="logout.php">Sair</a>
</body>
</html>