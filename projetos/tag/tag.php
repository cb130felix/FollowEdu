
    <h1>Suas habilidades</h1>
    
    <p>Escolha as habilidades que você possui. De acordo com o seu perfil o followedu recomendará projetos para você participar!</p>
        <table border='1'>

        <?php 

        require '../../database/datanoob.php';
        require_once('../../protected/vendors/yii/yii.php');

        Yii::createWebApplication('../../protected/config/main.php');
        $user_id = Yii::app()->user->id;
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        // Lista todos os projetos
        
        
        //****************************************************************
        // HABILIDADES QUE O USUÁRIOS TEM
        //****************************************************************
        $sql_user_tag = "SELECT tag.nome as tn, tag.id as ti FROM tag, user_tag WHERE tag.id = user_tag.tag_id and user_tag.user_id = $user_id";
        
        $result = $conn->query($sql_user_tag);

        if ($result->num_rows > 0) {
            // output data of each row
    
            while($row = $result->fetch_assoc()) {
                echo"<form action='deletarTag.php' method='POST'>";
                    echo "<input type='hidden' name='tag_id' value=".$row["ti"].">";
                    echo "<tr>";
                    echo "<td>".$row["tn"]."</td>";
                    echo "<td><input type='submit' value='Deletar' name='participar'  /></td>";        
                    echo "</tr>";
                echo"</form>";

            }



        }
        
        //****************************************************************
        // HABILIDADES QUE O USUÁRIOS  >>NÃO<<  TEM
        //****************************************************************
        
        $sql_user_sem_tag = "SELECT tag.nome as tn, tag.id as ti FROM tag WHERE tag.id NOT IN (SELECT tag.id FROM tag, user_tag WHERE tag.id = user_tag.tag_id and user_tag.user_id = $user_id)";
        
        $result = $conn->query($sql_user_sem_tag);

        if ($result->num_rows > 0) {
            // output data of each row

    
            while($row = $result->fetch_assoc()) {
                echo"<form action='insertTag.php' method='POST'>";
                    echo "<input type='hidden' name='tag_id' value=".$row["ti"].">";
                    echo "<tr>";
                    echo "<td>".$row["tn"]."</td>";
                    echo "<td><input type='submit' value='Incluir' name='participar'  /></td>";        
                    echo "</tr>";
                echo"</form>";

            }

     

        }
        
        $conn->close();
        

    ?>
    
        </table>