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
$sql = "DELETE FROM `user_tag` WHERE user_id = '$user_id' and tag_id = '$tag_id'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


$conn->close();
header("location:tag.php");