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
}

$sql = "select \"email\" from \"utilizador\" where \"user\" = 'admin'";
$email = pg_fetch_row(pg_query($conn,$sql))[0];

$sql = "select \"nome\" from \"utilizador\" where \"user\" = 'admin'";
$nome = pg_fetch_row(pg_query($conn,$sql))[0];

$sql = "select \"nuniversidade\" from \"utilizador\" where \"user\" = 'admin'";
$numero = pg_fetch_row(pg_query($conn,$sql))[0];
?>
<html>
<head>
<meta charset="utf-8">
<title>Conta</title>
</head>

<body>
<h1><?php echo($_SESSION["utilizador"]); ?></h1>
<form action="newPassword.php" method="post" name="form1" id="form1">
	<h3>Nova password:</h3>
	  <label for="pass">Password antiga:</label>
      <input type="password" name="pass" id="pass">
      <label for="npass">Nova password:</label>
      <input type="text" name="npass" id="npass">
      <label for="npass2">Repetir password:</label>
      <input type="text" name="npass2" id="npass2">
      <input type="submit" name="submit" id="submit" value="Enviar">
</form>
<form action="newEmail.php" method="post" name="form2" id="form2">
  <h3>Mudar email:</h3>
	<a>Email actual: <?php echo($email); ?></a></br>
  <label for="email">Novo email:</label>
    <input type="email" name="email" id="email">
  <input type="submit" name="submit2" id="submit2" value="Enviar">
</form>
<form action="newNome.php" method="post" name="form2" id="form2">
  <h3>Mudar nome:</h3>
	<a>Nome actual: <?php echo($nome); ?></a></br>
  <label for="email">Novo nome:</label>
    <input type="email" name="email" id="email">
  <input type="submit" name="submit2" id="submit2" value="Enviar">
</form>
<form action="newNumero.php" method="post" name="form2" id="form2">
  <h3>Mudar numero:</h3>
	<a>Numero actual: <?php echo($numero); ?></a></br>
  <label for="email">Novo numero:</label>
    <input type="email" name="email" id="email">
  <input type="submit" name="submit2" id="submit2" value="Enviar">
</form>
<a href="index.php">voltar</a>
</body>
</html>