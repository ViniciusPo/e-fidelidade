app.controller('userController', function($scope, $window, $http, $location) { /*global app*/


$scope.isLoading = true;

$scope.idUsuario = $location.search().idUsuario;

console.log($scope.idUsuario);

$scope.getAllShopInformation = function(){
    
    
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(showPosition);
    
    
    function showPosition(position) {
        $scope.latitude = position.coords.latitude;
        $scope.longitude = position.coords.longitude;
        
        $http({
          type: 'GET',
          url: 'phps/info_cartoes_usuario.php',
          params : {idUsuario:$scope.idUsuario,
                    userLongitude:$scope.longitude,
                    userLatitude:$scope.latitude
          },
          dataType:'json'
        }).then(function (response) {
            $scope.cartoesFidelidade = response.data.records[0];
            $scope.restaurantesProximos = response.data.records[1];
            console.log($scope.cartoesFidelidade);
            
            $scope.isLoading = false;
        });
    }
    
    //$scope.isLoading = false;
    
};

$scope.paginaRestaurante = function(idDoRestaurante){
    $window.location.href = "/tela_restaurante.html?idRestaurante="+idDoRestaurante+"&idUsuario="+$scope.idUsuario;
}

$scope.goToQrCode = function(){
    $window.location.href = "/client_QRCode.php?idUsuario="+$scope.idUsuario;
}

$scope.goToCupons = function(){
    $window.location.href = "/cupons.html?idUsuario=" + $scope.idUsuario;
}

$scope.gerarCupomClick = true;

$scope.gerarCupom = function(idDoRestaurante,numeroPontosRestaurante){
    
    if ($scope.gerarCupomClick){
        $scope.gerarCupomClick = false;
        console.log(idDoRestaurante + "\n" + $scope.idUsuario + "\n" + numeroPontosRestaurante);
        
        $http({
              method: 'POST',
              url: 'phps/gerarCupom.php',
              data : {  'idShop': idDoRestaurante,
                        'idUsuario': $scope.idUsuario,
                        'numPontosRestaurante':numeroPontosRestaurante
              },
              headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                $scope.MensagemRetorno = response.data;
                $scope.isLoading = false;
                
                //alert
                swal({
                  position: 'center',
                  type: 'success',
                  title: $scope.MensagemRetorno,
                  showConfirmButton: false,
                  timer: 1500
                })
                setTimeout(function(){ $window.location.href = "/cupons.html?idUsuario="+$scope.idUsuario; }, 1500);
            });
            
    }
}

$scope.getAllShopInformation();
    
});