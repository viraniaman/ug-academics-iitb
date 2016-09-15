'use strict';


angular.module('myApp', [
  'ui.router',
  'ui.bootstrap',
  'ngAnimate'
])
  .config(['$stateProvider' , '$urlRouterProvider' ,function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/ugacads");
    // $urlRouterProvider.when('/ugacads/career/about','/ugacads/career/about/vision');
    // $urlRouterProvider.when('/ugacads/career/genre','/ugacads/career/genre/choose');
    $stateProvider
        .state('home',{
          url : '/ugacads',
          templateUrl : 'views/home.php',
          controller : 'Home'
        })
        .state('career',{
          url : '/career',
          parent : 'home',
          templateUrl : 'views/career/career.php',
          controller : 'career'
        })
        .state('career_about',{
          url : '/about',
          parent : 'career',
          templateUrl : 'views/career/career_about.php'
          // controller : 'career'
        })        
        .state('career_about_vision',{
          url : '/vision',
          parent : 'career_about',
          templateUrl : 'views/career/career_about_vision.php'
          // controller : 'Home'
        })
        .state('career_about_faqs',{
          url : '/faqs',
          parent : 'career_about',
          templateUrl : 'views/career/career_about_faqs.php',
          controller : 'career_faqs',
        })
        .state('career_events',{
          url : '/events',
          parent : 'career',
          templateUrl : 'views/career/career_events.php'
          // controller : 'career'
        })
        .state('career_events_careertalks',{
          url : '/careertalks',
          parent : 'career_events',
          templateUrl : 'views/career/career_events_careertalks.php'
          // controller : 'career_faqs',
        })
        .state('career_events_coreweekend',{
          url : '/coreweekend',
          parent : 'career_events',
          templateUrl : 'views/career/career_events_coreweekend.php'
          // controller : 'career_faqs',
        })
        .state('career_resources',{
          url : '/resources',
          parent : 'career',
          templateUrl : 'views/career/career_resources.php',
          controller : 'career'
        })
        .state('career_resources_core',{
          url : '/core',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_core.php'
          // controller : 'career_resources_core'
        })
        .state('career_resources_non-core',{
          url : '/non-core',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_noncore.php'
          // controller : 'career_resources'
        })
        .state('career_resources_entrepreneurship',{
          url : '/entrepreneurship',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_entre.php',
          controller : 'career_resources_entrepreneurship'
        })
        .state('career_resources_apping',{
          url : '/apping',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_apping.php'
          // controller : 'career_resources_apping'
        })
        .state('career_resources_finance',{
          url : '/finance',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_finance.php'
          // controller : 'career_resources'
        })
        .state('career_resources_scholarships',{
          url : '/scholarships',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_scholar.php'
          // controller : 'career_resources'
        })
        .state('career_resources_interview',{
          url : '/interview',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_pni.php'
          // controller : 'career_resources'
        })
        .state('career_genre',{
          url : '/genre',
          parent : 'career',
          templateUrl : 'views/career/career_genre.php'
          // controller : 'career'
        })
        .state('career_genre_careerselection',{
          url : '/careerselection',
          parent : 'career_genre',
          templateUrl : 'views/career/career_genre_choose.php'
          // controller : 'career_genre_choose'
        })
        .state('career_genre_jobs',{
          url : '/jobs',
          parent : 'career_genre',
          templateUrl : 'views/career/career_genre_jobs.php',
          controller : 'career_genre_jobs'
        })
        .state('career_genre_entrepreneurship',{
          url : '/entrepreneurship',
          parent : 'career_genre',
          templateUrl : 'views/career/career_genre_entre.php',
          controller : 'career_genre_entre'
        })
        .state('sss',{
          url : '/sss',
          parent : 'home',  
          templateUrl : 'views/sss/sss.php',
          controller : 'sss'
        })
        .state('sss_tsc_home',{
          url : '/home',
          parent : 'sss',
          templateUrl : 'views/sss/sss_tsc.php',
          // controller : 'sss_tsc'
        })
        .state('sss_tsc_calender',{
          url : '/calender',
          parent : 'sss',
          templateUrl : 'views/sss/calender.php'
          // controller : 'sss_tsc_calender'
        })
        .state('sss_qng',{
          url : '/qng',
          parent : 'sss',
          templateUrl : 'views/sss/sss_qng.php',
          // controller : 'Home'
        })
        .state('sss_team',{
          url : '/team',
          parent : 'sss',
          templateUrl : 'views/sss/sss_team.php',
          // controller : 'Home'
        })
        .state('enpower',{
          url : '/enpower',
          parent : 'home',
          templateUrl : 'views/enpower/enpower.php',
          controller : 'enpower'
        })
        .state('enpower_team',{
          url : '/team',
          parent : 'enpower',
          templateUrl : 'views/enpower/enpower_team.php',
          // controller : 'Home'
        })
        .state('enpower_idp_home',{
          url : '/idp',
          parent : 'enpower',
          templateUrl : 'views/enpower/enpower_idp_home.php',
          // controller : 'Home'
        })
        .state('enpower_idp_apply',{
          url : '/apply',
          parent : 'enpower_idp_home',
          templateUrl : 'views/enpower/enpower_idp_apply.php',
          // controller : 'Home'
        })
        .state('enpower_idp_projects',{
          url : '/projects',
          parent : 'enpower_idp_home',
          templateUrl : 'views/enpower/enpower_idp_projects.php',
          // controller : 'Home'
        })
        .state('enpower_ispa',{
          url : '/ispa',
          parent : 'enpower',
          templateUrl : 'views/enpower/enpower_ispa.php',
          // controller : 'Home'
        })
        .state('enpower_ilp',{
          url : '/ilp',
          parent : 'enpower',
          templateUrl : 'views/enpower/enpower_ilp.php',
          // controller : 'Home'
        })

        .state('qng_home',{
          url : '/qng',
          parent : 'home',
          templateUrl : 'views/qng/home.php',
          controller : 'qng_home'
        })


  }]);









'use strict';
angular.module('myApp').controller('career', ['$scope', '$http',
  function ($scope, $http){
    $scope.oneAtATime = false ;  
            
  }]);






'use strict';
angular.module('myApp').controller('career_about', ['$scope', '$http',
    function ($scope, $http){
           
    }]);





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





'use strict';
angular.module('myApp').controller('career_genre_jobs', ['$scope', '$http', '$modal', '$log', function ($scope, $http, $modal, $log){
  $scope.dataa = 
  [
    { 
      "id":"1",
      "heading":"Field Engineer",
      "sub_header":"Petroleum",
      "profile":"Field Engineer",
      "growth_option":"This Work Profile does not demand a strong Technical Background. Speak to seniors and try find out if you are suited for this profile . The Career Growth is slightly slow but good. Be prepared to spend your first 5 yrs working on the field where you are one amongst the many people working.",
      "comments":"I suggest you confirm the exact salary ( take-home ) when the company comes for placement to avoid confusion and preferably get the salary structure in written. Generally in this sector the attrition rate is very high. About 10% make it to managers and above,and the rest choose alternative career options. Please talk to alumni working in this company to get an exact idea of the work culture and the company's ideology and vision to get an idea whether this place is for you. Alternative career options in the same filed would be to join a Client Company like Shell, BP, Exxon, Cairn, Reliance etc as against Service Co's like Schlumberger, Ahlliburton, Baker etc.",
      "qualification":" B tech (chemical engineering)"
    },
    {
      "id":"2",
      "heading":"Risk Manager in Global Prime Finance section",
      "sub_header":"Investment banking",
      "profile":"Work as a risk manager in Global prime finance section of deutsche Bank, analyazed and managed risk of all the asian hedge funds accross the region.",
      "growth_option":"If got good team and supportive boss then there is lots of growth option. You can move ahead in your respective job profile , also you can change your profile and work in that section. Options are numerous but depends on what you like to do.",
      "comments":"Go and do something of your own and create difference. 1. You have education 2. You have the brand 3. You have brains 4. You can raise money What is stopping you from crating something ?",
      "qualification":"B tech and Mtech from IIT Bombay"
    }
  ];  
  for (var i = 0+1; i < $scope.dataa.length+1; i++) {
    $scope.i = false;
    console.log($scope.i);
  };
  console.log($scope.dataa[0].heading);
  $scope.info = function(idd){
    console.log(idd);
    $scope.idd = idd;    
  };
  $scope.ok = function(idd){
    console.log(idd);
    $scope.idd = 0;    
  };
  $scope.getUserId = function() {
    // console.log($scope.idd);
    return $scope.idd;             
  } 
   
     
}]);






'use strict';
angular.module('myApp').controller('career_resources_entrepreneurship', ['$scope', '$http',
  function ($scope, $http){
   $scope.appingdata = [
      {'heading': 'Introduction',
       'snippet': 'To become a successful entrepreneur you need good ideas, a little luck, money and lots of hard work. Ninety per cent of successful people fail. Which means to gain something (profits, equity etc) you must first lose something (your initial investment). Phat-farm is a multimillionaire company whose owner Russell Simmons lost 10 million dollars in the first five years.\nAlthough a lot of experience and resources are not required, to become a successful entrepreneur you need to have '},
      {'heading': 'Stradegy',
       'snippet': 'The Next, Next Generation tablet.'},
      {'heading': 'Small Business',
       'snippet': 'The Next, Next Generation tablet.'},
      {'heading': 'Successful Venture',
       'snippet': "dddd"},
      {'heading': 'Startup Mistakes',
       'snippet': "dddd"},
      {'heading': 'Myths',
       'snippet': "dddd"},
      {'heading': 'Ethics',
       'snippet': "dddd"},
      {'heading': 'Communication',
       'snippet': "dddd"},
      {'heading': 'Time Management',
       'snippet': "dddd"},
      {'heading': 'Leadership Attributes',
       'snippet': "dddd"},   
      {'heading': 'Estimate YOur Startup Cost',
       'snippet': "dddd"},
      {'heading': 'Getting Funding',
       'snippet': "dddd"},
      {'heading': 'Brand Your Business',
       'snippet': "dddd"},
    ];
    // $scope.appingdata.heading = 'Introduction';
  }]);





 'use strict';
 angular.module('myApp').controller('enpower', ['$scope', '$http',
    function ($scope, $http){
      $scope.oneAtATime = false ;

           
     
    }]);






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
    $scope.categories = ["career","sss","enpower"];
    $scope.career = 
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
      $scope.sss = 
        [
          {
            "header":"sss",
            "under":[
              {
                "heading":"tsc",
                "under_under":["home","calender"]              
              },
              {
                "heading":"Book Bay",
                "under_under":["comin soon"]
              },
              {
                "heading":"Course Rank",
                "under_under":["comin soon"]
              },
              {
                "heading":"ISMP",
                "under_under":["comin soon"]
              }
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
                "under_under":["home","projects","apply"]              
              },
              {
                "heading":"ilp",
                "under_under":["home","Company","schedule","Student","Committee"]
              },
              {
                "heading":"ispa",
                "under_under":["home","apply","results","rulebook"]
              },
              {
                "heading":"research",
                "under_under":["home"]
              }
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






 'use strict';
 angular.module('myApp').controller('sss', ['$scope', '$http',
    function ($scope, $http){
      $scope.oneAtATime = false ;
  
      $scope.sidenav = 
        [
          {
            "header":"sss",
            "under":[
              {
                "heading":"tsc",
                "under_under":["home","calender"]              
              },
              {
                "heading":"Book Bay",
                "under_under":["comin soon"]
              },
              {
                "heading":"Course Rank",
                "under_under":["comin soon"]
              }
            ]
          }
        ];
             
           
     
    }]);
