<?php


$servername = "br-cdbr-azure-south-a.cloudapp.net:3306";
$username = "b47052e290ab5f";
$password = "6404b798";
$dbname = "acsm_6fe25da792f37a3";

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


$sqlInsert = "INSERT INTO tb_resgiter_benefits (id_user,id_shop,isActive,Registration_date,points)
VALUES($idClient,$idShop,1,NOW(),$numPontos);";

if ($conn->query($sqlInsert) === TRUE) {
    echo "Cliente $nomeClient ganhou $numPontos pontos";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>