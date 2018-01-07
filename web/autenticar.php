<?php
// Start the session
session_start();

$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
f($_POST["user"] == null or $pass = $_POST["pass"] == null){
	header("location: login.php");
}
$user = $_POST["user"];
$pass = $_POST["pass"];
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: login.php?msn=Credenciais+erradas");
}
$_SESSION["utilizador"]= $user;
$_SESSION["password"] = $pass;
pg_close($conn);
header("location: index.php");

?>