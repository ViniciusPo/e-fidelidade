app.controller('qrCodeController', function($scope, $window, $location, $http) { /*global app*/
    
//Buscar na url o id
$scope.idUsuario = $location.search().idUsuario;

$scope.goToHome = function(){
    $window.location.href = "/main_client.php?idUsuario=" + $scope.idUsuario;
}

$scope.goToQrCode = function(){
$window.location.href = "/client_QRCode.php?idUsuario="+$scope.idUsuario;
}

$scope.goToCupons = function(){
    $window.location.href = "/cupons.html?idUsuario=" + $scope.idUsuario;
}


$scope.sair = function(){
    $window.location.href = "/index.php"
}

});