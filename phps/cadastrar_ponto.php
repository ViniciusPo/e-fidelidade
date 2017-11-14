<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$data = json_decode(file_get_contents("php://input"));

$codeOrCpf = $data->code;
$idShop = $data->idShop;
$numPontos = $data->numPontos;

$sql = "SELECT * FROM tb_user WHERE CPF = '$codeOrCpf' or code = '$codeOrCpf' ;";

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $idClient = $row["id"];
    $nomeClient = $row["Name"];
}


$sqlInsert = "INSERT INTO tb_register_benefits (id_user,id_shop,isActive,Registration_date,points)
VALUES($idClient,$idShop,1,NOW(),$numPontos);";

if ($conn->query($sqlInsert) === TRUE) {
    echo "Cliente $nomeClient ganhou $numPontos pontos";
} else {
    echo 'CPF ou código inválido!';
}

?>