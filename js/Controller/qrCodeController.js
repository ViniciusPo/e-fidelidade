app.controller('qrCodeController', function($scope, $window, $location, $http) { /*global app*/
    
    //Buscar na url o id
    $scope.idUsuario = $location.search().idUsuario;
 
 
    $http({
      type: 'GET',
      url: 'phps/getClientCode.php',
      params : {idUsuario:$scope.idUsuario},
      dataType:'json'
    }).then(function (response) {
        console.log(response);
        $scope.codigo = response.data;
    });

});