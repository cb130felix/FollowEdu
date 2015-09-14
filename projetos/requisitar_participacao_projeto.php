<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



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

$projeto_id = $_POST["projeto_id"];
$sql_consulta = "SELECT `space_id`, `user_id`, `originator_user_id`, `status`, `request_message`, `last_visit`, `invite_role`, `admin_role`, `share_role`, `created_at`, `created_by`, `updated_at`, `updated_by` FROM `space_membership` WHERE `space_id` = $projeto_id and `user_id`= $user_id";
$result_consulta = $conn->query($sql_consulta);

if ($result_consulta->num_rows > 0) {
    echo "Você já participa ou já pediu para participar do projeto";
}else{

    $sql = "INSERT INTO `followedu`.`space_membership` (`space_id`, `user_id`, `originator_user_id`, `status`, `request_message`, `last_visit`, `invite_role`, `admin_role`, `share_role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES ('".$projeto_id."', '".$user_id."', 'NULL', '2', 'Acita ae pfv', '2015-09-12 00:00:00', '0', '0', '0', '2015-09-12 00:00:00', '".$user_id."', '2015-09-12 00:00:00', '".$user_id."');";

    if (mysqli_query($conn, $sql)) {
        echo "Sua requisição foi enviada ao dono do projeto!";
    } else {
        echo "Sua requisição não pôde ser enviada! Erro: " . $sql . "<br>" . mysqli_error($conn);
        //Lembrar de não mostrar erro ao usuári no produto final

    }

}

$conn->close();



?>
