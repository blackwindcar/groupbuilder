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

pg_close($conn);
?>
<html>
<head>
	
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/myStyle.css">
<script src="js/bootstrap.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<div class="container col-sm-4 col-sm-offset-4 form-margin-top ">
	<form action="autenticar.php" method="post" name="form1" id="form1" autocomplete="on" class="form-backgroud-box">
		<div class="form-group">
		  <label for="user" class="sr-only">user:</label>
		  <input name="user" type="text" autofocus="autofocus" required="required" class="form-control text-center" id="user" placeholder="Enter user" autocomplete="on">
		</div>
		<div class="form-group">
		  <label for="pass" class="sr-only">password:</label>
		  <input name="pass" type="password" required="required" id="pass" autocomplete="on" placeholder="Enter password" class="form-control text-center">
		</div>
		<div class="row text-center">
			<input name="submit" type="submit" id="submit" form="form1" value="Login" class="btn botao-form btn-primary" >
		</div>
		<div class="row text-center">
			<a href="registar.php"><input type="button" name="button" id="button" value="Registar"class="btn btn-primary botao-form" ></a>
		</div>
	</form>
</div>
</body>
</html>