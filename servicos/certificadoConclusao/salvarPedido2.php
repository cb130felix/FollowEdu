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

			$codigo = $_POST["codigo"];// Pegando o código que o usuário digitou
	
			include "conexaoBanco.php"; 
			
			$sql = "SELECT * FROM codigos_certificados_conclusao WHERE CODIGO = ".$codigo; // Aqui ele verifica se o código que o usuário digitou já existe no BD 
			$resultado = mysqli_query($conexao,$sql); // conexao vem do include
			
			//mysqli_close($conexao);
			
			if(mysqli_num_rows($resultado) > 0){// Se ele achar no BD um código igual ao que o usuário digitou, ele avisará ao mesmo e retornará a tela anterior
				
				mysqli_free_result($resultado);
				
				echo "<form action=\"principal.php\" method=\"post\">
							<p>Este código já foi utilizado!</p>
							
            				<input type=\"submit\" value=\"Voltar\" class=\"button special\">

					 </form>";
				
			}
			else{
				
				mysqli_free_result($resultado);
				
				include "salvarArquivo.php"; // Esse script transfere a imagem do comprovante para uma pasta do sistema
				
				/* Cada código de comprovante está relacionado com um histórico escolar cadastrado no sistema. Então antes de salvar o código no BD, o
				   sistema pega o último ID cadastrado e salva, junto com o código do histórico, o seu valor + 1
				*/
				$sql = "SELECT id FROM `certificado_conclusao` ORDER BY id DESC LIMIT 1"; // Pegando o último ID de histórico escolar salvo no BD
				$resultado = mysqli_query($conexao,$sql);
				$id_max;
				
				if(mysqli_num_rows($resultado) == 0){ // Caso não tenha um histórico salvo no sistema
					
					$id_max = 0; // Será que é 0? 
					
				}
				
				else{
					
					While($row = mysqli_fetch_array($resultado)){
					
						$id_max = $row["id"];
					
					}
				
					$id_max = $id_max + 1;

				}
				
				
				$sql = "INSERT INTO `codigos_certificados_conclusao` (`codigo`,`id_conclusao`)VALUES"; // Salvando o código no BD
				$sql = $sql. "('$codigo','$id_max')";
				$resultado = mysqli_query($conexao,$sql);
				
				include "salvarPedido1.php";
				
			}
			
			

			//mysqli_close($conexao);


		?>


	</body>


</html>