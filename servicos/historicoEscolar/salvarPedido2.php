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

			$codigo = $_POST["codigo"];
	
			include "conexaoBanco.php";
			
			$sql = "SELECT * FROM codigos_historicos_escolares WHERE CODIGO = ".$codigo;
			$resultado = mysqli_query($conexao,$sql); // conexao vem do include
			
			//mysqli_close($conexao);
			
			if(mysqli_num_rows($resultado) > 0){
				
				mysqli_free_result($resultado);
				
				echo "<form action=\"principal.php\" method=\"post\">
							<p>Este código já foi utilizado!</p>
							
            				<input type=\"submit\" value=\"Voltar\" class=\"button special\">

					 </form>";
				
			}
			else{
				
				mysqli_free_result($resultado);
				
				$sql = "SELECT id FROM `historico_escolar` ORDER BY id DESC LIMIT 1"; 
				$resultado = mysqli_query($conexao,$sql);
				$id_max;
				
				While($row = mysqli_fetch_array($resultado)){
					
					$id_max = $row["id"];
					
				}
				
				$id_max = $id_max + 1;
				
				
				$sql = "INSERT INTO `codigos_historicos_escolares` (`codigo`,`id_historico`)VALUES";
				$sql = $sql. "('$codigo','$id_max')";
				$resultado = mysqli_query($conexao,$sql);
				
				include "salvarPedido1.php";
				
			}
			
			

			//mysqli_close($conexao);


		?>


	</body>


</html>