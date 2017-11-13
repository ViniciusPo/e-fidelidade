app.controller('cadastroClientController', function($scope, $window, $http, $location) { /*global app*/

    $scope.cadastro = {};
    $scope.cadastro.cpf= "";
    $scope.cadastro.password= "";
    $scope.cadastro.nome= "";
    $scope.isLoading = false;
    
    
    $scope.CadastroClient = function(cadastro) {
        
         $http({
            method: 'POST',
            url: 'phps/cadastrar-cliente.php',
            data : {
                'cpf':cadastro.cpf,
                'password':cadastro.password,
                'nome':cadastro.nome
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            dataType:'json'
            }).then(function (response) {
                console.log(response)
                $scope.mensagem = response.data;
        });
        
    };
    
    $scope.Home = function(){
       $window.location.href = '/';
    };
    
    
    $scope.LoginAppEmpresa = function(login){
        $scope.isLoading = true;
         $http({
          type: 'GET',
          url: 'phps/login_shop.php',
          params : {login:login.name},
          dataType:'json'
        }).then(function (response) {
            $window.location.href = "/cadastro-ponto.php?idRestaurante="+response.data.records.id+"&nomeRestaurante="+response.data.records.name;
        });
    };
    
    $scope.LoginAppClient = function(login){
        $scope.isLoading = true;
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