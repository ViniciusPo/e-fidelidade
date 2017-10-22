<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idUsuario = $_GET['idUsuario'];

$sql = "Select *
        from 
        	tb_user
        where id = '$idUsuario' ; ";

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $codigo = utf8_encode($row["Code"]);
}


//header('Content-Type: application/json');
echo "$codigo";


?>