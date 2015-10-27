<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<body>
    <div class="container">
    <h1>Projetos</h1>

    <p>Escolha um projeto que deseja participar. Sua solicitação será encaminhada automaticamente
    para o criador do projeto, você precisará aguardar até a notícia da aprovação ou não de seu
    ingresso no projeto. Periodicamente você também receberá sugestões de projetos de acordo
    com as <a href="/FollowEdu/index.php?r=custom_pages/view&id=8" target="_blank">habilidades definidas no seu perfil</a> através do sistema de notificações.</p>


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
        echo '<b><div>Professor! <a href="insert/insertProjetoForm.php"><button type="button">Adicione</button></a> um projeto!</p></div></b>';               
    }
    ?>

    
            <form action="main.php" method="post">
                
                <h3>Filtro de projetos</h3>
                Nome do criador do projeto: <input type="text" name="pesquisa" value="" />
                 <input type="submit" value="Pesquisar" /> <br/>
               Tags dos projetos:
            
                <?php
                //add as tags pra pesquisa
                require_once 'listarTags.php';

                ?>
              
            </form>

    <h3>Lista de Projetos</h3>
    <?php

    require_once('listar_projetos.php');


    ?>
</div>
</body>
</html>