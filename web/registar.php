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
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/myStyle.css">
<script src="js/bootstrap.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<meta charset="utf-8">
<title>Registar</title>
</head>

<body>
<div class="container col-sm-4 col-sm-offset-4 form-margin-top-r ">
	<form action="newUser.php" method="post" name="form1" id="form1" class="form-b-box">
		<div class="form-group">
		  <label for="nome" class="sr-only">User:</label>
		  <input name="user" type="text" autofocus="autofocus" required="required" id="user" autocomplete="on" class="form-control text-center" placeholder="New user">
		</div>
		<div class="form-group">
		  <label for="pass" class="sr-only">Password:</label>
		  <input name="pass" type="password" required="required" id="pass" form="form1" autocomplete="on" class="form-control text-center" placeholder="New password">
		</div>	
		<div class="form-group">
		  <label for="pass2" class="sr-only">Repetir Password:</label>
		  <input name="pass2" type="password" required="required" id="pass2" class="form-control text-center" placeholder="Repeat password">
		</div>
		<div class="form-group">
			<label for="nome" class="sr-only">Nome:</label>
			<input name="nome" type="text" required="required" id="nome" autocomplete="on" class="form-control text-center" placeholder="Name">
		</div>
		<div class="form-group">
			  <label for="email" class="sr-only">Email:</label>
			  <input name="email" type="email" required="required" id="email" form="form1" autocomplete="on" class="form-control text-center" placeholder="Email">
		</div>
		<div class="form-group">
		  <label for="numero" class="sr-only">Número da Universidade*:</label>
		  <input name="numero" type="number" required="required" id="numero" form="form1" autocomplete="on" class="form-control text-center" placeholder="Number of university">
		</div>
		<div class="form-group">
		  <label for="tipo" class="sr-only">Tipo*:</label>
		  <select name="tipo" required="required" id="tipo" form="form1" class="form-control text-center" >
			<option>aluno</option>
			<option>professor</option>
		  </select>
		</div>
		<div class="row text-center">
	  		<input name="Registar" type="submit" id="Registar" form="form1" value="Registar" class="btn btn-primary botao-form">
		</div>
		<div class="row text-center">
	  		<a href="login.php"><input type="button" name="button" id="button" value="Login" class="btn btn-primary botao-form"></a>
		</div>
	</form>
</div>
</body>
</html>