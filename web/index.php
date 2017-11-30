<!DOCTYPE html>
<html>
<title>Teste php</title>
<head></head>
<body>
ola
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}else{
	echo "ligacao aceite";
}?>

</body>
</html>