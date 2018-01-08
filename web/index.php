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
?>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
</head>

<body>
<a href="conta.php"><?php echo($user); ?></a>
<a href="newProject.php">Novo Projecto</a>
<a href="associar.php">Associar</a>
<div>
	<?php
	$sql = "SELECT * FROM \"projeto\" where \"admin\" = '$user'";
	$result = pg_query($conn,$sql);
	while($row = pg_fetch_row($result)){
		echo("<a href=\"project.php?nome=".$row[0]."\" >".$row[0]."</a>");
	}
	?>
</div>
<div>
	<?php
	$sql = "select \"projetonome\" from \"uestap\" where \"utilizadoruser\" = '$user';";
	$result = pg_query($conn,$sql);
	while($row = pg_fetch_row($result)){
		echo("<a href=\"project.php?nome=".$row[0]."\" >".$row[0]."</a>");
	}
	?>
</div>
<div>
	<?php
	$sql = "select projeto.nome, uestap.grupoid from \"uestap\",\"projeto\" where projeto.nome = uestap.projetonome and uestap.utilizadoruser = '$user'";
	$result = pg_query($conn,$sql);
	while($row = pg_fetch_row($result)){?>
  <div>
			<h2><?php echo($row[0]) ?></h2>
			<?php
			if($row[0]==null){
			?>
	<h3>Sem Grupo</h3>
	  <a href="project.php?nome=<?php echo($row[0])?>">Associar a um grupo</a>
	  <?php }?>
	</div>
	<?php
	}
	?>
</div>
<a href="logout.php">Sair</a>
</body>
</html>