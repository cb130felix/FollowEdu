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
        <link href="/FollowEdu/css/bootstrap.min.css?ver=0.11.2" rel="stylesheet">
    </head>
    <body>
       
        <h1>Inserção de projeto</h1>
        <p>Entre com os dados referente ao projetoque deseja inserir. Usuários com aptidões equivalentes às requeridas em seu projeto receberão um aviso de que o projeto foi criado.</p>
        <form action="insertProjetoHandler.php" method="POST" role="form">
       
            <p>Nome do projeto: <input type="text" name="nome_projeto" value="" /></p>
            <p>Descrição do projeto: <input type="text" name="descricao_projeto" value="" /></p>
            <p>Data de término: <input type="date" name="finish_at" value="" /></p>
            
            
 
                <?php 
                
                    require '../../database/datanoob.php';
                    require_once('../../protected/vendors/yii/yii.php');

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 
                    
                    Yii::createWebApplication('../../protected/config/main.php');
                    $user_id = Yii::app()->user->id;
                    $sql_perfil = "SELECT perfil FROM profile WHERE user_id = $user_id";
                    $result_perfil = $conn->query($sql_perfil);
                    $row = $result_perfil->fetch_assoc();
                    $perfil = $row["perfil"];

                    if($perfil == 1){
                    
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
                     echo '<input type="submit" value="Cadastrar" />';
                    }else{
                        echo 'Você não tem permissão pra andar por aqui. :/';
                        
                    }
                    $conn->close();

                   

                ?>

            
            
            
        </form>
            
        
    </body>
</html>

