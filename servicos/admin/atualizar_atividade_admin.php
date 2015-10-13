<?php

//pegando informação do banco de dados
require_once '../../database/datanoob_online.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$sub = $_GET["sub"];

if($sub == "Aprovar"){
    $sub = 1;  
}else if($sub == "Recusar"){
    $sub = 2;
}

// sql to delete a record
$sql = "UPDATE `user_atividadecomp` SET `status`=$sub WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Atualização concluída.";
} else {
    echo "Erro ao realizar atualização: " . mysqli_error($conn);
}


mysqli_close($conn);

echo "<br><br><br><a href='atividade_aprov.php'>Voltar</a>";


?>
