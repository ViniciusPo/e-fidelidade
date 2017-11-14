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
	
	<script src="/js/AngularJs/angular.min.js"></script>
	<script src="/js/Jquery/jquery-3.2.1.min.js"></script>
	<script src="/js/Bootstrap/popper.js"></script>
	<script src="/js/Bootstrap/bootstrap.min.js"></script>
	
	<script src="/js/AngularJs/angularApp.js"></script>
	<script src="/js/Controller/cadastroClientController.js"></script>
	
	<script src="/js/ServiceWorkers/serviceWorker.js"></script>
	
	<base href="/cadastro-client"/>
	
	<link rel="manifest" href="/manifest.json">

</head>
<body ng-app="myApp" ng-controller="cadastroClientController">
    
    <div id="loading" ng-show="isLoading">
		<img id="loading-image" src="/img/Facebook.gif" alt="Loading..." />
	</div>
        
	<header>
		<h1 style="text-align:center;width: 100%;">E-fidelidade</h1>
    </header>
    
    
    
    <div class="main-content col-md-12" >

        <form class="form-basic" method="post">
            
            <div class="form-title-row" style="margin-bottom:20px;">
                <h1>Cadastro</h1>
            </div>
            
            <h4 style="margin-bottom: 25px; color: red;">{{mensagem}}</h4>
            
            <div ng-hide="mensagem.length > 0">
                
                <div class="form-row">
                    <label>
                        <span>Nome</span>
                        <input type="text" ng-model="cadastro.nome">
                    </label>
                </div>
    
                <div class="form-row">
                    <label>
                        <span>CPF</span>
                        <input type="text" ng-model="cadastro.cpf">
                    </label>
                </div>
                
                <div class="form-row">
                    <label>
                        <span>Password</span>
                        <input type="password" ng-model="cadastro.password">
                    </label>
                </div>
            
            </div>

            <div class="col-md-12 col-12 row">
                
                <button ng-hide="mensagem.length > 0" class="col-md-5 col-5 button-login-client" ng-click="CadastroClient(cadastro)">Cadastro</button>
                <div class="col-md-2 col-2"></div>
                <button class="col-md-5 col-5 button-login-client" ng-click="Home()">Voltar</button>
                
            </div>

        </form>

    </div>

</body>

</html>
