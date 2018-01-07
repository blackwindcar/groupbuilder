<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<form action="associarCreate.php" method="post" name="form1" id="form1">
  <label for="nome">Nome do projecto:</label>
  <input type="text" name="nome" id="nome">
  <input type="submit" name="Associar" id="Associar" value="Associar">
	<?php 
		if($_GET["msn"]!=null){
			if($_GET["msn"]==="erro"){echo("Não foi possivel associar");}
			
		}
		else{
			echo("");
		}
		
		?>
</form>
<a href="index.php">voltar</a>
</body>
</html>