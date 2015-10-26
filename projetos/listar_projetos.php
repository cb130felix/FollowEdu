<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
    <link href="/FollowEdu/css/bootstrap.min.css?ver=0.11.2" rel="stylesheet">
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

        $sql = "SELECT 	space.created_at as space_created_at,
                        space.created_by as space_created_by,
                space.id as space_id, 
                space.name as space_name, 
                space.description as space_description,
                        user.username as user_username,
                        space.finish_at as space_finish_at

        FROM 	space, space_tag, user, tag

        WHERE 	space.id=space_tag.space_id and 
                        user.id=space.created_by and space_tag.tag_id = tag.id";
        //filtrando por nome do criador
        if(isset($_POST['pesquisa'])){
            $pesquisa = $_POST['pesquisa'];
            $sql .= " and user.username LIKE '%$pesquisa%'";
        }

        //Filtrando por tags
        $sql_select_tag = "SELECT id FROM tag";
        $result_tag = $conn->query($sql_select_tag);
        $pelo_menos_uma_tag = 0;
        if ($result_tag->num_rows > 0) {
            while($row = $result_tag->fetch_assoc()) {
                $id = $row["id"];
                if(isset($_POST[$id])){

                    if($pelo_menos_uma_tag == 0){
                        $pelo_menos_uma_tag += 1;
                        $sql .= " and ( ";
                    }else{
                        $sql .= " or ";
                    }
                    $sql .= " space_tag.tag_id = $id ";

                }
            }
            if($pelo_menos_uma_tag >= 1){
                $sql .= ")";
            }

        } else {
            echo "Não há tags.";
        }

        

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row

            echo"<table class='table'>";
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
            echo "<br/>Nenhum projeto encontrado.";
        }
        $conn->close();


        ?>
 
</body>
</html>