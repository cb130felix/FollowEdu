<?php
	
			//Pegando informações do usuário
			require_once('../../protected/vendors/yii/yii.php');
			Yii::createWebApplication('../../protected/config/main.php');
			if(!Yii::app()->user->isGuest){
			$user_id = Yii::app()->user->id; // Pega o ID do usuário que está logado no sistema
			
			}
			
			include "conexaoBanco.php";
			
			$sql = "SELECT * FROM profile WHERE user_id = ".$user_id; // Faz uma consulta no perfil do usuário no BD
			$resultado = mysqli_query($conexao,$sql); // conexao vem do include
			
			$situacao_historico;
			$nome_usuario;
			$cpf_usuario;
			
			while($row = mysqli_fetch_array($resultado)){ // Pegando os dados do usuário (nome, situação do histórico e o CPF)
				
					$situacao_historico = $row["emissao_historico"];
					$nome_usuario = $row["firstname"]." ".$row["lastname"];
					$cpf_usuario = $row["cpf"];
			
			}
			
			mysqli_free_result($resultado);
			
?>