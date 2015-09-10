<?php

$quant_horas = 300;
$total_horas = 0;

//pegando informação do banco de dados
require_once '../../database/datanoob.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//Pegando informações do usuário
require_once('../../protected/vendors/yii/yii.php');
Yii::createWebApplication('../../protected/config/main.php');
if(!Yii::app()->user->isGuest){
		$user_id = Yii::app()->user->id;
}

$sql = "SELECT `user_id`, `atividade`, `hora`, `id`, `status` FROM `user_atividadecomp` WHERE user_id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
     echo"
        <table style='width:100% border='1'>'
        <thead>
           <tr>
             <th>Atividade</th>
             <th>Hora</th>
             <th>ID</th>
             <th>Status</th>
           </tr>
         </thead>            
       ";

    while($row = $result->fetch_assoc()) {
        $status;
        //calculando a quantidade de horas total
        if($row["status"] == 1){
            $total_horas += $row["hora"];
        }
        
        //Status da atividade
        if($row["status"] == 0){
            $status = "<font color='FF9900'>Pendente</font>";
        }else if($row["status"] == 1){
            $status = "<font color='33CC00'>Aprovado</font>";
        }else{
            $status = "<font color='red'>Reprovado</font>";
        }
        
        
        echo"<tr>
        
        <form action='deletar_atividade.php' method='GET'>
        <input type='hidden' name='id' value=".$row["id"].">
        <input type='hidden' name='status' value=".$row["status"].">
        <td>".$row["atividade"]. "</td>
        <td>".$row["hora"]."</td>
        <td>". $row["id"]. "</td>
        <td>". $status. "</td>"
        ."<td><input type='submit' onclick='return confirm(\"Tem certeza que deseja deletar esse item?\")' value='Deletar' /></td>". "</tr></form>";
        
        
        
              
    }
    
             echo"</table>";         
    
    
} else {
    echo "0 results";
}

echo "<br><br>Você completou $total_horas de $quant_horas horas de atividades complementares.";
if($total_horas > $quant_horas){
    
    echo "<font color='red'><br>ATENÇÃO: Você concluiu a carga horária de atividades requerida pelo curso. O pedido de sua documentação já foi realizado à escolaridade.</font>"
    . "<br>Status do pedido:";
    
}
$conn->close();
?>