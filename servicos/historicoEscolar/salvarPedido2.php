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
				
				echo "<form action=\"form.php\" method=\"post\">
							<p>Este código já foi utilizado!</p>
							
            				<input type=\"submit\" value=\"Voltar\" class=\"button special\">

					 </form>";
				
			}
			else{
				
				mysqli_free_result($resultado);
				
				$sql = "INSERT INTO `codigos_historicos_escolares` (`codigo`)VALUES";
				$sql = $sql. "('$codigo')";
				$resultado = mysqli_query($conexao,$sql);
				
				include "salvarPedido1.php";
				
			}
			
			

			//mysqli_close($conexao);


		?>


	</body>


</html>