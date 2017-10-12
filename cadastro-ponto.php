<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
	<title>e-Fidelidade</title>
	
	<link rel="shortcut icon" href="/img/logo.png">

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="css/main-css.css">
	<link rel="stylesheet" href="js/QRcode/style.css">
	<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
	
    <script src="/js/AngularJs/angular.min.js"></script>
	<script src="/js/Jquery/jquery-3.2.1.min.js"></script>
	<script src="/js/Bootstrap/popper.js"></script>
	<script src="/js/Bootstrap/bootstrap.min.js"></script>
	
	<script src="/js/AngularJs/angularApp.js"></script>
	<script src="/js/Controller/cadastroPontoController.js"></script>
	
	<base href="/cadastro-ponto.php"/>
	
	<script type="text/javascript" src="js/QRcode/adapter.min.js"></script>
    <script type="text/javascript" src="js/QRcode/vue.min.js"></script>
    <script type="text/javascript" src="js/QRcode/instascan.min.js"></script>
	
	
</head>

<body ng-app="myApp" ng-controller="cadastroPontoController">

	<header>
		<h1 style="text-align:center;width: 100%;">VAR RESTAURANTE</h1>
    </header>


    <div class="col-md-12 cameraParaQrCode hidden" id="app">
        
        <div class="preview-container">
            <video id="preview"></video>
        </div>
        <script type="text/javascript" src="js/QRcode/app.js"></script>
    </div>

    <div class="main-content col-md-12 formularioDeCadastroDePontos">

        <form class="form-basic" method="post">
            
            <div style="margin-bottom:20px;">
                <h3>{{MensagemRetorno}}</h3>
            </div>
            
            <div class="form-title-row" style="margin-bottom:20px;">
                <h1>Cadastro de Pontuacao</h1>
            </div>
            
            <div class="form-row">
                <label>
                    <span> CPF / CODE </span>
                    <input type="text" id="cpf_code" ng-model="pontos.code">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Numero de pontos</span>
                    <select name="dropdown" ng-model="pontos.numero">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
						<option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </label>
            </div>
            
            <div class="col-md-12 row" style="margin-bottom:40px;">
                
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button class="col-md-12 button-qrcode-reader" ng-click="AbrirCamera()">Leitor QrCode </button>
                </div>
                <div class="col-md-3"></div>
                
            </div>

            <div class="col-md-12 row" style="margin-bottom:40px;">
                
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button class="col-md-12" ng-click="cadastrarPontuacao(pontos)">Cadastro de Pontuação</button>
                </div>
                <div class="col-md-3"></div>
            </div>

        </form>

    </div>

</body>

</html>
