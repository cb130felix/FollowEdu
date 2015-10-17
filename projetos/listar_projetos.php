<?php


//pegando informação do banco de dados
require '../database/datanoob.php';
require_once('../protected/vendors/yii/yii.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Lista todos os projetos

$sql = "SELECT id, name, description, created_by FROM space";
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
        echo "<input type='hidden' name='created_by' value=".$row["created_by"].">";
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