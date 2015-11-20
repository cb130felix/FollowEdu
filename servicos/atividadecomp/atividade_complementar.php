<html>
    <head>
        <link href="/FollowEdu/css/bootstrap.min.css?ver=0.11.2" rel="stylesheet">
        <title>Atividades Complementares</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <div class = "container">
        <h1>Cadastro de atividades complementares</h1>
        <p>
        <form action="ac_handler.php" method="POST" enctype="multipart/form-data" role="form">
            
          
            Modalidade: 
            <select name="modalidade">
                <option>AT</option>
                <option>MN</option>
                <option>EAD</option>
                <option>PQ</option>
                <option>PB</option>
                <option>AP</option>
                <option>EXU</option>
                <option>EV</option>
                <option>IEE</option>
                <option>RD</option>
                <option>VT</option>
            </select> <br> <br>
            Atividade: <input type="text" name="atividade"  class="form-control" required/> <br>
            Carga horária: <input required type="number" name="hora" value="0"  class="form-control"/> <br>
            Data da atividade: <input required type="date" name="data"  class="form-control"/> <br>
            Instituição: <input required type="text" name="instituicao"  class="form-control"/> <br>
            Comprovante de atividade (Apenas arquivos jpg) <input required type="file" name="fileToUpload" id="fileToUpload">
            <br><input type="submit" value="Cadastrar" class="btn-success"/>
            
        </form>
        </p>
        
        <?php require_once('listar_atividades.php'); ?>
        </div>
    </body>
</html>
