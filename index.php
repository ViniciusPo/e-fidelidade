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
    
    <meta name="theme-color" content="#e00505">

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
	<script src="/js/Controller/loginController.js"></script>
	
	<script src="/js/ServiceWorkers/serviceWorker.js"></script>
	
	<link rel="manifest" href="/manifest.json">

</head>
<body>
    
        
	<header>
		<h1 style="text-align:center;width: 100%;">E-fidelidade</h1>
    </header>
    
    
    
    <div class="main-content col-md-12" ng-app="myApp" ng-controller="loginController">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post">
            
            <div class="form-title-row" style="margin-bottom:20px;">
                <h1>Login</h1>
            </div>

            <div class="col-md-12 col-12 row" style="margin-bottom:40px;">
                
                <div class="col-md-6 col-6">
                    <button class="col-md-10" ng-click="SelectCliente()" id="Selecionar-cliente">Cliente</button>
                </div>
    
                <div class="col-md-6 col-6">
                    <button class="col-md-10 button-not-selected" ng-click="SelectEmpresa()" id="Selecionar-empresa">Empresa</button>
                </div>
                
            </div>

            <div class="form-row">
                <label>
                    <span>EMAIL/CPF</span>
                    <input type="text" ng-model="login.name">
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Password</span>
                    <input type="password" ng-model="login.password">
                </label>
            </div>

            <div class="col-md-12 col-12 row">
                
                <button class="col-md-5 col-5 button-login-client" ng-click="LoginAppClient(login)">Login</button>
                <button class="col-md-5 col-5 button-login-empresa hidden" ng-click="LoginAppEmpresa(login)">Login Empresa</button>
                <div class="col-md-2 col-2"></div>
                <button class="col-md-5 col-5 button-login-client" ng-click="CadastroClient()">Cadastro</button>
                <button class="col-md-5 col-5 button-login-empresa hidden" ng-click="CadastroEmpresa()">Cadastro Empresa</button>
                
            </div>

        </form>

    </div>

</body>

</html>
