'use strict';
angular.module('myApp').controller('career_faqs', ['$scope', '$http',
  function ($scope, $http){
    $scope.datacalling = function(vara) {
      console.log(vara);
      $http.get('json/career_faqs/career_faqs_'+vara+'.json').success(function(data){
          console.log(data);
          $scope.questions = data;
      });
    } 
  }]);