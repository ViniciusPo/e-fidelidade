<!DOCTYPE html>
<html>

<head>
	<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	
	
	?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>e-Fidelidade</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch5ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	

</head>


	<header>
		<h1 style="text-align:center;width: 100%;">e-Fidelidade</h1>
    </header>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>Seus cartões</h1>
            </div>
			
			
			<?php
			$sql = "SELECT nome, qnt_pontos FROM rp.tb_empresa WHERE id_empresa = 3";
			//$result = $conn->query($sql);
			$result=mysqli_query($conn,$sql);
			$rs = mysqli_fetch_array($result,MYSQLI_ASSOC);

			$nome_emp = $rs["nome"];
			$ponto = $rs["qnt_pontos"];
			
			
			//$sql2 = "select coalesce(sum(pontos),0) as pontos from tb_presenca where codigo = 'qwer' OR codigo = '45167533830';";
			//$result2 = $conn->query($sql2);
			//$row = $result2->fetch_assoc();

			//$rs2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
			// = $row["pontos"];
	
			?>
			
            <div class="form-row col-md-12">
				<div class="col-md-12">
					<div class="bloco-restaurante">
						<h5> <?php echo $nome_emp; ?>  </h5>
						<h5 class="pontuacao-do-restaurante"><?php echo $ponto; ?></h5>
						<h5 class="pontuacao-do-restaurante">/</h5>
						<h5 class="pontuacao-do-restaurante"> 3<?php //echo $pontos_usuario; ?></h5>
					</div>
                </div>
            </div>
			
			
			<div class="form-title-row">
                <h1>Restaurantes proximos</h1>
            </div>

            <div class="form-row col-md-12">
				<div class="col-md-12">
					<div class="bloco-restaurante">
						<h5>Panela da Cecilia </h5>
						<h5 class="pontuacao-do-restaurante">4</h5>
						<h5 class="pontuacao-do-restaurante">/</h5>
						<h5 class="pontuacao-do-restaurante">0</h5>
					</div>
                </div>
            </div>
			
			<div class="form-row col-md-12">
				<div class="col-md-12">
					<div class="bloco-restaurante">
						<h5>Restaurante bom</h5>
						<h5 class="pontuacao-do-restaurante">7</h5>
						<h5 class="pontuacao-do-restaurante">/</h5>
						<h5 class="pontuacao-do-restaurante">0</h5>
					</div>
                </div>
            </div>

        </form>

    </div>

</body>

</html>
