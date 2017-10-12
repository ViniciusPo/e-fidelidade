<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>e-Fidelidade</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">

</head>


	<header>
		<h1 style="text-align:center;width: 100%;">PorKilao</h1>
    </header>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="phps/cadastrar_ponto.php">

            <div class="form-title-row">
                <h1>Cadastro de pontuação</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>CPF / CODE</span>
                    <input type="text" name="cpf_code">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Numero de pontos</span>
                    <select name="dropdown">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
						<option value="5">5</option>
                        <option value="6">6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                </label>
            </div>

            

            <div class="form-row">
                <button type="submit">Cadastrar pontuação</button>
            </div>

        </form>

    </div>

</body>

</html>
