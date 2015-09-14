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
    echo '<div><p>Gerencie seus projetos: <a href="gerenciar_projetos.php"><button type="button">Gerenciar</button></a> </p></div>';               
}



// Lista todos os projetos

$sql = "SELECT id, name, description FROM space";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<table border='2'>";
    echo "<thead>
           <tr>
             <th>ID</th>
             <th>Projeto</th>
             <th>Descrição do projeto</th>
             </tr>
         </thead>";    
    while($row = $result->fetch_assoc()) {
    echo"<form action='requisitar_participacao_projeto.php' method='POST'>";
        echo "<input type='hidden' name='projeto_id' value=".$row["id"].">";
        echo "<tr>";
        echo "<td>".$row["id"]."</td>".
             "<td>" . $row["name"]. "</td>".
             "<td> ". $row["description"]. "</td>";
        
        echo "<td><input type='submit' onclick='return confirm(\"Tem certeza que deseja requisitar a participação nesse projeto?\")' value='Participar' name='participar'  /></td>";        
        echo "</tr>";
    echo"</form>";
        
    }
    
    echo"</table>";
    
} else {
    echo "0 results";
}
$conn->close();


?>