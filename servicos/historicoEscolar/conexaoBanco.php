<?php 

	$hostname = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "followedu2";
	$conexao = mysqli_connect($hostname, $usuario, $senha, $banco) or die ("Erro ao conectar!");
	
       
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>