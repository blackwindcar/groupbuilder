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
	exit;
}
if($_GET["nome"]==null){
	pg_close($conn);
	header("location: index.php");
	exit;
}
$nome = $_GET["nome"];

$sql = "select count(*) from \"projeto\" where \"nome\" = '$nome' and \"admin\" = '$user'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="1"){
	$administrador = true;
}else{
	$administrador = false;

}
$sql = "select count(*) from \"grupo\",\"uestap\" where \"grupoid\" = \"id\" and \"utilizadoruser\" = '$user' and grupo.projetonome = '$nome'";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="1"){
	$grupo = true;
}else{
	$grupo = false;
}

$sql = "select count(*) from projeto where nome = '$nome' and to_timestamp(to_char(current_timestamp,'yyyy/mm/dd'),'yyyy/mm/dd')<tempofinal";
if(pg_fetch_row(pg_query($conn,$sql))[0]=="1"){
	$sql = "select TO_CHAR(tempofinal,'dd/mm/yyyy') from projeto where nome = '$nome'";
	$tempo = pg_fetch_row(pg_query($conn,$sql))[0];
}
else{
	$tempo = "Terminou";
}

?>
<html>
<head>
<meta charset="utf-8">
<title>Projeto</title>
</head>

<body>
<a href="conta.php"><?php echo($user); ?></a>
<a href="index.php">Voltar</a>
<a href="logout.php">Sair</a>
<a>Data de termino: <?php echo($tempo);?></a>
<?php if($administrador){?>
<div>
	<a>Numero de grupos: </a>
	<a>Numero de pessoas sem grupo: </a>
	<a>Lista de grupos: </a>
	<?php 
		$sql = "select id,nome,projetoadmin from \"grupo\" where \"projetonome\" = '$nome'";
		$result = pg_query($conn,$sql);
		while($row = pg_fetch_row($result)){
			$adminp =$row[2];
			$sql = "select nome,nuniversidade from \"utilizador\" where \"user\" = '$adminp'";
			$row1 = pg_fetch_row(pg_query($conn,$sql));
			?>
			<div>
				<p>Nome: <?php echo($row[1]);?></p>
			  <p>id: <?php echo($row[0]);?></p>
				<p>Administrador: <?php echo($row1[0]."-".$row1[1]);?></p>
				<p>Membros: </p>
				<?php
					$sql = "select nome,nuniversidade,dataentradagrupo,email from \"uestap\",\"utilizador\" where uestap.utilizadoruser = utilizador.user and \"projetonome\" = '$nome' and \"grupoid\" = '".$row[0]."'";
					$result1 = pg_query($conn,$sql);
					while($row2 = pg_fetch_row($result1)){
				?>
					<p><?php echo($row2[0]."-".$row2[1]."-".$row2[2]."-".$row2[3]);?></p>
				
				<?php }?>
			
			</div>
			<?php
			
		}				 
	?>
	<a>Lista de pessoas sem grupo: </a>
	<?php 
		$sql = "select nome,nuniversidade from \"uestap\",\"utilizador\" where \"user\" = \"utilizadoruser\" and \"projetonome\" = '$nome' and \"grupoid\" is null";
		$result = pg_query($conn,$sql);
		while($row = pg_fetch_row($result)){
		?>
		<p><?php echo($row[0]."-".$row[1]);?></p>
	<?php
		}
	?>
</div>
<a href="#">Terminar formação de grupos</a>
<?php }?>
<?php if($grupo){?>
	<a>Lista de pessoas sem grupo: </a>
	<?php 
		$sql = "select nome,nuniversidade from \"uestap\",\"utilizador\" where \"user\" = \"utilizadoruser\" and \"projetonome\" = '$nome' and \"grupoid\" is null";
		$result = pg_query($conn,$sql);
		while($row = pg_fetch_row($result)){
		?>
		<p><?php echo($row[0]."-".$row[1]);?> <a href="#">Convidar</a></p>
	<?php
		}
	?>
	<p><a href="sairgrupo.php?nome=<?php echo($nome);?>">Sair do grupo</a></p>
<?php }else{?>
<a>Lista de grupos: </a>
	<?php 
		$sql = "select id,nome,projetoadmin from \"grupo\" where \"projetonome\" = '$nome'";
		$result = pg_query($conn,$sql);
		while($row = pg_fetch_row($result)){
			$adminp =$row[2];
			$sql = "select nome,nuniversidade from \"utilizador\" where \"user\" = '$adminp'";
			$row1 = pg_fetch_row(pg_query($conn,$sql));
			?>
<div>
				<p>Nome: <?php echo($row[1]);?></p>
				<p>id: <?php echo($row[0]);?></p>
				<p>Administrador: <?php echo($row1[0]."-".$row1[1]);?></p>
				<p><a href="juntar.php?nome=<?php echo($nome."&id=".$row[0]);?>>Juntar</a></p>
				<p>Membros: </p>
				<?php
					$sql = "select nome,nuniversidade,dataentradagrupo,email from \"uestap\",\"utilizador\" where uestap.utilizadoruser = utilizador.user and \"projetonome\" = '$nome' and \"grupoid\" = '".$row[0]."'";
					$result1 = pg_query($conn,$sql);
					while($row2 = pg_fetch_row($result1)){
				?>
					<p><?php echo($row2[0]."-".$row2[1]."-".$row2[2]."-".$row2[3]);?></p>
				
				<?php }?>
			
			</div>
			<?php
			
		}				 
	?>
	<form action="criargrupo.php?nome=<?php echo($nome);?>" method="post" name="form1" id="form1">
	  <label for="nome">Nome do grupo:</label>
      <input type="text" name="nome" id="nome">
      <input type="submit" name="submit" id="submit" value="Criar Grupo">
</form>
	
<?php }?>
</body>
</html>