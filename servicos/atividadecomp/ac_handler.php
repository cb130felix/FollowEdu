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

//inserir comprovante
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists. ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large. ";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" ) {
    echo "Sorry, only JPG files are allowed. ";
    $uploadOk = 0;
}

$sql = "INSERT INTO `user_atividadecomp`(`user_id`, `atividade`, `hora`, `modalidade`, `instituicao`, `data`, `status`) VALUES ('$user_id','$atividade','$hora','$modalidade', '$instituicao', '$data', 0)";
if( ($uploadOk != 0)){
    if ((mysqli_query($conn, $sql))) {

            $last_id = $conn->insert_id;
            // if everything is ok, try to upload file
            $target_file = "uploads/$last_id.jpg";
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }


        //final de 

        echo "Atividade inseridade com êxito!";

    }  
} else {
    //echo "Erro na inserção da atividade. Certifique de que preencheu os campos corretamente. Erro: " . $sql . "<br>" . mysqli_error($conn);
    echo "Erro na inserção da atividade. Certifique de que preencheu os campos corretamente.";
    //Lembrar de não mostrar erro ao usuári no produto final
    
}

$conn->close();

echo "<br><br><a href='atividade_complementar.php'>Voltar</a>";

?>