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
	pg_close($conn);
?>
<title>Login</title>
<link href="css/base.css" rel="stylesheet" type="text/css">
<head></head>
<body>
<form class = "form_login" action="newUser.php" method="post" name="form1" id="form1">
  <table width="288" border="1">
    <tbody>
      <tr>
        <td width="278"><label for="user">User:</label></td>
        <td width="278"><input type="text" name="user" id="user"></td>
      </tr>
      <tr>
        <td><label for="pass">Password:</label></td>
        <td><input type="text" name="pass" id="pass"></td>
      </tr>
      <tr>
        <td><label for="pass"> Repetir password:</label></td>
		  <td><input type="text" name="pass2" id="pass2"></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" id="submit" value="Registar"></td>
		  <td><a href="login.php">login</a></td>
      </tr>
    </tbody>
  </table>
</form>


</body>
</html>