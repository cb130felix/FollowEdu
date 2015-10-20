
<h1>Projetos</h1>




<?php

//pegando informação do banco de dados
require_once '../database/datanoob.php';
require_once('../protected/vendors/yii/yii.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//Cria botão com opção de administrar os projetos(apenas professores)

Yii::createWebApplication('../protected/config/main.php');
$user_id = Yii::app()->user->id;
$sql_perfil = "SELECT perfil FROM profile WHERE user_id = $user_id";
$result_perfil = $conn->query($sql_perfil);
$row = $result_perfil->fetch_assoc();
$perfil = $row["perfil"];

if ($perfil == 1) {
    echo '<div>Professoe! <a href="insert/insertProjetoForm.php"><button type="button">Adicione</button></a> um projeto!</p></div>';               
}


require_once('listar_projetos.php');


?>