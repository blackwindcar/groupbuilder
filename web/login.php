<?php
// Start the session
session_start();

$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <label for="textfield">Text Field:</label>
  <input type="text" name="textfield" id="textfield">
  <label for="textfield2">Text Field:</label>
  <input type="text" name="textfield2" id="textfield2">
  <input type="submit" name="submit" id="submit" value="Enviar">
  <input type="button" name="button" id="button" value="Enviar">
</form>
</body>
</html>