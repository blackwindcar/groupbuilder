<html>
<title>Teste php</title>
<head></head>
<body>
<?
$servidor = 'ec2-184-73-206-155.compute-1.amazonaws.com';
$banco = 'dcddreidjnggtn';
$porto = 5432;
$usuario = 'agvlrlhnpncwkh';
$senha = '548d6de5795bf901f45d996069017c9002b8374deada3c37331b2ab74bea0e56';
$string_con = "host=$servidor port=$porto dbname=$banco user=$usuario password=$senha";
$conn = pg_connect($string_con);
if(!conn)
{
    echo "erro ao conectar ao banco de dados!";}
else{
	echo "entrou na data base";
}
?>


</body>
</html>