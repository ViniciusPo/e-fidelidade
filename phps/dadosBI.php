<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idRestaurante = $_GET['idRestaurante'];

$sql = "SELECT CASE
		WHEN dias_semana.dia_semana = 1 THEN 'dom'
		WHEN dias_semana.dia_semana = 2 THEN 'seg'
		WHEN dias_semana.dia_semana = 3 THEN 'ter'
		WHEN dias_semana.dia_semana = 4 THEN 'qua'
		WHEN dias_semana.dia_semana = 5 THEN 'qui'
		WHEN dias_semana.dia_semana = 6 THEN 'sex'
		WHEN dias_semana.dia_semana = 7 THEN 'sab'
	END AS dia_semana,
IFNULL(dados.qnt_usuarios,0) AS qnt_usuario,
IFNULL(coupon.qnt_usuarios,0) AS qnt_premios FROM
(	SELECT 
		dayofweek(Registration_date) AS dia_semana,
		COUNT(distinct id_user) as qnt_usuarios
	FROM tb_register_benefits
    WHERE id_shop = $idRestaurante
	GROUP BY dia_semana
) AS dados
RIGHT JOIN
	(	SELECT 1 as dia_semana UNION
		SELECT 2 as dia_semana UNION
		SELECT 3 as dia_semana UNION
        SELECT 4 as dia_semana UNION
        SELECT 5 as dia_semana UNION
        SELECT 6 as dia_semana UNION
        SELECT 7 as dia_semana
    ) as dias_semana
	ON dados.dia_semana = dias_semana.dia_semana
LEFT JOIN
	(
		SELECT
			dayofweek(spent_date) as dia_semana,
            count(*) as qnt_usuarios
        FROM tb_coupon WHERE spent_date IS NOT NULL
        AND id_shop = $idRestaurante
        GROUP BY dia_semana
    ) AS coupon
	ON dias_semana.dia_semana = coupon.dia_semana

ORDER BY dias_semana.dia_semana
";


$resultado = $conn->query($sql);
$resultArrayIndex = 0;



while ($row = $resultado->fetch_assoc()) {
    $dataReturn[$resultArrayIndex] = [ 
                                        'diaSemana' => utf8_encode($row["dia_semana"])
                                        ,'qntUsuario' => utf8_encode( $row["qnt_usuario"])
                                        ,'qntPremio' => utf8_encode($row["qnt_premios"]) 
                                    ];
    $resultArrayIndex++;
}

header('Content-Type: application/json');
echo json_encode(["records"=>$dataReturn], JSON_UNESCAPED_UNICODE);


?>