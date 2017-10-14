app.controller('loginController', function($scope, $window, $http) { /*global app*/

    $scope.login = {};
    $scope.login.name= "45167533830";
    $scope.login.password= "Doe";
    
    
    
    $scope.SelectEmpresa = function() {
        
        $("#Selecionar-empresa").removeClass("button-not-selected");
        $("#Selecionar-cliente").addClass("button-not-selected");
        $(".button-login-empresa").removeClass("hidden");
        $(".button-login-client").addClass("hidden");
        
        
    };
    
    $scope.SelectCliente = function(){
        $("#Selecionar-cliente").removeClass("button-not-selected");
        $("#Selecionar-empresa").addClass("button-not-selected");
        $(".button-login-empresa").addClass("hidden");
        $(".button-login-client").removeClass("hidden");
    };
    
    
    $scope.LoginAppEmpresa = function(login){
        console.log(login);
         $http({
          type: 'GET',
          url: 'phps/login_shop.php',
          params : {login:login.name},
          dataType:'json'
        }).then(function (response) {
            console.log(response);
            $window.location.href = "/cadastro-ponto.php?idRestaurante="+response.data.records.id+"&nomeRestaurante="+response.data.records.name;
        });
    };
    
    $scope.LoginAppClient = function(login){
        console.log(login);
        $http({
          type: 'GET',
          url: 'phps/login.php',
          params : {login:login.name},
          dataType:'json'
        }).then(function (response) {
            console.log();
            $window.location.href = '/main_client.php?idUsuario='+response.data;
        });
    };
    
    
});