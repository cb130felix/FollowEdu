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
			

			include "conexaoBanco.php";
			
			
			include "infoUsusario.php";
			
			if($situacao_historico == NULL){
				
				echo "<form action=\"salvarPedido1.php\" method=\"post\">
							<p>Essa é a sua primeira requisição, nesse período, do histórico escolar, logo não precisa pagar. Clique em continue para prosseguir.</p>
							
            				<input type=\"submit\" value=\"continue\" class=\"button special\">

					 </form>";
				
			}
			else{
				
				echo "<form action=\"salvarPedido2.php\" method=\"post\">
            				
							<p>Você já solicitou um histórico escolar nesse período. Anexe uma imagem do seu comprovante e digite o ID do comprovante: <br>
							ID:<input type=\"text\" required=\"required\" name=\"codigo\" pattern=\"[0-9]+$\" /> <br>
							<input type=\"file\" name=\"comprovante\" accept=\"image/*\" multiple required>
							<input type=\"submit\" value=\"continue\" class=\"button special\">
							

					 </form>";
				
			}
			
			//mysqli_close($conexao);
			//echo "tudo Ok!";
			
		?>
	
	</body>

</html>