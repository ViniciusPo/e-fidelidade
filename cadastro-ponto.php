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
	<link rel="stylesheet" href="css/main-css.css">
	<!--<link rel="stylesheet" href="js/QRcode/style.css"> -->
	<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
	
	<link rel="stylesheet" href="/css/FontAwesome/css/font-awesome.min.css">
	
    <script src="/js/AngularJs/angular.min.js"></script>
	<script src="/js/Jquery/jquery-3.2.1.min.js"></script>
	<script src="/js/Bootstrap/popper.js"></script>
	<script src="/js/Bootstrap/bootstrap.min.js"></script>
	
	<script src="/js/AngularJs/angularApp.js"></script>
	<script src="/js/Controller/cadastroPontoController.js"></script>
	
	<base href="/cadastro-ponto.php"/>
	
	<script src="/js/menu.js"></script>
	
	<script type="text/javascript" src="js/QRcode/adapter.min.js"></script>
    <script type="text/javascript" src="js/QRcode/vue.min.js"></script>
    <script type="text/javascript" src="js/QRcode/instascan.min.js"></script>
	

	
</head>

<body ng-app="myApp" ng-controller="cadastroPontoController">

    <div id="loading" ng-show="isLoading">
		<img id="loading-image" src="/img/Facebook.gif" alt="Loading..." />
	</div>

	<header>
	    <button class="sidebarBtn">
            <span></span>
        </button>
		<h1 style="text-align:center;width: 100%;">{{nomeDoRestaurante}}</h1>
    </header>
    
    <div class="sidebar">
        <ul class="list_menu">
            <li>
                <img src="/img/ticket.png" title="Carimbar Cartão" width="25" height="25">
                <a href="#">Carimbar Cartão</a>
            </li>
            <li ng-click="sair()">
                <img src="/img/sing-out.png" title="Sign Out" width="25" height="25">
                <a>Sair</a>
            </li>
        </ul>
    </div>
    
    
    <div class="tab col-md-12">
      <button class="tablinks" ng-click="AbrirCadastroPonto()">Cadastrar Ponto</button>
      <button class="tablinks" ng-click="AbrirResgateBonus()">Resgatar Ponto</button>
    </div>

    

    <div class="col-md-12 cameraParaQrCode hidden" id="app">
        
        <div class="preview-container">
            <video id="preview"></video>
        </div>
        <script type="text/javascript" src="js/QRcode/app.js"></script>
    </div>

    <div class="main-content col-md-12 formularioDeCadastroDePontos tabContent" ng-show="abaCadastroPonto">

        <form class="form-basic" method="post">
            
            <div style="margin-bottom:10px;">
                <h5>{{MensagemRetorno}}</h5>
            </div>
            
            <div class="form-title-row" style="margin-bottom:20px;">
                <h1>Cadastro de Pontuacao</h1>
            </div>
            
            <div class="col-md-12 row" style="margin-bottom:20px; text-align:center;">
                
                <div class="col-md-3 col-1"></div>
                <div class="col-md-6 col-10">
                    <button class="col-md-12 button-qrcode-reader" ng-click="AbrirCamera()">Ler QR Code </button>
                </div>
                <div class="col-md-3 col-1"></div>
                
            </div>
            
            <div class="form-row">
                <label>
                    <span> CPF / CODE </span>
                    <input type="text" id="cpf_code" ng-model="pontos.code">
                </label>
            </div>

            <div class="form-row">
                <label style="text-align: center;">
                    <span>Numero de pontos</span>
                    <button class="minus-plus-btn" style="background-color: #848181;" ng-click="menos()">-</button>
                        <h5 style="margin:0px 15px;">{{pontos.numero}}</h5>
                    <button class="minus-plus-btn" style="background-color: #848181;" ng-click="mais()" >+</button>
                </label>
            </div>

            <div class="col-md-12 col-12 row" style="margin-bottom:40px;">
                
                <div class="col-md-3 col-1"></div>
                <div class="col-md-6 col-10">
                    <button class="col-md-12" ng-click="cadastrarPontuacao(pontos)">Cadastro de Pontuação</button>
                </div>
                <div class="col-md-3 col-1"></div>
            </div>

        </form>
    </div>
    
    <div id="telaResgateBonus" ng-show="abaResgateBonus" class="tabContent formularioDeCadastroDePontos">
        <form class="form-basic" method="post">
            
            
            <div class="form-title-row" style="margin-bottom:20px;">
                <h1>Resgate Prêmios</h1>
            </div>
            
            <div style="margin-bottom:10px;">
                <h5>{{MensagemBonus.Mensagem}}</h5>
            </div>
            
            
            <div class="col-md-12 row" style="margin-bottom:20px; text-align:center;">
                
                <div class="col-md-3 col-1"></div>
                <div class="col-md-6 col-10">
                    <button class="col-md-12 button-qrcode-reader" ng-click="AbrirCamera()">Ler QR Code </button>
                </div>
                <div class="col-md-3 col-1"></div>
                
            </div>
            
            <div class="form-row">
                <label>
                    <span> Código do Cupom: </span>
                    <input type="text" id="cupom_code" ng-model="codigo_cupom">
                </label>
            </div>
            
            <div class="col-md-12 col-12 row" style="margin-bottom:40px;">
                
                <div class="col-md-3 col-1"></div>
                <div class="col-md-6 col-10">
                    <button class="col-md-12" ng-click="cadastrarCupom(codigo_cupom)">Resgatar bônus</button>
                </div>
                <div class="col-md-3 col-1"></div>
            </div>
        </form>
    </div>

</body>

</html>
