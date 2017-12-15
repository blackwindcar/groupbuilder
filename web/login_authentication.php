<?php
// Start the session
session_start();
?>
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  header('Location: login.php');
	pg_close($conn);
}
$user = $_POST["user"];
$pass = $_POST["pass"];
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]="1"){
	$_SESSION["utilizador"]= $user;
	$_SESSION["password"] = $pass;
	pg_close($conn);
	header('Location: index.php');
}else{
	pg_close($conn);
	header('Location: login.php');
}

//header('Location: index.php');


?>