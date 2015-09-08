<html>
    <head>
        <title>Atividades Complementares</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <form action="ac_handler.php" method="POST">
            
            
            
            Atividade: 
            <select name="atividade">
                <option>Chupar</option>
                <option>Dar</option>
                <option>Engolir</option>
                <option>Assoprar</option>
                <option>Sentar</option>
            </select> <br>
            
            
            Hora: <input type="number" name="hora" value="0" /> <br>
            
            <input type="submit" value="Cadastrar" />
            
        </form>
        
        <?php require_once('listar_atividades.php'); ?>
        
    </body>
</html>
