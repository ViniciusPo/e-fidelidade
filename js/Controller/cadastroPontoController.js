app.controller('cadastroPontoController', function($scope, $window, $http, $location) { /*global app*/

$scope.pontos = {};


$scope.cadastrarPontuacao = function(pontos){
    
    
    if(pontos.code.length > 0){
        
    }else{
       pontos.code = $("#cpf_code").val(); 
    }
    pontos.idRestaurante = $location.search().idRestaurante;
    console.log(pontos);
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
            //$window.location.href = '/cadastro-ponto.php';
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
    
});