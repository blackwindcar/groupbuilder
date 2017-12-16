<!--<?php
// Start the session
session_start();
?>-->
<!DOCTYPE html>
<html>
<!--<?php
$conn = pg_connect();
$conn = pg_connect("host=ec2-184-73-206-155.compute-1.amazonaws.com dbname=dcddreidjnggtn user=agvlrlhnpncwkh password=548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56");
if (!$conn) {
  echo "An error occured.\n";
  exit; // Para a execução do script
}
	pg_close($conn);
?>-->
<title>Login</title>
<link href="css/base.css" rel="stylesheet" type="text/css">
<head></head>
<body>
<form class = "form_login" action="login_authentication.php" method="post" name="form1" id="form1">
  <table class = "tabela_form"  border="0">
    <tbody>
      <tr>
        <td width="278" align="right" valign="middle"><label for="user">User:</label></td>
        <td width="278" align="left" valign="middle"><input type="text" name="user" id="user"></td>
      </tr>
      <tr>
        <td align="right" valign="middle"><label for="pass">Password:</label></td>
        <td align="left" valign="middle"><input type="password" name="pass" id="pass"></td>
      </tr>
      <tr>
        <td align="right" valign="middle"><input type="submit"  class='botao1' name="submit" value="Login"></td>
		  <td align="left" valign="middle"><a href="registar.php"  class='botao1'>Registar</a></td>
      </tr>
    </tbody>
  </table>
</form>


</body>
</html>