app.controller('userController', function($scope, $window, $http, $location) { /*global app*/


$scope.isLoading = true;

$scope.idUsuario = $location.search().idUsuario;

$scope.GeoLocationIsTAlowed = true;

$scope.getAllShopInformation = function(){
    
    navigator.permissions.query({name: 'geolocation'}).then(function(status) {
     
      if(status.state == 'denied'){
          $scope.GeoLocationIsTAlowed = false;
      }
      
    });
    
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(showPosition,showPosition);
    
    
    function showPosition(position) {
         
        if($scope.GeoLocationIsTAlowed){
            
            if(position.POSITION_UNAVAILABLE || position.TIMEOUT || position.UNKNOWN_ERROR){
                $scope.latitude = 0;
                $scope.longitude = 0;  
            }else{
               $scope.latitude = position.coords.latitude;
               $scope.longitude = position.coords.longitude;  
            }
            
        }else{
            $scope.latitude = 0;
            $scope.longitude = 0;
        }
        
        
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
           
            $scope.isLoading = false;
            
        });
        
    }

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
    
    $scope.isLoading = true;
    if ($scope.gerarCupomClick){
        $scope.gerarCupomClick = false;
        
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

$scope.sair = function(){
    $window.location.href = "/index.php"
}


$scope.getAllShopInformation();
    
});