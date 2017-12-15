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
<form class ="form_login" action="newUser.php" method="post" name="form1" id="form1">
  <table class="tabela_form"  border="0">
    <tbody>
      <tr>
        <td width="278" align="right" valign="middle"><label for="user">User:</label></td>
        <td width="278" align="left" valign="middle"><input name="user" type="text" required="required" id="user"></td>
      </tr>
      <tr>
        <td align="right" valign="middle"><label for="pass">Password:</label></td>
        <td align="left" valign="middle"><input name="pass" type="password" required="required" id="pass"></td>
      </tr>
      <tr>
        <td align="right" valign="middle"><label for="pass"> Repetir password:</label></td>
		  <td align="left" valign="middle"><input name="pass2" type="password" required="required" id="pass2"></td>
      </tr>
      <tr>
        <td align="right" valign="middle">Nome:</td>
        <td align="left" valign="middle"><input name="nome" type="text" required="required" id="nome"></td>
      </tr>
      <tr>
        <td align="right" valign="middle">Email:</td>
        <td align="left" valign="middle"><input name="email" type="email" required="required" id="email"></td>
      </tr>
      <tr>
        <td align="right" valign="middle"><input type="submit" name="submit" id="submit" value="Registar"></td>
        <td align="left" valign="middle"><a href="login.php" style="color: #FFFFFF">login</a></td>
      </tr>
    </tbody>
  </table>
</form>


</body>
</html>