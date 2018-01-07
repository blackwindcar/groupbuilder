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
<title>Registar</title>
</head>

<body>
<form action="newUser.php" method="post" name="form1" id="form1">
  <label for="nome">User:</label>
  <input name="user" type="text" autofocus="autofocus" required="required" id="user" autocomplete="on">
  <label for="pass">Password:</label>
  <input name="pass" type="password" required="required" id="pass" form="form1" autocomplete="on">
  <label for="pass2">Repetir Password:</label>
  <input name="pass2" type="password" required="required" id="pass2">
	<label for="nome">Nome:</label>
  <input name="nome" type="text" autofocus="autofocus" required="required" id="nome" autocomplete="on">
  <label for="email">Email:</label>
  <input name="email" type="email" required="required" id="email" form="form1" autocomplete="on">
  <label for="numero">Número da Universidade*:</label>
  <input name="numero" type="number" required="required" id="numero" form="form1">
  <label for="tipo">Tipo*:</label>
  <select name="tipo" required="required" id="tipo" form="form1">
    <option>aluno</option>
    <option>professor</option>
  </select>
  <input name="Registar" type="submit" id="Registar" form="form1" value="Registar">
  <a href="login.php"><input type="button" name="button" id="button" value="Login"></a>
</form>
</body>
</html>