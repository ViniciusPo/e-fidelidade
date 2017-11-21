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
        
        
        
        // Grafico pizza -----------------------------------------
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChartPie);

        function drawChartPie() {
            var data = google.visualization.arrayToDataTable([
              ['Sexo', 'Porcentual'],
              ['Homens', 60],
              ['Mulheres', 40]
            ]);
    
            var options = {
              title: ''
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
       //------------------------------------------------------------
       
       //Grafico colunas
       
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawColumnChart);
        function drawColumnChart() {
          var data = google.visualization.arrayToDataTable([
            ["Faixa de idade", "Idade", { role: "style" } ],
            ["0 - 12", 2, "#ffff00"],
            ["12 - 18", 10, "#40ff00"],
            ["19 - 24", 19, "#00ffff"],
            ["25 - 30", 22, "color:#0080ff"],
            ["31 - 40", 25, "#8000ff"],
            ["41 - 55", 21, "#ff00ff"],
            ["56 - 70", 13, "#ff0080"],
            ["71 +", 7, "#ff0000"],
            
          ]);
    
          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);
    
          var options = {
            title: "",
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
          };
          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
          chart.draw(view, options);
      }
      //------------------------------------------------------------------  
        
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