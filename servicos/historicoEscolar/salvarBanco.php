<?php

	include "banco.php";

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf']; 
	
	$sql1= "INSERT INTO pedido (nome, cpf) VALUES";
	$sql1= $sql1." ($nome,$cpf)";
	
	echo "$nome $cpf";
	
	$resultado = mysqli_query($conexao,$sql1);
	echo "salvo com sucesso";
	
	mysql_close();
?>