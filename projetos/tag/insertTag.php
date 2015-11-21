
<head>
    <meta http-equiv="refresh" content="0; url=tag.php" />
</head>
<?php
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
$tag_id = $_POST["tag_id"];

//Pegar o ultimo wall_id
$sql = "INSERT INTO `user_tag`(`user_id`, `tag_id`) VALUES ('$user_id', '$tag_id')";
if (mysqli_query($conn, $sql)) {
    echo "Wall inserido com êxito!";
} else {
    echo "Erro na inserção da wall. Certifique de que preencheu os campos corretamente. Erro: " . $sql . "<br>" . mysqli_error($conn);
    //Lembrar de não mostrar erro ao usuári no produto final
    
}

$conn->close();
// header("location:tag.php");
 