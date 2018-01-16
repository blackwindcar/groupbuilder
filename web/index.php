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
		exit;
		
	}
$user = $_SESSION["utilizador"];
$pass = $_SESSION["password"];
$sql = "select count(*) from \"utilizador\" where \"user\" = '$user' and \"password\" = '$pass'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="0"){
	pg_close($conn);
	header("location: login.php");
	exit;
}
?>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/myStyle.css">
<script src="js/bootstrap.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<meta charset="utf-8">
<title>Home</title>
</head>

<body>
<header>
	<div class="container-fluid">
		<div class="col-sm-8 text-center">
			<h1>GroupBuilder</h1>
		</div>
		<div class="col-sm-4 text-right">
			<h3>
				<a href="conta.php" class="btn botao-form btn-primary"><?php echo($user); ?></a>
				<a href="logout.php" class="btn botao-form btn-primary">Sair</a>
			</h3>
		</div>
	</div>
</header>

<div class="container-fluid">
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="row text-center">
				<a href="newProject.php" class="btn botao-index-func btn-primary">Novo Projecto</a>
			</div>
			<div class="row text-center">
				<a href="associar.php" class="btn botao-index-func btn-primary">Associar</a>
			</div>
		</div>
				<?php
				$sql = "SELECT * FROM \"projeto\" where \"admin\" = '$user'";
				$result = pg_query($conn,$sql);
				$teste = true;
				while($row = pg_fetch_row($result)){
					if($teste){
						$teste = false;?>
							<div class="panel panel-default text-center">
								<div class="panel-heading">Adminitrador</div>
								<div class="panel-body">
		
					<?php
						}
					?>
						<a  class="btn btn-primary botao-index-func" href="project.php?nome=<?php echo($row[0]);?>"><?php echo($row[0]);?></a>
					<?php
				}
				if(!$teste){
				?></div></div><?php
				}
				?>
			<?php
			$sql = "select \"projetonome\" from \"uestap\" where \"utilizadoruser\" = '$user';";
			$result = pg_query($conn,$sql);
			$teste = true;
			while($row = pg_fetch_row($result)){
				if($teste){
						$teste = false;?>
							<div class="panel panel-default text-center">
								<div class="panel-heading">Projetos</div>
								<div class="panel-body">
		
					<?php
						}
					
				?>
						<a  class="btn btn-primary botao-index-func" href="project.php?nome=<?php echo($row[0]);?>"><?php echo($row[0]);?></a>
					<?php
			}
			if(!$teste){
				?></div></div><?php
				}
			?>
			<?php ?>
	</div>
	<div class="col-sm-9">
		<div>
			<?php
			$sql = "select projeto.nome, uestap.grupoid from \"uestap\",\"projeto\" where projeto.nome = uestap.projetonome and uestap.utilizadoruser = '$user'";
			$result = pg_query($conn,$sql);
			while($row = pg_fetch_row($result)){?>
		  		<div class="panel panel-default text-center">
					<div class="panel-heading">
					<h2><?php echo($row[0]) ?></h2>
					</div>
					<div class="panel-body">
					<?php
					if($row[1]==null){
					?>
					<h3>Sem Grupo</h3>
			  		<a href="project.php?nome=<?php echo($row[0])?>">Associar a um grupo</a>
					</div>
				</div>
			  <?php }?>
				
			<?php
			}
			?>
		</div>
	</div>
</div>



</body>
</html>