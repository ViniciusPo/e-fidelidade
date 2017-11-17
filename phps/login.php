<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$login = $_GET['login'];

$sql = "SELECT * FROM tb_user WHERE CPF = '$login' ;";

//$sql = "SELECT * FROM tb_user" ;

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $idDoCaraQueCadastro = $row["id"];
}

if( $idDoCaraQueCadastro == NULL ){
    $idDoCaraQueCadastro = -1;
}

header('Content-Type: application/json');
echo $idDoCaraQueCadastro;


?>