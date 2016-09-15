 'use strict';
 angular.module('myApp').controller('sss', ['$scope', '$http',
    function ($scope, $http){

      $http.get('json/sss_data.json').success(function(data){
        $scope.sss_data = data;
      });

           
     
    }]);
