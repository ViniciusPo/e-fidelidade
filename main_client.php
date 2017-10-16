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
    <meta name="apple-mobile-web-app-status-bar-style" content="#9c27b0">
    
    <meta name="theme-color" content="#9c27b0">

    <link rel="shortcut icon" href="/img/Logo-e-Fidelidade.png">

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="/css/main-css.css">
	<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
	
	<link rel="stylesheet" href="/css/FontAwesome/css/font-awesome.min.css">
	
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
			<div class="form-row col-md-12" ng-hide="cartoesFidelidade.length < 1 || cartoesFidelidade[0].idRestaurante == null" ng-repeat="x in cartoesFidelidade">
				<div class="col-md-12 col-12">
					<div class="bloco-restaurante col-md-12 col-12 row" ng-class="{ 'cartao-completo': x.temBonus }" style="text-align: center;">
						<div class="col-md-3 col-5">
							<img style="width:60px;height: 60px;border-radius: 50px;" ng-src="{{x.imageRestaurante}}" />
						</div>
						
						<div class="col-md-7 col-7">
							<h4> {{x.nomeRestaurante}}  </h4>
							<label style="margin-top: 5px;margin-bottom: 15px;color: grey;">{{x.bonusRestaurante}}</label>
						</div>
						
						<div class="col-md-2 col-12">
							<label class=""> {{x.pontosUsuario}} </label>
							<label class="">/</label>
							<label class=""> {{x.numeroPontosRestaurante}} </label>
							<i ng-hide="!x.temBonus" class="icone-presente fa fa-gift fa-3x" aria-hidden="true" style="color: gold;"></i>
							
						</div>
						
					</div>
                </div>
            </div>
            
            <div ng-hide="cartoesFidelidade.length >= 1 && cartoesFidelidade[0].idRestaurante != null">
            	<h4 style="margin-bottom: 25px; color: red; margin-top: -25px;"> Não tem cartões com pontuação no momento </h4>
            </div>
			
			
			<div class="form-title-row">
                <h1>Restaurantes proximos </h1>
            </div>
            
            
            <div class="form-row col-md-12" ng-hide="restaurantesProximos.length < 1 || restaurantesProximos[0].idRestaurante == null" ng-repeat="y in restaurantesProximos">
				<div class="col-md-12 col-12">
					<div class="bloco-restaurante col-md-12 col-12 row" style="text-align: center;">
						<div class="col-md-3 col-5">
							<img style="width:60px;height: 60px;border-radius: 50px;" ng-src="{{y.imageRestaurante}}" />
						</div>
						
						<div class="col-md-7 col-7">
							<h4> {{y.nomeRestaurante}}  </h4>
							<i class="fa fa-gift"></i><label style="margin-top: 5px;margin-bottom: 15px;color: grey;">  {{y.bonusRestaurante}}</label>
						</div>
						
						<div class="col-md-2 col-12">
							
							<label class=""> {{y.distancia | number:3}} km </label>
							
						</div>
						
					</div>
                </div>
            </div>

        </form>

    </div>

</body>

</html>
