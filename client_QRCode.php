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
	<script src="/js/Controller/qrCodeController.js"></script>
	
	<base href="/client_QRCode.php"/>
	
	<!-- https://github.com/jeromeetienne/jquery-qrcode -->
    <script type="text/javascript" src="/js/QRCodeGenerator/jquery.qrcode.js"></script>
    <script type="text/javascript" src="/js/QRCodeGenerator/qrcode.js"></script>
    
    <script type="text/javascript" src="/js/QRCodeGenerator/client_QRCode.js"></script>
	
	<script src="/js/menu.js"></script>
	
	<script src="/js/ServiceWorkers/serviceWorker.js"></script>
	
	<link rel="manifest" href="/manifest.json">
	
	
	

</head>
<body ng-app="myApp" ng-controller="qrCodeController">
    <header>
		<button class="sidebarBtn">
            <span></span>
        </button>
		<h1 style="text-align:center;width: 100%;">QR Code</h1>
    </header>
    
    <div class="sidebar">
        <ul class="list_menu">
        	<li ng-click="goToHome()">
                <img src="/img/icon_home.png" title="Home" width="25" height="25">
                <a href="#">Home</a>
            </li>
            <li>
                <img src="/img/qr_code_icon.png" title="QR Code" width="25" height="25">
                <a href="client_QRCode.php">QR Code</a>
            </li>
            <li ng-click="goToCupons()">
                <img src="/img/loyalty-card.png" title="Cupons" width="25" height="25">
                <a>Seus Cupons</a>
            </li>
            <li ng-click="sair()">
                <img src="/img/sing-out.png" title="Sign Out" width="25" height="25">
                <a href="index.php">Sair</a>
            </li>
        </ul>
    </div>
    
    <div class="main-content col-md-12">
        <center>
            <div id="qrcode" style="margin: 30px;"></div>
            
            
            <h2 id="codigo" style="margin-bottom:10px;"></h2> 
        </center>
    </div>
</body>