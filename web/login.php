<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
	pg_close($conn);
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/myStyle.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container"></div>
<div class="container"></div>
<div class="container col-sm-6 col-sm-offset-3 text-center bg-form-base">
	<form action="login_authentication.php" method="post">
		<div class="form-group"></div>
		<div class="form-group">
			<label for="email">User:</label>
    		<input type="user" class="form-control" id="user">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd">
		  </div>
		<div class="form-group">
		  <div class="container col-sm-6 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">Login</button>
			  <a href="registar.php">
				<button type="button" class="btn btn-primary">Registar</button>
			</a>
			  
			</div>
		</div>
	</form>
	</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
