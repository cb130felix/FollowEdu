<?php

//pegando informação do banco de dados
require_once '../../database/datanoob_online.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT `user_id`, `atividade`, `hora`, `id`, `status` FROM `user_atividadecomp` WHERE status = 0";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
     echo"
        <table style='width:100%>'
        <thead>
           <tr>
             <th>Usuario</th>
             <th>Atividade</th>
             <th>Hora</th>
             <th>ID</th>
             <th>Status</th>
           </tr>
         </thead>            
       ";

    while($row = $result->fetch_assoc()) {
        echo"<tr>
        
        <form action='atualizar_atividade_admin.php' method='GET'>
        <input type='hidden' name='id' value=".$row["id"].">
        <td>".$row["user_id"]. "</td>
        <td>".$row["atividade"]. "</td>
        <td>".$row["hora"]."</td>
        <td>". $row["id"]. "</td>
        <td>". $row["status"]. "</td>"
        ."<td><input type='submit' name='sub' value='Aprovar' /></td>".
        "<td><input type='submit' name='sub' value='Recusar' /></td>".
               
        "</tr></form>";
        
              
    }
    
             echo"</table>";         
    
    
} else {
    echo "Não há atividades a serem aprovadas. ";
}
$conn->close();
?>