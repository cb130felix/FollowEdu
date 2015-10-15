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

$date = date("Y/m/d");
$nome_projeto = $_POST["nome_projeto"];
$descricao_projeto = $_POST["descricao_projeto"];

//Pegar o ultimo wall_id
$sql_select = "SELECT id FROM `wall` WHERE id=( SELECT max(id) FROM wall )";
$result = $conn->query($sql_select);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $wall_id = $row["id"] + 1;
    }
}



//Insert de projeto
$sql_insert_projeto = "INSERT INTO `space` (`id`, `guid`, `wall_id`, `name`, `description`, `website`, `join_policy`, `visibility`, `status`, `tags`, `created_at`, `created_by`, `updated_at`, `updated_by`, `ldap_dn`, `auto_add_new_members`) VALUES (NULL, 'xxxxxxxxxxxxxx', '$wall_id', '$nome_projeto', '$descricao_projeto', NULL, '2', '2', '1', NULL, '$date', '$user_id', '$date', '1', NULL, '1');";

if (mysqli_query($conn, $sql_insert_projeto)) {
   
    $space_id = $conn->insert_id;
    echo "Projeto inserido com êxito! id = ". $space_id;
    
} else {
    echo "Erro na inserção do projeto. Certifique de que preencheu os campos corretamente. Erro: " . $sql . "<br>" . mysqli_error($conn);
    //Lembrar de não mostrar erro ao usuári no produto final
    
}

//Insert de wall
$sql_insert_wall = "INSERT INTO `wall` (`id`, `object_model`, `object_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES ('$wall_id', 'Space', '$space_id', '$date', '$user_id', '$date', '$user_id');";
if (mysqli_query($conn, $sql_insert_wall)) {
    echo "Wall inserido com êxito!";
} else {
    echo "Erro na inserção da wall. Certifique de que preencheu os campos corretamente. Erro: " . $sql . "<br>" . mysqli_error($conn);
    //Lembrar de não mostrar erro ao usuári no produto final
    
}


//insert de participação no projeto
$sql_insert_member = "INSERT INTO `space_membership` (`space_id`, `user_id`, `originator_user_id`, `status`, `request_message`, `last_visit`, `invite_role`, `admin_role`, `share_role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES ('$space_id', '$user_id', NULL, '3', NULL, '$date', '1', '1', '1', '$date', '$user_id', '$date', '$user_id');";
if (mysqli_query($conn, $sql_insert_member)) {
    echo "membro inserido com êxito!";
} else {
    echo "Erro na inserção da wall. Certifique de que preencheu os campos corretamente. Erro: " . $sql . "<br>" . mysqli_error($conn);
    //Lembrar de não mostrar erro ao usuári no produto final
    
}



$conn->close();


?>