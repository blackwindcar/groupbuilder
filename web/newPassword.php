<!doctype html>
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}

if($_SESSION["utilizador"]==null or $_SESSION["password"]==null){
		pg_close($conn);
		//header("location: login.php");
		
	}
echo("secao: ".($_SESSION["utilizador"]==null or $_SESSION["password"]==null));

$user = $_SESSION["utilizador"];
$pass = $_SESSION["password"];
echo("</br>user: $user</br>pass: $pass");
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	//header("location: login.php");
}
echo("</br>login: ".pg_fetch_row(pg_query($conn,$sql))[0]);

if($_POST["pass"] == null or $_POST["npass"] == null or $_POST["npass2"] == null){
	//header("location: conta.php?pass=erro");
}
$oldPass = $_POST["pass"];
$newPass = $_POST["npass"];
if(strcasecmp($pass,$oldPass)!=0){
	pg_close($conn);
	//header("location: conta.php?pass=passDiferente");
}
echo("</br>antiga: ".strcasecmp($pass,$oldPass));
if(strcasecmp($newPass,$oldPass)==0){
	pg_close($conn);
	//header("location: conta.php?pass=passOldigual");
}
echo("</br>nova  e velha: ".strcasecmp($newPass,$oldPass));
if(strcasecmp($newPass,$_POST["npass2"])!=0){
	pg_close($conn);
	//header("location: conta.php?pass=passdiferente");
}
echo("</br>novas iguais: ".strcasecmp($newPass,$_POST["npass2"]));
$sql = "UPDATE \"utilizador\" SET \"pass\" = '$newPass' WHERE \"user\" = '$user'";
echo("</br>".$sql);
if(pg_query($conn,$sql)){
	pg_close($conn);
	//header("location: conta.php?pass=success");
}else{
	pg_close($conn);
	//header("location: conta.php?pass=falhou");
}
?>