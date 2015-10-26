<?php


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
