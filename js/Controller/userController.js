app.controller('userController', function($scope, $window, $http, $location) { /*global app*/

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
            console.log(response);
        });
    }
    
    
    
};



$scope.getAllShopInformation();
    
});