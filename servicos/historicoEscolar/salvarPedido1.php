<!doctype html>

<html lang="en">

	<head>
	
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	
	
	</head>
	
	<body>
	
		<?php
		
			include "infoUsusario.php";
			
			$nome = $nome_usuario;
			$cpf = $cpf_usuario;
			
			$sql= "INSERT INTO `historico_escolar`(`nome`, `cpf`) VALUES ";
			$sql= $sql."('$nome','$cpf')";
			
			$resultado = mysqli_query($conexao,$sql);
			
			$sql = "UPDATE profile SET emissao_historico = '1' where user_id = ".$user_id;
			$resultado = mysqli_query($conexao,$sql);
			
			mysqli_close($conexao);
			
			echo "<form action=\"../../servicos/menu.php\" method=\"post\">
					
					<p>Pedido realizado com sucesso!</p>
					<input type=\"submit\" value=\"Voltar\" class=\"button special\">
					
					
				  </form>
			
			
			";
		?>
		
	
	</body> 
	
	
	
</html>