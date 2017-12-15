<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
if($_SESSION["utilizador"]==null or $_SESSION["password"]==null){
		header("location: login.php");
	}
$user = $_SESSION["utilizador"];
$pass = $_SESSION["password"];
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: login.php");
}
pg_close($conn);
?>
<title>Home</title>
<link href="css/base.css" rel="stylesheet" type="text/css">
<head></head>
<body>
<header>
  <table width="100%" border="0">
    <tbody>
      <tr>
        <td width="60%" height="70"><img id="logo" src="img/logo.png" width="91" height="70" alt=""/></td>
        <td width="40%">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</header>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="200"><nav>O conteúdo da nova tag nav é inserido aqui</nav></td>
      <td><main>O conteúdo da nova tag main é inserido aqui</main></td>
    </tr>
  </tbody>
</table>



<footer>O conteúdo da nova tag footer é inserido aqui</footer>

</body>
</html>