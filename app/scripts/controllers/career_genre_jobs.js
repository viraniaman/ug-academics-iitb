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
    },
    {
      "id":"3",
      "heading":"Professor",
      "sub_header":"Teaching",
      "profile":"Professor",
      "growth_option":"Growth options in academia? I guess they ought to be well-known. But anyway: Assistant Professor, Associate Professor, Professor, Dean, Director, Vice Chancellor... ",
      "comments":"Academics is for people who - like teaching and research - whose primary goal in life is not to make pots of money; - who like a lot of independence; and - who have some idealism.",
      "qualification":"BTech, EE (IIT-Bombay) MS, PhD (U of Florida, Gainesville)"
       },

      {
      "id":"4",
      "heading":"Strategy Consultant",
      "sub_header":"Consulting",
      "profile":"Consulting",
      "growth_option":"Has a pretty steady growth trajectory. Might be slower if one does not have an MBA degree.",
      "comments":"eresting field, but if someone is looking for a lot of operational experience, then strategy consulting is not the place. It would be helpful if one can work in the industry and then work at a strategy firm. That, to me, is an ideal step.",
      "qualification":"Bachelor of Technology in Mechanical Engineering Master of Technology in Computer Aided Design & Automation"
    },
      {
      "id":"5",
      "heading":"Business Analyst (Consultant)",
      "sub_header":"Consulting",
      "profile":"Consultant",
      "growth_option":"Plethora of opportunities. Working with Govt, Philanthropic Institutions,Top-notch companies as clients (almost all fields). Excellent client exposure, up to the CEO level. Excellent exit options, with options of getting in the best MBA schools like Harvard, Stanford, Sloan, Wharton, Kellogg etc Gives an excellent overview of the corporate world. ",
      "comments":"Enjoying your work is most important and stay focussed on your goal.",
      "qualification":"2003-08 Dept: Meta Course: Dual (Ceramics and Composites) Good old days: Insti FA secy, GS-Cult and DD Placement Nominee .Placement: McKinsey and Company. "
    },

      {
      "id":"6",
      "heading":"Technical Manager and Architect for Database Security development in Oracle",
      "sub_header":"CS Core",
      "profile":"Technical Manager and Architect for Database Security development, responsible for both technical and managerial aspects of Security in Oracle Databases, including Label Security, Virtual Private Database, Auditing. ",
      "growth_option":"More and more amount of high value data is being stored in databases. It is also fast emerging as the most sought-after target for hackers. Idea is to make security non-intrusive, unbreakable and performant.",
      "comments":" Think of applications which could make use of the technology, and how audience would use the applications / technology. ",
      "qualification":"M.Tech.(Computer Science) in 1997 PGSEM from IIM-Bangalore in 2009"
    },
      {
      "id":"7",
      "heading":"Coding of hardware subsystems",
      "sub_header":"Elec Core",
      "profile":"Firmware development for the camera sub-system in the OMAP platform which is used in smartphones. -- Implement image processing algorithms in C/C++ and optimize them for hardware -- Measure performance and meet the performance targets",
      "growth_option":"Rise in technical area alone and become technical lead/ architect -- Rise in people management and become a manager",
      "comments":"Be very good in programming, in at least one of the languages (C/C++/Java) -- Good team-work and people skills (even in a technical company!) -- Know the basics of your field thoroughly. -- Networking within whichever company you join is of paramount importance and helps in your growth.",
      "qualification":"Dual Degree (EE) at IIT Bombay 2008 MS (ECE) at Univ. of Wisconsin-Madison 2012 "
    },
      {
      "id":"8",
      "heading":"Engineer - CFD Development",
      "sub_header":"Aerospace Core",
      "profile":"Engineer - CFD Development (CFD: Computational Fluid Dynamics) Working on developing features for the FLUENT sofware used for engineering simulations.",
      "growth_option":"CFD development options are few inside India. Would suggest a student to apply abroad if he is motivated to work in CFD. The student shold have interest in CFD (taught in Aero- Dept) and coding in C.",
      "comments":"During student time do courses from CSE dept along with Aero since coding is important in the industry if one wants to work in CFD. ",
      "qualification":"BTech + MTech (DD) - IIT Bombay in Aerospace Engineering"
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
