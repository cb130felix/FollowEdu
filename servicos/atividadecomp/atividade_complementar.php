<html>
    <head>
        <title>Atividades Complementares</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <div>
        <h1>Cadastro de atividades complementares</h1>
        <p>
        <form action="ac_handler.php" method="POST">
            
          
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
            </select> <br>
            Atividade: <input type="text" name="atividade"/> <br>
            Carga horária: <input type="number" name="hora" value="0" /> <br>
            Data da atividade: <input type="date" name="data"/> <br>
            Instituição: <input type="text" name="instituicao"/> <br>
            
            <input type="submit" value="Cadastrar" />
            
        </form>
        </p>
        </div>
        <?php require_once('listar_atividades.php'); ?>
        
    </body>
</html>
