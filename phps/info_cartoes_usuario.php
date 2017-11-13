<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idUsuario = $_GET['idUsuario'];
$userLongitude = $_GET['userLongitude'];
$userLatitude = $_GET['userLatitude'];

$resultArrayIndex = 0;
$dataReturn = [];
$dataReturn[0] = [];
$dataReturn[1] = [];

$sql = "Select 
            SUM(a.points) - IFNULL(coupon.points,0) AS pontosUser,
        	b.id,
        	b.name,
        	b.NumberOfPointsToBonus,
        	b.Image,
        	b.Bonus
        from tb_register_benefits as a
        inner join tb_shop as b on a.id_shop = b.id
        left join
        	( 	SELECT id_user, id_shop, SUM(points) as points
        		FROM tb_coupon 
                GROUP BY id_user, id_shop ) as coupon
        ON
        	a.id_user = coupon.id_user AND a.id_shop = coupon.id_shop
        where
        	a.id_user = ".$idUsuario."  and
        	a.isActive = 1
        group by
        	b.id
        order by
        	a.Registration_date DESC;
            ";

$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $dataReturn[0][$resultArrayIndex] = [ 
                                        'idRestaurante' => $row["id"] 
                                        ,'nomeRestaurante' => utf8_encode($row["name"]) 
                                        ,'numeroPontosRestaurante' => $row["NumberOfPointsToBonus"] 
                                        ,'imageRestaurante' => "data:image/jpeg;base64," . $row["Image"]
                                        ,'bonusRestaurante' => utf8_encode($row["Bonus"]) 
                                        ,'pontosUsuario' => $row["pontosUser"]
                                        ,'temBonus' => ($row["pontosUser"] >= $row["NumberOfPointsToBonus"])
                                    ];
    $resultArrayIndex++;
}

$resultArrayIndex = 0;

if($userLatitude == 0){
   
   $dataReturn[1] = ['dados'=>0];
   
}else{
    $sql2 = "   SELECT 
                    id,
                    name,
                    NumberOfPointsToBonus,
                    Image,
                    Bonus,
                    ( 6371 * acos( cos( radians('$userLatitude') ) * cos( radians( locations.latitude ) ) 
                    * cos( radians(locations.longitude) - radians('$userLongitude')) + sin(radians('$userLatitude')) 
                    * sin( radians(locations.latitude)))) AS distance 
                FROM tb_shop as locations
                HAVING distance < 1000 
                ORDER BY distance
                LIMIT 5;";
                
    $resultado2 = $conn->query($sql2);
    
    while ($row = $resultado2->fetch_assoc()) {
        $dataReturn[1][$resultArrayIndex] = [ 
                                            'idRestaurante' => $row["id"] 
                                            ,'nomeRestaurante' => utf8_encode($row["name"]) 
                                            ,'numeroPontosRestaurante' => $row["NumberOfPointsToBonus"] 
                                            ,'imageRestaurante' => "data:image/jpeg;base64," . $row["Image"]
                                            ,'bonusRestaurante' => utf8_encode($row["Bonus"])
                                            ,'distancia' => $row["distance"]
                                        ];
        $resultArrayIndex++;
    } 
}



header('Content-Type: application/json');
echo json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);


?>