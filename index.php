<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>e-Fidelidade</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="/css/main-css.css">
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch5ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<script src="/js/AngularJs/angularApp.js"></script>
	<script src="/js/Controller/loginController.js"></script>

    <script>
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js')
          .then(function () {
            console.log('service worker registered');
          })
          .catch(function () {
            console.warn('service worker failed');
          });
      }
    </script>
	
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
