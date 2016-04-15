var app = angular.module('myApp', ['ngDialog'])
  .filter('capital', function() {
    return function(input, all) {
      var reg = (all) ? /([^\W_]+[^\s-]*) */g : /([^\W_]+[^\s-]*)/;
      return (!!input) ? input.replace(reg, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
    }
  })
;

app.controller('myCtrl', function($scope, $http, ngDialog) {

    //$scope.cargar = function() {
        $http.post("/listadoagricola")
            .then(function(response) {
                $scope.listado = response.data;
            });
    //}

    $scope.orderByMe = function(x) {
        $scope.myOrderBy = x;
    }

});