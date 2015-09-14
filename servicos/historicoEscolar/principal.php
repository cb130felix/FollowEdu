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
			

			include "conexaoBanco.php"; // Esse script apenas cria uma conexão com o banco de dados
			
			include "infoUsusario.php"; // E esse pega informações do usuário que está logado
			
			if($situacao_historico == NULL){ // Checando que o usuário já solicitou um histórico esse período
				
				// Caso ele não tenha solicitado ainda, o sistema avisa que é o primeiro, e que não é necessário pagar, e chama o script salvarPedido1.php
				echo "<form action=\"salvarPedido1.php\" method=\"post\">
							<p>Essa é a sua primeira requisição nesse período do histórico escolar, logo não precisa pagar. Clique em continue para prosseguir.</p>
							
            				<input type=\"submit\" value=\"continue\" class=\"button special\">

					 </form>";
				
			}
			else{
				
				/* Caso ele já tenha solicitado, o sistema pedirá que ele anexe uma imagem do comprovante de pagamento e digite o ID do comprovante
				   E será chamado o scritp salvarPedido2.php (a diferença dele para o salvarPedido2.php, é que ele cadastra antes no banco de dados
				   o código do comprovante e salva a imagem do mesmo*/ 
				echo "<form action=\"salvarPedido2.php\" method=\"post\" enctype=\"multipart/form-data\">
            				
							<p>Você já solicitou um histórico escolar nesse período. Anexe uma imagem do seu comprovante e digite o ID do comprovante: <br>
							ID:<input type=\"text\" required=\"required\" name=\"codigo\" pattern=\"[0-9]+$\" /> <br>
							(A imagem deve ter no máximo 2 MB)<br>
							<input type=\"file\" name=\"comprovante\" accept=\"image/*\" multiple required>
							<input type=\"submit\" value=\"continue\" class=\"button special\">
							

					 </form>";
				
			}
			
			//mysqli_close($conexao);
			//echo "tudo Ok!";
			
		?>
	
	</body>

</html>