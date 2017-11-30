<html>
<title>Teste php</title>
<head></head>
<body>
<?
$servidor = 'ec2-184-73-206-155.compute-1.amazonaws.com:5432';
$banco = 'dcddreidjnggtn';
$usuario = 'agvlrlhnpncwkh';
$senha = '548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56';
$link = mysql_connect($servidor, $usuario, $senha);

$db = mysql_select_db($banco,$link);
if(!$link)
{
    echo "erro ao conectar ao banco de dados!";}
?>


</body>
</html>