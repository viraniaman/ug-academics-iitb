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
        .state('career_about_Vision',{
          url : '/vision',
          parent : 'career_about',
          templateUrl : 'views/career/career_about_vision.php'
          // controller : 'Home'
        })
        .state('career_about_FAQs',{
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
        .state('career_resources_Core',{
          url : '/core',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_core.php'
          // controller : 'career_resources_core'
        })
        .state('career_resources_Non-core',{
          url : '/non-core',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_noncore.php'
          // controller : 'career_resources'
        })
        .state('career_resources_Entrepreneurship',{
          url : '/entrepreneurship',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_entre.php',
          controller : 'career_resources_entrepreneurship'
        })
        .state('career_resources_Apping',{
          url : '/apping',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_apping.php'
          // controller : 'career_resources_apping'
        })
        .state('career_resources_Finance',{
          url : '/finance',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_finance.php'
          // controller : 'career_resources'
        })
        .state('career_resources_Scholarships',{
          url : '/scholarships',
          parent : 'career_resources',
          templateUrl : 'views/career/career_resources_scholar.php'
          // controller : 'career_resources'
        })
        .state('career_resources_Interview',{
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
        .state('career_genre_Career Selection',{
          url : '/careerselection',
          parent : 'career_genre',
          templateUrl : 'views/career/career_genre_choose.php'
          // controller : 'career_genre_choose'
        })
        .state('career_genre_Jobs',{
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
        .state('sss_data_filling',{
          url : '/sss_data_filling',
          parent : 'sss',
          templateUrl : 'views/sss_data_filling.php',
          controller : 'sss_data_filling'
        })

        // .state('sss_tsc_calender',{
        //   url : '/calender',
        //   parent : 'sss',
        //   templateUrl : 'views/sss/calender.php'
        //   // controller : 'sss_tsc_calender'
        // })
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
        .state('enpower_idp_Home',{
          url : '/idp',
          parent : 'enpower',
          templateUrl : 'views/enpower/enpower_idp_home.php',
          // controller : 'Home'
        })
        .state('enpower_idp_Apply',{
          url : '/apply',
          parent : 'enpower_idp_Home',
          templateUrl : 'views/enpower/enpower_idp_apply.php',
          // controller : 'Home'
        })
        .state('enpower_idp_Projects',{
          url : '/projects',
          parent : 'enpower_idp_Home',
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
        .state('team',{
          url : '/team',
          parent : 'home',
          templateUrl : 'views/team.php',
          controller : 'team'
        })

  }]);



