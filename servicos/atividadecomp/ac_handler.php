<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "followedu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Pegando informações do usuário
require_once('../../protected/vendors/yii/yii.php');
Yii::createWebApplication('../../protected/config/main.php');
if(!Yii::app()->user->isGuest){
		$user_id = Yii::app()->user->id;
}

//Pegando informações do formulário
$atividade = $_POST["atividade"];
$hora = $_POST["hora"];

//Atribuindo valores numéricos pras atividades
if($atividade == "Chupar"){
    $atividade = 0;
    
}

$sql = "INSERT INTO `user_atividadecomp`(`user_id`, `atividade`, `hora`) VALUES ($user_id,$atividade,$hora)";

if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "<a href='atividade_complementar.php'>Voltar</a>";

?>