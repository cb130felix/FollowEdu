<?php


//pegando informação do banco de dados
require_once '../../database/datanoob.php';

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

$instituicao = $_POST["instituicao"];
$data = $_POST["data"];
$modalidade = $_POST["modalidade"];
$atividade = $_POST["atividade"];
$hora = $_POST["hora"];


$sql = "INSERT INTO `user_atividadecomp`(`user_id`, `atividade`, `hora`, `modalidade`, `instituicao`, `data`, `status`) VALUES ('$user_id','$atividade','$hora','$modalidade', '$instituicao', '$data', 0)";

if (mysqli_query($conn, $sql)) {
    echo "Atividade inseridade com êxito!";
} else {
    echo "Erro na inserção da atividade. Certifique de que preencheu os campos corretamente. Erro: " . $sql . "<br>" . mysqli_error($conn);
    //Lembrar de não mostrar erro ao usuári no produto final
    
}

$conn->close();

echo "<br><br><a href='atividade_complementar.php'>Voltar</a>";

?>