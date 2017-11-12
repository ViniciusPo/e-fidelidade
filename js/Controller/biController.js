app.controller('biController', function($scope, $window, $http, $location) { /*global app*/


    $scope.isLoading = true;
    
    
    $scope.idRestaurante = $location.search().idRestaurante;
    
    $http({
        type: 'GET',
        url: 'phps/dadosBI.php',
        params : {idRestaurante: $scope.idRestaurante},
        dataType:'json'
    }).then(function (response) {
        $scope.dados = response.data.records;
        var json = $scope.dados;
        var matriz = carregaMatriz(json);
        //console.log(matriz);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable(matriz);
            
            var options = {
              curveType: 'function',
              legend: { position: 'bottom' }
            };
            
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            
            chart.draw(data, options);
        }
        
        
        //console.log($scope.dados);
        
        //console.log(teste[0]['qntUsuario']);
        $scope.isLoading = false;
        
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
    });
    
    
    
    $scope.sair = function(){
        $window.location.href = "/index.php"
    }
    
    $scope.goToBI = function(){
        $window.location.href = "/bi.html?idUsuario="  +  $scope.idRestaurante +"&nomeRestaurante=" + $location.search().nomeRestaurante;;
    }
    
    $scope.goToCarimbar = function(){
        $window.location.href = "/cadastro-ponto.php?idRestaurante="  +  $location.search().idRestaurante + "&nomeRestaurante=" + $location.search().nomeRestaurante;
    }

});


function carregaMatriz(json){
    
    var matriz = new Array();
    matriz[0] = ['Dia da semana', 'Cadastro ponto', 'Retirada Bônus'];
    
    for(var i = 0 ; i < json.length; ++i){
        matriz[i+1] = [json[i]['diaSemana'], parseInt(json[i]['qntUsuario']), parseInt(json[i]['qntPremio'])];
    }
    return matriz;
    
}