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
if($_GET["nome"]==null or $_GET["convida"]==null){
	pg_close($conn);
	header("location: index.php");
	exit;
}
$nome = $_GET["nome"];
$convida = $_GET["convida"];

$sql = "select grupo.\"id\" from \"grupo\",\"uestap\" where \"grupoid\" = \"id\" and \"utilizadoruser\" = '$convida' and grupo.projetonome = '$nome'";
$idgrupo = pg_fetch_row(pg_query($conn,$sql))[0];

$sql = "select (nmaxmembros<membros.numero) as cheio from grupo,projeto,(select count(*)+1 as numero from grupo,uestap where \"id\"=grupoid and \"id\"= $idgrupo and grupo.projetonome='$nome') as membros where grupo.projetonome = projeto.nome and projeto.nome='$nome'";
if(pg_fetch_row(pg_query($conn,$sql))[0]){
	$sql = "update convite set valido = 'invalido' where convidado = '$user' and projetonome = '$nome'";
	pg_query($conn,$sql);
	header("location: project.php?nome=$nome&msn=grupocheio");
	exit;
}
	
$sql = "update convite set valido = 'invalido' where convidado = '$user' and projetonome = '$nome';UPDATE UEstaP SET Grupoid = '$idgrupo', GrupoProjetoAdmin = '$convida', dataEntradaGrupo = current_timestamp WHERE Utilizadoruser = '$user' AND Projetonome = '$nome'";
pg_query($conn,$sql);
header("location: project.php?nome=$nome");
exit;

?>