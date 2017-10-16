<!DOCTYPE html>
<html>

<head>
	
	<title>e-Fidelidade</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Apple configuration for Web Application -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="e-Fidelidade">
    <link rel="apple-touch-icon" href="/img/Logo-e-Fidelidade.png">
    <link rel="apple-touch-startup-image" href="/img/logo.png">
    <meta name="apple-mobile-web-app-status-bar-style" content="red">
    
    <meta name="theme-color" content="#9c27b0">

    <link rel="shortcut icon" href="/img/Logo-e-Fidelidade.png">

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="/css/main-css.css">
	<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
	
	<script src="/js/AngularJs/angular.min.js"></script>
	<script src="/js/Jquery/jquery-3.2.1.min.js"></script>
	<script src="/js/Bootstrap/popper.js"></script>
	<script src="/js/Bootstrap/bootstrap.min.js"></script>
	
	<script src="/js/AngularJs/angularApp.js"></script>
	<script src="/js/Controller/userController.js"></script>
	
	<base href="/main_client.php"/>
	
	<script src="/js/ServiceWorkers/serviceWorker.js"></script>
	
	<link rel="manifest" href="/manifest.json">

</head>

<body ng-app="myApp" ng-controller="userController">
	
	<header>
		<h1 style="text-align:center;width: 100%;">e-Fidelidade</h1>
    </header>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>Seus cartões</h1>
            </div>
			
			<div class="form-row col-md-12" ng-repeat="x in cartoesFidelidade">
				<div class="col-md-12">
					<div class="bloco-restaurante">
						<h5> {{x.nomeRestaurante}}  </h5>
						<h5 class="pontuacao-do-restaurante"> {{x.numeroPontosRestaurante}} </h5>
						<h5 class="pontuacao-do-restaurante">/</h5>
						<h5 class="pontuacao-do-restaurante"> {{x.pontosUsuario}} </h5>
					</div>
                </div>
            </div>
			
			
			<div class="form-title-row">
                <h1>Restaurantes proximos </h1>
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
