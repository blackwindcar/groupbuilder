<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
?>
<title>Home</title>
<head></head>
<body>
<?php
	if($_SESSION["utilizador"]==null){
		echo("sem user <br>");
	}
		echo $_SESSION["utilizador"]."<br>";
		echo $_SESSION["password"]."<br>";
	pg_close($conn);
	?>

</body>
</html>