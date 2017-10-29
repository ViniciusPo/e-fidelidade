<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idUsuario = $_GET['idUsuario'];

$sql = "SELECT
	s.Name,
    s.Bonus,
    s.Image,
	c.code
FROM tb_coupon c
INNER JOIN tb_shop s
	ON c.id_shop = s.id    
WHERE ISNULL(spent_date)
AND id_user = $idUsuario
ORDER BY creation_date DESC;
";


$resultado = $conn->query($sql);
$resultArrayIndex = 0;

while ($row = $resultado->fetch_assoc()) {
    $dataReturn[$resultArrayIndex] = [ 
                                        'nomeRestaurante' => utf8_encode($row["Name"])
                                        ,'imageRestaurante' => "data:image/jpeg;base64," . $row["Image"]
                                        ,'bonusRestaurante' => utf8_encode($row["Bonus"]) 
                                        ,'codigoCupom' => $row["code"]
                                    ];
    $resultArrayIndex++;
}

header('Content-Type: application/json');
echo json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);

?>