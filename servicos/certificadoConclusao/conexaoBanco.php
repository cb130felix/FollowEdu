<?php 

	// Informações do Banco de Dados
	/*$hostname = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "followedu2";*/
	
	$servername = "renanfelixrodrigues.com.br";
	$username = "renan549_upe";
	$password = "upe2015";
	$dbname = "renan549_followedu";
	include("../../database/datanoob.php");
	
	$conexao = mysqli_connect($servername, $username, $password, $dbname) or die ("Erro ao conectar!");
	
       
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>