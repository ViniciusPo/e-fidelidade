app.controller('userController', function($scope, $window, $http, $location) { /*global app*/

$scope.idUsuario = $location.search().idUsuario;
console.log($scope.idUsuario);

$scope.getAllShopInformation = function(){
    
    $http({
          type: 'GET',
          url: 'phps/info_cartoes_usuario.php',
          params : {idUsuario:$scope.idUsuario},
          dataType:'json'
        }).then(function (response) {
            $scope.cartoesFidelidade = response.data.records;
            console.log(response);
        });
    
};


$scope.getAllShopInformation();
    
});