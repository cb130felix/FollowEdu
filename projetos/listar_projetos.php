<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
</head>
<body>
<?php


//pegando informação do banco de dados
require '../database/datanoob.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Lista todos os projetos

$sql = "SELECT space.created_at as space_created_at, space.created_by as space_created_by, space.id as space_id, space.name as space_name, space.description as space_description, user.username as user_username, space.finish_at as space_finish_at FROM space, user WHERE user.id = space.created_by ORDER BY `space`.`created_at` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<table border='2'>";
    echo "<thead>
           <tr>
             <th>Criado por</th>
             <th>Projeto</th>
             <th>Descrição do projeto</th>
             <th>Data de criação</th>
             <th>Data de término</th>
             </tr>
         </thead>";    
    while($row = $result->fetch_assoc()) {
    echo"<form action='requisitar_participacao_projeto.php' method='POST' accept-charset=utf-8>";
        echo "<input type='hidden' name='projeto_id' value=".$row["space_id"].">";
        echo "<input type='hidden' name='created_by' value=".$row["space_created_by"].">";
        echo "<tr>";
        echo "<td>".$row["user_username"]."</td>".
             "<td>" . $row["space_name"]. "</td>".
             "<td> ". $row["space_description"]. "</td>".
             "<td> ". $row["space_created_at"]. "</td>".
             "<td> ". $row["space_finish_at"]. "</td>";
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
</body>
</html>