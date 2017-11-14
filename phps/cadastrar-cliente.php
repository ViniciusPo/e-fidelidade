<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$data = json_decode(file_get_contents("php://input"));

$CPF = $data->cpf;
$senha = $data->password;
$nome = $data->nome;

$sql = "SELECT * FROM tb_user WHERE CPF = '$CPF';";

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $idClient = $row["id"];
    $nomeClient = $row["Name"];
}

if($idClient == null){
    
    $codigoAleatorio = generateRandomString();
    
    $sqlInsert = "INSERT INTO tb_user(Name,Password,CPF,Code,Registration_date)
    VALUES('$nome','$senha','$CPF','$codigoAleatorio',NOW());";
    
    if ($conn->query($sqlInsert) === TRUE) {
        echo "BEM VINDO AO E-FIDELIDADE";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo "CPF ja cadastrado";
}

function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    $sql1 = "SELECT * FROM tb_user WHERE Code = '$randomString';";

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $resultado1 = $conn->query($sql1);
    
    while ($row1 = $resultado1->fetch_assoc()) {
        $idClient1 = $row1["id"];
        $nomeClient1 = $row1["Name"];
    }
    
    if($idClient1 == null){
        return $randomString;
    }else{
        generateRandomString();
    }
}

?>