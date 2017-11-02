<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$data = json_decode(file_get_contents("php://input"));

$codigo = $data->codigoCupom;

$sql = "SELECT id FROM tb_coupon WHERE code = '$codigo' AND spent_date IS NULL; ";

$resultado = $conn->query($sql);

if($resultado->num_rows == 1){
    while ($row = $resultado->fetch_assoc()) {
        $id = $row["id"];
        $sqlUpdate = "UPDATE tb_coupon
                        SET spent_date = NOW()
                        WHERE id = $id ;";
        
        if($conn->query($sqlUpdate) == TRUE){
            $dataReturn = [
                    'validadeCupom' => True,
                    'Mensagem' => "Sucesso! Cupom Válido!"
                ];
            header('Content-Type: application/json');
            echo json_encode($dataReturn, JSON_UNESCAPED_UNICODE);
        }
    }
    
}else{
     $dataReturn = [
                    'validadeCupom' => False,
                    'Mensagem' => "Cupom inválido!"
                ];
    header('Content-Type: application/json');
    echo json_encode($dataReturn, JSON_UNESCAPED_UNICODE);
}

?>