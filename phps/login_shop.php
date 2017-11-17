<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$login = $_GET['login'];

$sql = "SELECT * FROM tb_shop WHERE CNPJ = '$login' ;";

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $idDoCaraQueCadastro = $row["id"];
    $nomeRestaurante = $row["Name"];
}

$dataReturn;
if ($idDoCaraQueCadastro != NULL)
    $dataReturn = ['id' => $idDoCaraQueCadastro , 'name' => utf8_encode($nomeRestaurante)];
else {
    $dataReturn = ['id' => -1 , 'name' => utf8_encode('Não encontrado')];
}

//$jsonEncodeReturn = json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);

header('Content-Type: application/json');
echo json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);

?>