<?php
// Start the session
session_start();

$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
if( $_POST["user"]==null or $_POST["pass"] == null or $_POST["nome"] == null or $_POST["email"] == null or $_POST["numero"] == null){
	pg_close($conn);
	header("location: registar.php?msn=Informacoes+invalidas");
}
$user = $_POST["user"];
$pass = $_POST["pass"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$numero = $_POST["numero"];
$tipo = $_POST["tipo"];
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="1"){
	pg_close($conn);
	header('Location: registar.php?msn=Utilizador+ja+existe');
}

$sql = "INSERT INTO \"utilizador\"(\"user\", \"pass\", \"email\", \"nome\", \"nUniversidade\", \"tipo\") VALUES ('$user', '$pass', '$email', '$nome','$numero', '$tipo')";
echo($sql);
pg_query($conn,$sql);
pg_close($conn);
$_SESSION["utilizador"] = $user;
$_SESSION["password"] = $pass;
/*
header('Location: index.php');
*/
?>