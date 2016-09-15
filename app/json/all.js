var myApp = angular.module('myApp', ['ui.router','ui.bootstrap']);
myApp.config(function($stateProvider, $urlRouterProvider) {
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
        templateUrl : 'views/career/career_about.php',
        controller : 'career'
      })
      
      .state('career_about_vision',{
        url : '/vision',
        parent : 'career_about',
        templateUrl : 'views/career/career_about_vision.php',
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
        templateUrl : 'views/career/career_events.php',
        controller : 'career'
      })
      .state('career_events_careertalks',{
        url : '/careertalks',
        parent : 'career_events',
        templateUrl : 'views/career/career_events_careertalks.php',
        // controller : 'career_faqs',
      })
      .state('career_events_coreweekend',{
        url : '/coreweekend',
        parent : 'career_events',
        templateUrl : 'views/career/career_events_coreweekend.php',
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
        templateUrl : 'views/career/career_resources_core.php',
        controller : 'career_resources_core'
      })
      .state('career_resources_non-core',{
        url : '/non-core',
        parent : 'career_resources',
        templateUrl : 'views/career/career_resources_noncore.php',
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
        templateUrl : 'views/career/career_resources_apping.php',
        controller : 'career_resources_apping'
      })
      .state('career_resources_finance',{
        url : '/finance',
        parent : 'career_resources',
        templateUrl : 'views/career/career_resources_finance.php',
        // controller : 'career_resources'
      })
      .state('career_resources_scholarships',{
        url : '/scholarships',
        parent : 'career_resources',
        templateUrl : 'views/career/career_resources_scholar.php',
        // controller : 'career_resources'
      })
      .state('career_resources_interview',{
        url : '/interview',
        parent : 'career_resources',
        templateUrl : 'views/career/career_resources_pni.php',
        // controller : 'career_resources'
      })
      .state('career_genre',{
        url : '/genre',
        parent : 'career',
        templateUrl : 'views/career/career_genre.php',
        controller : 'career'
      })
      .state('career_genre_careerselection',{
        url : '/careerselection',
        parent : 'career_genre',
        templateUrl : 'views/career/career_genre_choose.php',
        // controller : 'Home'
      })
      .state('career_genre_jobs',{
        url : '/jobs',
        parent : 'career_genre',
        templateUrl : 'views/career/career_genre_jobs.php',
        // controller : 'Home'
      })
      .state('career_genre_entrepreneurship',{
        url : '/entrepreneurship',
        parent : 'career_genre',
        templateUrl : 'views/career/career_genre_entre.php',
        // controller : 'Home'
      })
      .state('sss',{
        url : '/sss',
        parent : 'home',  
        templateUrl : 'views/sss/sss.php',
        controller : ''
      })
      .state('sss_tsc',{
        url : '/tsc',
        parent : 'sss',
        templateUrl : 'views/sss/sss_tsc.php',
        // controller : 'sss_tsc'
      })
      .state('sss_tsc_calender',{
        url : '/calender',
        parent : 'sss_tsc',
        templateUrl : 'views/sss/calender.php',
        controller : 'sss_tsc_calender'
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
        // controller : 'Home'
      })
      .state('enpower_team',{
        url : '/team',
        parent : 'enpower',
        templateUrl : 'views/enpower/enpower_team.php',
        // controller : 'Home'
      })
      .state('enpower_idp',{
        url : '/idp',
        parent : 'enpower',
        templateUrl : 'views/enpower/enpower_idp.php',
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
      });
    });







var myApp = angular.module('myApp', ['ui.router','ui.bootstrap']);
  myApp.controller('Home', ['$scope', '$http',
    function ($scope, $http){
        $scope.myInterval = 2000;
        var slides = $scope.slides = [];
        $scope.addSlide = function() {
          var newWidth = 600 + slides.length;
          slides.push({
            image: 'http://placekitten.com/' + newWidth + '/300',
            text: ['More','Extra','Lots of','Surplus'][slides.length % 4] + ' ' +
              ['Cats', 'Kittys', 'Felines', 'Cutes'][slides.length % 4]
          });
        };
        for (var i=0; i<2; i++) {
          $scope.addSlide();
        }  
    }]);
  myApp.controller('career', ['$scope', '$http',
    function ($scope, $http){
        $scope.career =
          [
            "about","events","resources","genre"
          ];
        $scope.about =
          [
            "vision","faqs"
          ]; 
        $scope.events =
          [
            "careertalks","coreweekend"
          ]; 
        $scope.resources =
          [
            "apping","entrepreneurship","scholarships","core","non-core","finance","interview"
          ];
        $scope.genre =
          [
            "careerselection","jobs"
          ];  

    }]);
  myApp.controller('career_about', ['$scope', '$http',
    function ($scope, $http){
      $scope.heading =
        [
          "vision","faqs"
        ];         
    }]);
  myApp.controller('career_about', ['$scope', '$http',
    function ($scope, $http){
      $scope.heading =
        [
          "Vision","Faqs"
        ];         
    }]);

  myApp.controller('career_faqs', ['$scope', '$http',
  function ($scope, $http){
    $scope.datacalling = function(vara) {
      console.log(vara);
      $http.get('json/career_faqs/career_faqs_'+vara+'.json').success(function(data){
          console.log(data);
          $scope.questions = data;
      });
    }; 
  }]);


  myApp.controller('career_resources_apping', ['$scope', '$http',
  function ($scope, $http){
    
  }]);
  myApp.controller('career_resources_entrepreneurship', ['$scope', '$http',
  function ($scope, $http){
   $scope.appingdata = [
      {'heading': 'Introduction',
       'snippet': 'To become a successful entrepreneur you need good ideas, a little luck, money and lots of hard work. Ninety per cent of successful people fail. Which means to gain something (profits, equity etc) you must first lose something (your initial investment). Phat-farm is a multimillionaire company whose owner Russell Simmons lost 10 million dollars in the first five years.Although a lot of experience and resources are not required, to become a successful entrepreneur you need to have '},
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
  myApp.controller('career_resources_scholarships', ['$scope', '$http',
  function ($scope, $http){
    
  }]);
  myApp.controller('career_resources_core', ['$scope', '$http',
  function ($scope, $http){
    
  }]);
  myApp.controller('career_resources_noncore', ['$scope', '$http',
  function ($scope, $http){
    
  }]);
  myApp.controller('career_resources_finance', ['$scope', '$http',
  function ($scope, $http){
    
  }]);
  myApp.controller('career_resources_pni', ['$scope', '$http',
  function ($scope, $http){
    
  }]);



  myApp.controller('sss_tsc_calender', ['$scope', '$http',
  function ($scope, $http){
    // console.log("yo bitchS");
    // function CalendarCtrl($scope) {
    // var date = new Date();
    // var d = date.getDate();
    // var m = date.getMonth();
    // var y = date.getFullYear();
    // /* event source that pulls from google.com */
    // // $scope.eventSource = {
    // //         url: "http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic",
    // //         className: 'gcal-event',           // an option!
    // //         currentTimezone: 'America/Chicago' // an option!
    // // };
    // /* event source that contains custom events on the scope */
    // $scope.events = [
    //   {title: 'All Day Event',start: new Date(y, m, 1)},
    //   {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},
    //   {id: 999,title: 'Repeating Event',start: new Date(y, m, d - 3, 16, 0),allDay: false},
    //   {id: 999,title: 'Repeating Event',start: new Date(y, m, d + 4, 16, 0),allDay: false},
    //   {title: 'Birthday Party',start: new Date(y, m, d + 1, 19, 0),end: new Date(y, m, d + 1, 22, 30),allDay: false},
    //   {title: 'Click for Google',start: new Date(y, m, 28),end: new Date(y, m, 29),url: 'http://google.com/'}
    // ];
    // // /* event source that calls a function on every view switch */
    // // $scope.eventsF = function (start, end, callback) {
    // //   var s = new Date(start).getTime() / 1000;
    // //   var e = new Date(end).getTime() / 1000;
    // //   var m = new Date(start).getMonth();
    //   var events = [{title: 'Feed Me ' + m,start: s + (50000),end: s + (100000),allDay: false, className: ['customFeed']}];
    //   callback(events);
    // };

    // $scope.calEventsExt = {
    //    color: '#f00',
    //    textColor: 'yellow',
    //    events: [ 
    //       {type:'party',title: 'Lunch',start: new Date(y, m, d, 12, 0),end: new Date(y, m, d, 14, 0),allDay: false},
    //       {type:'party',title: 'Lunch 2',start: new Date(y, m, d, 12, 0),end: new Date(y, m, d, 14, 0),allDay: false},
    //       {type:'party',title: 'Click for Google',start: new Date(y, m, 28),end: new Date(y, m, 29),url: 'http://google.com/'}
    //     ]
    // };
    // /* alert on eventClick */
    // $scope.alertEventOnClick = function( date, allDay, jsEvent, view ){
    //    $scope.alertMessage = ('Day Clicked ' + date);
    // };
    // /* alert on Drop */
    //  $scope.alertOnDrop = function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view){
    //     $scope.alertMessage = ('Event Droped to make dayDelta ' + dayDelta);
    // };
    // /* alert on Resize */
    // $scope.alertOnResize = function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view ){
    //     $scope.alertMessage = ('Event Resized to make dayDelta ' + minuteDelta);
    // };
    /* add and removes an event source of choice */
    // $scope.addRemoveEventSource = function(sources,source) {
    //   var canAdd = 0;
    //   angular.forEach(sources,function(value, key){
    //     if(sources[key] === source){
    //       sources.splice(key,1);
    //       canAdd = 1;
    //     }
    //   });
    //   if(canAdd === 0){
    //     sources.push(source);
    //   }
    // };
    // /* add custom event*/
    // $scope.addEvent = function() {
    //   $scope.events.push({
    //     title: 'Open Sesame',
    //     start: new Date(y, m, 28),
    //     end: new Date(y, m, 29),
    //     className: ['openSesame']
    //   });
    // };
    // /* remove event */
    // $scope.remove = function(index) {
    //   $scope.events.splice(index,1);
    // };
    // /* Change View */
    // $scope.changeView = function(view,calendar) {
    //   calendar.fullCalendar('changeView',view);
    // };
    // /* Change View */
    // $scope.renderCalender = function(calendar) {
    //   calendar.fullCalendar('render');
    // };
    // /* config object */
    // $scope.uiConfig = {
    //   calendar:{
    //     height: 450,
    //     editable: true,
    //     header:{
    //       left: 'title',
    //       center: '',
    //       right: 'today prev,next'
    //     },
    //     dayClick: $scope.alertEventOnClick,
    //     eventDrop: $scope.alertOnDrop,
    //     eventResize: $scope.alertOnResize
    //   }
    // };
    // /* event sources array*/
    // $scope.eventSources = [$scope.events, $scope.eventSource, $scope.eventsF];
    // $scope.eventSources2 = [$scope.calEventsExt, $scope.eventsF, $scope.events];

           
  } ]);






describe('PhoneCat controllers', function() {
 
  describe('PhoneListCtrl', function(){
 
    it('should create "phones" model with 3 phones', function() {
      var scope = {},
          ctrl = new PhoneListCtrl(scope);
 
      expect(scope.phones.length).toBe(3);
    });
  });
});





angular.module('phonecatFilters', []).filter('checkmark', function() {
  return function(input) {
    return input ? '\u2713' : '\u2718';
  };
});





console.log('\'Allo \'Allo!');





var phonecatServices = angular.module('phonecatServices', ['ngResource']);
 
phonecatServices.factory('Phone', ['$resource',
  function($resource){
    return $resource('phones/:phoneId.json', {}, {
      query: {method:'GET', params:{phoneId:'phones'}, isArray:true}
    });
  }]);
