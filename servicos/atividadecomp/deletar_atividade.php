<?php

//pegando informação do banco de dados
require_once '../../database/datanoob.php';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$status = $_GET["status"];

// sql to delete a record
$sql = "DELETE FROM `user_atividadecomp` WHERE id = $id";

if($status == 0){
    if (mysqli_query($conn, $sql)) {
        echo "Deleção realizada com sucesso.";
    } else {
        echo "Erro ao deletar registro. Erro: " . mysqli_error($conn);
    }
}else{
    echo "Essa atividade já foi processada, não é possível realizar a deleção.";
    
}

echo "<br><br><a href='atividade_complementar.php'>Voltar</a>";

mysqli_close($conn);
?>