 'use strict';
 angular.module('myApp').controller('qng_home', ['$scope', '$http',
    function ($scope, $http){
      $scope.oneAtATime = false ;
  
      $scope.sidenav = 
        [
          {
            "header":"career",
            "under":[
              {
                "heading":"about",
                "under_under":["vision","faqs"]              
              },
              {
                "heading":"events",
                "under_under":["careertalks","coreweekend"]
              },
              {
                "heading":"resources",
                "under_under":["apping","entrepreneurship","scholarships","core","non-core","finance","interview"]
              },
              {
                "heading":"genre",
                "under_under":["careerselection","jobs","entrepreneurship"]
              }
            ]
          }
        ];
             
           
        console.log($scope.sidenav[0].under[2].under_under[0]);
     
    }]);
