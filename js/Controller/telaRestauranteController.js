app.controller('telaRestauranteController', function($scope, $window, $http, $location) { /*global app*/

$scope.isLoading = true;

$scope.idUsuario = $location.search().idUsuario;
$scope.idRestaurante = $location.search().idRestaurante;

$scope.getShopInformation = function(){
    
    $http({
      type: 'GET',
      url: 'phps/info_restaurante.php',
      params : {idUsuario:$scope.idUsuario,
                idRestaurante:$scope.idRestaurante
      },
      dataType:'json'
    }).then(function (response) {
        
        console.log(response);
        
        $scope.nomeRestaurante = response.data.records[0].nomeRestaurante;
        $scope.imageRestaurante = response.data.records[0].imageRestaurante.replace(/(\r\n|\n|\r)/gm,"");
        $scope.enderecoRestaurante = response.data.records[0].enderecoRestaurante;
        $scope.latitudeRestaurante = response.data.records[0].latitudeRestaurante;
        $scope.longitudeRestaurante = response.data.records[0].longitudeRestaurante;
        $scope.numeroPontosRestaurante = response.data.records[0].numeroPontosRestaurante;
        $scope.pontosUsuario = response.data.records[0].pontosUsuario;
        
        $scope.numberOfCircles = [];
        
        for (var i = 0; i < $scope.numeroPontosRestaurante; i++) { 
            
            if(i < $scope.pontosUsuario){
                $scope.numberOfCircles[i] = {
                    "classe" : "ponto-marcado"
                }
            }else{
                 $scope.numberOfCircles[i] = {
                    "classe" : "ponto-nao-marcado"
                }
            }
            
            
            
        } 
        
        
        $scope.cardBack = {
            "background": "url('"+$scope.imageRestaurante+"') no-repeat center"
        }
        
        $scope.widthBolhasCartao = {
            "width" : ""+(200/$scope.numeroPontosRestaurante)+"%"
        }
        
        
        
        
        myMap();
        $scope.isLoading = false;
    });
};


function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng($scope.latitudeRestaurante, $scope.longitudeRestaurante),
        zoom: 16,
        mapTypeId: 'roadmap'
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var marker = new google.maps.Marker({
      position: {lat: Number($scope.latitudeRestaurante), lng: Number($scope.longitudeRestaurante)},
      map: map
    });
}

$scope.getShopInformation();

$scope.getNumber = function(num) {
    return new Array(num);   
}

});