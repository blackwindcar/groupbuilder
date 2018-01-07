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
?>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<form action="autenticar.php" method="post" name="form1" id="form1" autocomplete="on">
  <label for="user">user:</label>
  <input name="user" type="text" autofocus="autofocus" required="required" id="user" autocomplete="on">
  <label for="pass">password:</label>
  <input name="pass" type="password" required="required" id="pass" autocomplete="on">
  <input name="submit" type="submit" id="submit" form="form1" value="Login">
	<a href="registar.php"><input type="button" name="button" id="button" value="Registar"></a>
</form>
</body>
</html>