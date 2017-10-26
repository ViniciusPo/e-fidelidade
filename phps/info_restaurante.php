<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idUsuario = $_GET['idUsuario'];
$idRestaurante = $_GET['idRestaurante'];

$resultArrayIndex = 0;
$dataReturn = [];

$sql = "Select 
        	s.*,
            sum(a.points) as pontosUser
        from 
        	tb_shop as s
        		left join tb_register_benefits as a ON s.id = a.id_shop and a.id_user = '$idUsuario'
        where
        	s.id = '$idRestaurante';";

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $dataReturn[$resultArrayIndex] = [ 
                                        'nomeRestaurante' => utf8_encode($row["Name"])
                                        ,'emailRestaurante' => $row["Email"]
                                        ,'enderecoRestaurante' => utf8_encode($row["Location"])
                                        ,'CEPRestaurante' => $row["CEP"]
                                        ,'latitudeRestaurante' => $row["latitude"]
                                        ,'longitudeRestaurante' => $row["longitude"]
                                        ,'cardImageRestaurante' => "data:image/jpeg;base64," . $row["cardImage"]
                                        ,'numeroPontosRestaurante' => $row["NumberOfPointsToBonus"] 
                                        ,'imageRestaurante' => "data:image/jpeg;base64," . $row["Image"]
                                        ,'bonusRestaurante' => utf8_encode($row["Bonus"]) 
                                        ,'pontosUsuario' => $row["pontosUser"]
                                        ,'temBonus' => ($row["pontosUser"] >= $row["NumberOfPointsToBonus"] )
                                    ];
    $resultArrayIndex++;
}

header('Content-Type: application/json');
echo json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);


?>