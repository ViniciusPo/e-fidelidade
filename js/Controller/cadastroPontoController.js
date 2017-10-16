app.controller('cadastroPontoController', function($scope, $window, $http, $location) { /*global app*/

$scope.pontos = {};

$scope.isLoading = true;

$scope.pontos.numero = 1;

$scope.nomeDoRestaurante = $location.search().nomeRestaurante;

$scope.mais = function(){
    $scope.pontos.numero = $scope.pontos.numero + 1;
}

$scope.menos = function(){
    if($scope.pontos.numero <= 1){
        $scope.pontos.numero = 1;
    }else{
        $scope.pontos.numero = $scope.pontos.numero - 1;    
    }
}

$scope.cadastrarPontuacao = function(pontos){
    
    $scope.isLoading = true;
    
    if(pontos.code == undefined){
        pontos.code = $("#cpf_code").val();
    }
    
    pontos.idRestaurante = $location.search().idRestaurante;
    
     $http({
          method: 'POST',
          url: 'phps/cadastrar_ponto.php',
          data : {  'idShop':pontos.idRestaurante,
                    'code':pontos.code,
                    'numPontos':pontos.numero
          },
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            $scope.MensagemRetorno = response.data;
            $scope.isLoading = false;
        });
    
};

$scope.AbrirCamera = function(){
    
    $(".cameraParaQrCode").removeClass("hidden");
    $(".formularioDeCadastroDePontos").addClass("hidden");
    
}

$scope.QrCodeReaded = function(){
    
    $(".cameraParaQrCode").addClass("hidden");
    $(".formularioDeCadastroDePontos").removeClass("hidden");
    
    $scope.pontos.code = $scope.qrCodeScan;
    
}

$scope.isLoading = false;

});