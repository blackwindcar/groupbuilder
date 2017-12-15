<!DOCTYPE html>
<html>
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}

session_start();
if($SESSION["utilizador"] != "admin" or $SESSION["password"] != "admin"){
	header('Location: login.php');
}

?>
<title>Home</title>
<head></head>
<body>
<?php
	/*$sql = "CREATE TABLE "user" ("user" varchar(255), password varchar(255));"
	if(pg_query($conn, $sql)){
		echo("tabela criada");
	}*/
	pg_close($conn);
	?>

</body>
</html>