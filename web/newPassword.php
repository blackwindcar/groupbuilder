<?php
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

if($_POST["pass"] == null or $_POST["npass"] == null or $_POST["npass2"] == null){
	header("location: conta.php?pass=erro");
}
if($_POST["pass"]!=$pass){
	header("location: conta.php?pass=badpass");
}
if($_POST["npass"]!=$_POST["npass2"]){
	header("location: conta.php?pass=passdiferente");
}
$old_pass = $_POST["pass"];
$new_pass = $_POST["npass"]
echo("$old_pass</br>$new_pass");
?>