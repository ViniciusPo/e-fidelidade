<?php

$servername = "br-cdbr-azure-south-a.cloudapp.net:3306";
$username = "b47052e290ab5f";
$password = "6404b798";
$dbname = "acsm_6fe25da792f37a3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idUsuario = $_GET['idUsuario'];


$sql = "Select 
        	SUM(a.points) as pontosUser,
        	b.id,
        	b.name,
            b.NumberOfPointsToBonus,
            b.Image,
            b.Bonus
        from tb_resgiter_benefits as a
        	inner join tb_shop as b on a.id_shop = b.id
        where
        	a.id_user = '$idUsuario' and
            a.isActive = 1;";

$resultado = $conn->query($sql);

$resultArrayIndex = 0;
$dataReturn = [];

while ($row = $resultado->fetch_assoc()) {
    $dataReturn[$resultArrayIndex] = [ 
                                        'idRestaurante' => $row["id"] 
                                        ,'nomeRestaurante' => utf8_encode($row["name"]) 
                                        ,'numeroPontosRestaurante' => $row["NumberOfPointsToBonus"] 
                                        ,'imageRestaurante' => $row["Image"]
                                        ,'bonusRestaurante' => utf8_encode($row["Bonus"]) 
                                        ,'pontosUsuario' => $row["pontosUser"] 
                                    ];
    $resultArrayIndex++;
}

header('Content-Type: application/json');
echo json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);


?>