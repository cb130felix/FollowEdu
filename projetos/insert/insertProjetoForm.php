<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       
        <form action="insertProjetoHandler.php" method="POST">
       
            <p>Nome do projeto: <input type="text" name="nome_projeto" value="" /></p>
            <p>Descrição do projeto: <input type="text" name="descricao_projeto" value="" /></p>
            <p>Data de término: <input type="date" name="finish_at" value="" /></p>
            
            
            <div id="select_tag">
                <?php 
                
                    require '../../database/datanoob.php';
                    require_once('../../protected/vendors/yii/yii.php');

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    // Lista todos os projetos

                    $sql = "SELECT id, nome, descricao FROM tag";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        echo"<table>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>"."<input type='checkbox' name=".$row["id"]." value='ON' />"."</td>".
                                 "<td>" . $row["nome"]. "</td>".
                                 "<td> - ". $row["descricao"]. "</td>";
                            echo "</tr>";

                        }

                        echo"</table>";

                    } else {
                        echo "0 results";
                    }
                    $conn->close();



                ?>

            </div>
            <input type="submit" value="Cadastrar" />
            
            
        </form>
            
        
        
    </body>
</html>

