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
		
			include "infoUsusario.php"; // Pegando as informações do usuário
			
			$nome = $nome_usuario;
			$cpf = $cpf_usuario;
			
			$sql= "INSERT INTO `historico_escolar`(`nome`, `cpf`) VALUES "; // Cadastrando o histórico no BD
			$sql= $sql."('$nome','$cpf')";
			
			$resultado = mysqli_query($conexao,$sql);
			
			/* Se for a primeira vez que o usuário estiver pedindo um histórico, a variável $situacao_historico estará como null,
			   porém essa variável agora terá o valor 1, para indicar que ele já pediu um histórico
			*/
			if($situacao_historico == NULL){
				
				$sql = "UPDATE profile SET emissao_historico = '1' where user_id = ".$user_id;
				$resultado = mysqli_query($conexao,$sql);
				
			}
			
			mysqli_close($conexao);
			
			// Mostra uma tela ao usuário dizendo que o pedido foi realizado com sucesso
			echo "<form action=\"../../servicos/menu.php\" method=\"post\">
					
					<p>Pedido realizado com sucesso!</p>
					<input type=\"submit\" value=\"Voltar\" class=\"button special\">
					
					
				  </form>
			
			
			";
		?>
		
	
	</body> 
	
	
	
</html>