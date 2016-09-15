'use strict';
  angular.module('myApp').controller('Home', ['$scope', '$http',function ($scope, $http){
    $http.get('upload/image_info.json').success(function(data){
          $scope.images = data;
          console.log($scope.images)
    });
    $scope.leftsidemenu = null;
    $scope.rightsidemenu = null;
    $scope.search = null;
    $scope.showSideMenu = function(){
      if($scope.leftsidemenu == 1){
        $scope.leftsidemenu = 0;
      }
      else{
        $scope.leftsidemenu = 1;
      }
    }
    $scope.showSideMenuRight = function(){
      if($scope.rightsidemenu == 1){
        $scope.rightsidemenu = 0;
      }
      else{
        $scope.rightsidemenu = 1;
      }
    }
    $scope.showSideMenuRight = function(){
      if($scope.rightsidemenu == 1){
        $scope.rightsidemenu = 0;
      }
      else{
        $scope.rightsidemenu = 1;
      }
    }
    $scope.showSearch = function(){
      if($scope.search == 1){
        $scope.search = 0;
      }
      else{
        $scope.search = 1;
      }
    }
    // $scope.categories = ["career","sss","enpower"];
    // $scope.career = 
    //   [
    //     {
    //       "header":"career",
    //       "under":[
    //         {
    //           "heading":"about",
    //           "under_under":["Vision","FAQs"]              
    //         },
    //         // {
    //         //   "heading":"events",
    //         //   "under_under":["careertalks","coreweekend"]
    //         // },
    //         {
    //           "heading":"resources",
    //           "under_under":["Apping","Entrepreneurship","Scholarships","Core","Interview"]
    //         },
    //         {
    //           "heading":"genre",
    //           "under_under":["Career Selection","Jobs"]
    //         }
    //       ]
    //     }
    //   ];
      $scope.sss = 
        [
          {
            "header":"sss",
            "under":[
              {
                "heading":"tsc",
                "under_under":["home"]              
              }
              // {
              //   "heading":"Book Bay",
              //   "under_under":["comin soon"]
              // },
              // {
              //   "heading":"Course Rank",
              //   "under_under":["comin soon"]
              // },
              // {
              //   "heading":"ISMP",
              //   "under_under":["comin soon"]
              // }
            ]
          }
        ];
        $scope.enpower = 
        [
          {
            "header":"enpower",
            "under":[
              {
                "heading":"idp",
                "under_under":["Home","Projects","Apply"]              
              }
              // {
              //   "heading":"ilp",
              //   "under_under":["home","Company","schedule","Student","Committee"]
              // }
              // {
              //   "heading":"ispa",
              //   "under_under":["home","apply","results","rulebook"]
              // },
              // {
              //   "heading":"research",
              //   "under_under":["home"]
              // }
            ]
          }
        ];

        $scope.otherlinks = 
        [
          {
            "name":"Query n Grievance Portal",
            "url":"http://gymkhana.iitb.ac.in/~ugacademics/query/"
          },
          {
            "name":"Homepage Generator",
            "url":"http://gymkhana.iitb.ac.in/~ugacademics/homepage/index.php"
          },
	  {
	    "name":"Academics Wiki",
	    "url":"http://gymkhana.iitb.ac.in/~ugacademics/wiki"
	  },
	  {
	    "name":"International Relations",
	    "url":"http://www.ir.iitb.ac.in"
	  },
          {
            "name":"Research Book",
            "url":"http://gymkhana.iitb.ac.in/~researchbook/"
          },
          {
            "name":"IRCC",
            "url":"http://www.ircc.iitb.ac.in/IRCC-Webpage/rnd/"
          },
          {
            "name":"Library",
            "url":"http://www.library.iitb.ac.in/"
          },
          {
            "name":"ASC",
            "url":"http://asc.iitb.ac.in/acadmenu/index.jsp"
          },
          {
            "name":"Placements",
            "url":"http://placements.iitb.ac.in/"
          },
          {
            "name":"Interships",
            "url":"http://placements.iitb.ac.in/training/index.html"
          },
          {
            "name":"Scholarships",
            "url":"http://www.iitb.ac.in/newacadhome/scholar.jsp"
          },
          {
            "name":"Tum-tum routes",
            "url":"http://gymkhana.iitb.ac.in/~academics/pgacademics//docs/tumtum_routes.pdf"
          },
          {
            "name":"Computer center",
            "url":"http://www.cc.iitb.ac.in/"
          },
          {
            "name":"Ldap Change",
            "url":"http://camp.iitb.ac.in/"
          },
          {
            "name":"GPO",
            "url":"https://gpo.iitb.ac.in"
          },
          {
            "name":"Abhyasika",
            "url":"http://abhyasika.wix.com/abhyasika"
          }    
        ];
  }]);

