<?php

$servername = "br-cdbr-azure-south-a.cloudapp.net:3306";
$username = "b47052e290ab5f";
$password = "6404b798";
$dbname = "acsm_6fe25da792f37a3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$login = $_GET['login'];

$sql = "SELECT * FROM tb_shop WHERE CNPJ = '$login' ;";

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $idDoCaraQueCadastro = $row["id"];
    $nomeRestaurante = $row["Name"];
}

$dataReturn = ['id' => $idDoCaraQueCadastro , 'name' => utf8_encode($nomeRestaurante)];

//$jsonEncodeReturn = json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);

header('Content-Type: application/json');
echo json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);

?>