app.controller('cuponsController', function($scope, $window, $http, $location) { /*global app*/


$scope.idUsuario = $location.search().idUsuario;
    
$scope.getCuponsInformation= function(){
        
    $http({
          type: 'GET',
          url: 'phps/info_cupons.php',
          params : {idUsuario: $scope.idUsuario},
      dataType:'json'
    }).then(function (response) {
        $scope.cuponsUsuario = response.data.records;
        console.log($scope.cuponsUsuario);
        console.log("Tamanho:" + $scope.cuponsUsuario.length);
        
        $scope.isLoading = false;
    },function myError(response) {
        console.log("krl:"  + response.statusText);
    });
    
};

$scope.getCuponsInformation();


$scope.popupQRCode= function(code){
    
    swal({
      html: '<div class="main-content col-md-12"> <center> <div id="qrcode" style="margin: 30px;"></div> <h2 id="codigo" style="margin-bottom:10px;"></h2> </center></div>'
    });
    
    $('#codigo').text(code);
    
    jQuery('#qrcode').qrcode({
        text	: codigo ,
        width   : "200",
        height  : "200"
    })
}

$scope.goToHome = function(){
    $window.location.href = "/main_client.php?idUsuario=" + $scope.idUsuario;
}
$scope.goToCupons = function(){
    $window.location.href = "/cupons.html?idUsuario=" + $scope.idUsuario;
}


});