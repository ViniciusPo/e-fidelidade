<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$data = json_decode(file_get_contents("php://input"));

$idShop = $data->idShop;
$idUsuario = $data->idUsuario;
$numPontosRestaurante = $data->numPontosRestaurante;



$declare = "SET @unique_code = (
	SELECT lpad(conv(floor(rand()*pow(36,6)), 10, 36), 6, 0) as ramdom_code
	FROM tb_coupon
	WHERE 'ramdom_code' NOT IN (SELECT code FROM tb_coupon)
	LIMIT 1
);
";
if ($conn->query($declare) === FALSE) {
    echo "Error: \n" . $conn->error;
    echo "\n\n\n" . $declare;
}

$declare2 = "SET @unique_code = (SELECT IFNULL(@unique_code,'zxcvbn') );";
if ($conn->query($declare2) === FALSE) {
    echo "Error: \n" . $conn->error;
    echo "\n\n\n" . $declare2;
}

$sqlInsert = "
INSERT INTO tb_coupon(id_user, id_shop, points, code, creation_date) VALUES( ".$idUsuario.",".$idShop.",".$numPontosRestaurante.", @unique_code , now() );
";

if ($conn->query($sqlInsert) === TRUE) {
    echo "Cupom gerado!";
} else {
    echo "Error: \n" . $conn->error;
    echo "\n\n\n" . $sqlInsert;
}


?>