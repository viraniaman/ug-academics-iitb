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






'use strict';
angular.module('myApp').controller('career_resources_entrepreneurship', ['$scope', '$http',
  function ($scope, $http){
   $scope.appingdata = [
      {'heading': 'Introduction',
       'snippet': 'To become a successful entrepreneur you need good ideas, a little luck, money and lots of hard work.\n Ninety per cent of successful people fail. Which means to gain something (profits, equity etc) you must first lose something (your initial investment). Phat-farm is a multimillionaire company whose owner Russell Simmons lost 10 million dollars in the first five years.\nAlthough a lot of experience and resources are not required, to become a successful entrepreneur you need to have '},
      {'heading': 'Strategy',
       'snippet': 'Strategic thinking is as much science as art form. You need to use both the right and left side of your brain in order to truly excel, and this takes both confidence and practice. The following are some skills great strategists’ posses and use daily:  1)They envision great things and then use strategic thinking to make it real. Having both these abilities means that they can see a desirable future and evolve a strategy which focuses on the details and the big picture, in order to create it.  2)They take time off from the daily hassles of a 9-5 job. All great strategists do this. Just go to a quiet place—preferably a weekend retreat, for a day or even an afternoon off, failing that—and sit with your thinking hat on. Try it.  3)Strategic thinking, as the name shows, isn’t about making a quick buck, it’s about seeing the big picture and planning for coming years. The immediate results might not be impressive, but in the long run, strategic thinking pays off. A reason for the perhaps-unimpressive immediate pay-off is that strategies, like masterpieces, take time to create, fine-tune and revise.  4)All true strategists are entirely aware of everything happening around them. In all business-concerns, there are bound to be clues, be they subtle or otherwise, that alert those who notice them of the possible directions in which the concern can be taken. As great strategists absorb this information, it helps them better formulate their plans whenever inspiration strikes them, be it on a vacation, during a morning walk, or just after the first cup of espresso. Their ability to spot and create links holds them in good stead.  Make sure your great idea isn’t just a pipe-dream. All great thinkers should make sure that their idea is valid, that it’ll stand up in a world full of problems and changes. You need to constantly revise and fine-tune your plans. Use experiences you’ve undergone to help you plan better. If a short-cut has worked before and saved you a lot of time and effort, don’t hesitate to adapt it to a new plan. Don’t depend just on yourself, no matter how good you think and/or know yourself to be. Use dependable colleagues to bounce your ideas off. In case of strategic thinking, ‘two heads are better than one’ is a truer adage than ‘too many cooks spoil the broth'},
      {'heading': 'Small Business',
       'snippet': 'Before starting a small business first understand the need of your target market and then try to provide a suitable solution. These 7 steps are to be used by entrepreneurs who want to start a new venture or create a marketing plan for an existing successful set up. Most people talk about the greatness of their products or services. Instead you should regularly educate the target market and build a relationship of trust and credibility. “Think marketing” is the mindset to be developed for your products and services. You have to market constantly. Do not fall for stop and go marketing. Some small businessmen start marketing during down seasons only. Having a successful marketing plan is essential for the venture. Profits and growth are directly proportional to effective marketing. If you are thinking where to start this 7 step guide will help you to understand the market and business.  Let’s answer the following questions:  1. Who--- Who is your target market? Who is your ideal client? What is the research to be done for finding out more about the target market?  2. What--- What does your ideal client want? What does your product and services do for them? What problems of your customer are solved by your product? What solutions does your client require? What is your USP that makes you unique? What are industry trends? What will make your client react? What are you selling? (For e.g.: are you selling eyeglasses or vision?) What is your brand of product and services? What would be the price?  3. Where--- Where is your ideal client? Geographically where are they located? Where will you position yourself for their easy reach? Where will they get you marketing messages from? Will you go through personal conversations, hold seminars or write a blog, newsletter or article?  4. When--- How frequent will you send out your marketing messages? When are your clients most likely to purchase?  5. Why--- Why are you in business? Why will customers come to you? Why should they not go to your competitors and choose your products?  6. How--- How does your customer purchase? How will you reach out to potential clienteles? How are you going to communicate your marketing strategies? How will you provide information to your customers to make their buying decision?  7. Marketing mindset--- Try to master a marketing mindset and your small business will move towards profits and success.'},
      {'heading': 'Successful Venture',
       'snippet': "The start-up of a business brings some significant changes in the business owner’s life: 1) permanent financial freedom, 2) flexibility of schedule, 3) satisfaction of making one’s life fulfilled- irrespective of making the business grow into a mammoth structure or just keep doing what you like to do and earn your living.   Along with the excitement of new ventures comes the challenge of wearing too many hats- strategic planning, marketing, sales, production, customer support, accounting and financing. Even if the business is small the tasks are huge.   Whatever might be the field, the main factors of a successful venture remains the same- 1) a good idea, 2) an effective marketing plan that is not hugely expensive, 3) efficient operation.   Ideas A proper business idea is crucial for the success of the venture. Firstly you must be passionate about the area of work. Secondly you must posses enough knowledge, talent and experience to stick on. Finally, choose a business that’ll yield small and steady income without heavy investment. This will eventually support you and your family. Some ideas that can be considered are- freelance writing, online marketing, web design, book keeping etc.   Promotion A Basic tool for marketing your product and services would be distributing business cards. You can design the card yourself by using different business card templates but it would be wiser to spend some money and let a professional do it. As little as $20 will get you 500 cards. Color cards are a bit more expensive. The next step is to build a website which will allow the prospects to view the information 24 hrs 365 days. Around .$50 is the cost for web hosting per year. Another $80 more would get you two simple web pages. If the internet prospects look good, then spend $50 on pay-per-click (PPC) online ads. $50 on PPC will bring you more customers and also generate revenue.   Operation efficiency Running the business (marketing, sales, production etc) takes away all the time for small business owners. They don’t have time (or knowledge) on strategizing the expansion of the business. The result is that they either remain a small venture or get wiped out if there’s a drastic change in the market. Operation efficiency is required even more in smaller ventures than in established firms. Some methods of improving operation efficiency- 1) streamline business process, 2) utilize productivity software, 3) outsourcing and etc. Something like- hiring an accountant for tax returns and bookkeeping, a collection agency for debt collection etc should be done. Always spend time in expanding your business."},
      {'heading': 'Startup Mistakes',
       'snippet': "An economy primarily consists of producers and consumers, and they engage in what is known as transactions. An economic transaction would be the transfer of goods and services from the producers to the consumers in exchange for money. Creation of goods involve various activities. These activities can be collectively known as a business, or a firm. Starting a business is neither easy nor quick. Here are a few essentials required to do this.  What to produce? There are many goods that an economy consists of. Hence, the producer must decide on which of these to produce. Looking out for one’s own profit cannot be the only criteria. Resources are scarce, and they should be used optimally and towards the societal welfare.  How to produce? There can be many methods of producing one commodity. Hence, the producer should opt for that process which exploits the resources fully at minimal cost.  How much to produce? An excess of supply will lower the price and the producers will eventually incur a loss. Hence, produce to cater to the market demand   1)Capital To start a business one needs to have enough investment power. If a producer does not have the required capital he can take loans from financial institutions, or enter into partnership with other investors to get collective investment support.   2)Market Study It is not enough to have the money to set up a business. One needs to understand the consumption pattern of the market. Even if the product has high selling probability, it should be marketed in a way that grabs the buyer’s attention. Otherwise, consumers might not be fully aware of the product details.   3)Scale of production Normally, a business cannot reach the optimal production level in the short run. This is due to the fixed inputs of production that cannot be changed according to need. These inputs give rise to fixed costs which cut into the producer’s revenue. However, with time as the business reaches a considerable scale, these fixed inputs disappear and only the variable ones remain, i.e. the producer faces only variable cost.  4)Delegation of activities No business can sustain on the basis of single showmanship. There are too many activities involved. Therefore, it is cheaper, more efficient and necessary to delegate duties to the individuals specializing in those fields. Hence, violation of any of the above guidelines is a mistake through which the business suffers."},
      {'heading': 'Myths',
       'snippet': "There are a lot of myths about being an entrepreneur; most spawned by the media. While some of these are true, others are patently false. The following are the top five myths:  Myth #1: Entrepreneurs want money. Period. A lot of people think entrepreneurs are in it solely for the money. This is true to an extent—fear of poverty, or simply financial insecurity, might well goad anyone to greater heights, and there are some who do it for the cash, but for most people, money is not the be-all and end-all. A lot of entrepreneurs have ego and/or emotion as their primary motives, many don’t maintain the lavish lifestyles expected of them, and most consider money as a way of keeping score.  Myth #2: My gain, your loss. People often refer to success in business at the cost of someone else. What they mean, obviously, is that if an entrepreneur is winning, someone somewhere has paid the price. This makes it seem like there has to be a winning and a losing side in every business deal. This is sometimes called the ‘zero-sum game’. In actual fact, entrepreneurs are creative thinkers. Rather than play for a ‘zerosum’ result, and contrary to popular supposition, they often try to work out a compromise that means everybody leaves the table satisfied.  Myth #3: The greater the risk, the greater the reward. A lot of young entrepreneurs, having heard this, accept it as gospel truth. A relationship between risk and reward is complicated and in no way reducible to a simple statement.Risks in business don’t equalize jumping off a cliff in the dark. Knowledge, experience, wisdom hard work and perseverance modify both the ‘risk’ and the ‘reward’.  Myth #4: Entrepreneurs get rich fast. The rise of ‘dotcom millionaires’ definitely makes it seem like entrepreneurs make a quick buck, but you should remember nothing is as easy as it seems. You may think that entrepreneurs get extremely rich extremely fast, but a lot of hard work goes into developing the ideas/products that make them rich. Myth #5: A good business plan is the entrepreneur s critical roadmap to success. This has more truth than most of the other myths, as you’re unlikely to be given loans without a solid business plan. However, a loan does not in any way equal good money. Business plans are guidelines, yes, but to succeed, you need a lot more."},
      {'heading': 'Ethics',
       'snippet': "“Honesty is the best policy”, a phrase that is valid not only in one’s daily lives, but also in business ethics. Ethics are very important to all business people. Yet, many neglect ethics as an important concept that has a major impact upon a person s success as an entrepreneur and investor. Business, after all, involves dealing with money, either one’s own or borrowed. It also involves building successful money based relationships with clients and customers. Such relationships must be built on trust – and having ethical foundations are imperative to the building of trust. Therefore ethics constitute the cornerstone of success in business. It is important to realize that ethics is important irrespective of the size of the business. Whether your business enterprise is large or small, whether your customers are many or few, the relevance of adhering to high ethical standards is the same. You see, ethics in business is closely linked to the moral value chain that intertwines through all its operations. Moral value impinges on every single customer. There can be no exceptions irrespective of whether your customers are 10 or 10,000 in number or more. Ethics apply to each of them. As a discipline, ethics in business can be either applied or theoretical. Or to express it differently, it can be either pragmatic or philosophical. The former evolves, typically, into the do’s and dont’s that act as guidelines for achieving ethical behavior. Study of the latter Involves probing the whys and wherefores of ethics in business. It also examines the issue of defining ethics. It promotes high standards, draws up a code and helps the entrepreneur self-evaluate his own personal ethical standard. This standard in turn helps the business enunciate the norms of ethical behavior for its employees. An honest business employs only honest professionals. This must be clearly understood down the line. In most successful business organizations high ethical standards are compulsory. An employee bribing somebody, even to further his employer’s interests, is likely to be dismissed. Many multinationals refuse to conduct business in countries where bribes are commonly given and taken. These are examples of the applied side of ethics in business. A final point . In some factors there can be no compromises in ethics irrespective of profit or loss considerations. For instance, under no circumstances should a business break the laws of the country where’s it’s in business whether it likes these laws or not ."},
      {'heading': 'Communication',
       'snippet': "Even if you have brilliant ideas, they’re worthless unless you share them. So, being able to communicate effectively is as important as being able to come up with great ideas. However, not everyone is good at communication, and they need practice to be capable of it. Suppose a situation arises when, due to external reasons, you need to immediately double your company’s output. But your managers are unable to get the work done by the employees, who are unwilling to go that extra mile for the company. This results in loss of both money and reputation for the company. So, what’s the problem? It’s not that you’re not paying the employees, nor are they deprived of other benefits. So the real problem here is the lack of communication between employer and employee. It is often forgotten that internal communication is an integral part of business communication strategy. The entire focus being on external communication, the firm and its managers busily paint rosy pictures for customers. This leads to a strong marketing side, certainly, but rather weakens operational strategy. Another problem caused by miscommunication and/or lack of communication is the growth of the negative-grapevine. This unofficial channel of communication can lead to disaffection, causing profits to decrease. To ensure growth, you need to have channels of both internal and external communication. The whole communication system should be of one piece and purpose. No loose talk can be permitted. Whatever is communicated, whether to the customers or the employees, must be carefully crafted in order to attain the goals that have been set. If you focus on your target segment’s needs, you are likely to be able to set up an effective communication strategy. They care about your goals, but only o far as they benefit from it. So identify with their needs and communicate your goals in terms they empathize with. If you welcome suggestions and encourage feedback, your employees get a chance to constructively put forward their suggestions, but this will also suppress the grapevine and allow them to feel involved. When you receive the feedback or suggestions, react in a positive way. Assure your employees that their complaints are being noted and positive actions shall be taken. Make sure your message isn’t lost in a maze of jargon and can be understood by your target audience. To sum up, to achieve your goals, you must communicate your ideas clearly."},
      {'heading': 'Time Management',
       'snippet': "Time management is considered to be the art which teaches you the diverse techniques to increase your effectiveness and complete pending work. It is important to be able to control and manage time in your personal life, but in the case of your business, it is critical and necessary in order to achieve success. Time management softwares help small business owners to manage and control time effectively by using electronic calendars and planners. The ‘to do list’ has proven to be an effective tool in time management. Scheduling actions, however, is also time consuming, thus, it is an essential need to use software. Success is a result of planning your goals as well as your time, implementing routines and scheduling tasks. Time management software can enforce the employee’s flow of work and production activities by using written or electronic reminders or the ‘to do list’ software. It is a must for small business owners to plan, prepare, prioritize and control their activities along with the activities of other members of the team, and also set the goals towards the success of the business. This is actually an easy task once you have the adequate time management software. Many of these software programs include planning short and long term goals, data analysis, future predictions, and performance graphics. These are features that are not available in the basic to do list software. Do not under estimate the importance of the ‘to do list’ software when planning your business activities or setting your goals. Time management is extremely important for a small business. Thus, time management gurus are common these days who give out advice on how to set about managing your time. They are best known as time managers, who after reading your business plan; prioritize activities for work teams on a daily basis. © Tips and Tricks for Success for a Young Entrepreneur. 27 Tips and Tricks for Success for a Young Entrepreneur With the help of time management software, they can provide the business owners with the detailed reports of daily activity trends, allowing the owners to rectify values, activities and priorities. Time managers are also the common name given to time management software programs and various time management solutions available in the market today for small businesses. These range from the classic paper books, to diverse ‘to do list’ software, organizers, reminders, calendars and planners among many other things."},
      {'heading': 'Leadership Attributes',
       'snippet': "Leadership qualities are not something you are born with and therefore need to be acquired if you are an aspiring business person. The skills can be easily acquired if you keep in mind a few basic things that are necessary for any kind of leadership, be it in business or otherwise. The success of any business enterprise depends on how efficient the manager or the owner is in terms of building up a work culture that is healthy as well as productive. Any leader should have a vision for the job that he is managing. It is important to have the right kind of vision for this is extremely crucial in holding together the various aspects of the job. A misplaced vision will not only lead the employees astray but also ruin the whole business. A clear vision will get you started and also help you see the work through in a successful way. A vision is something that the whole company works towards and it keeps them going until it is achieved. Effective entrepreneurship will help the manager and his employees in realizing this vision. Ideas and opinions should be pooled from all sides. This would make everyone feel a part of the whole enterprise. The manager should make sure that his employees are not merely skilled laborers who are there just to make money, but are committed to the vision of the company. The manager should inspire and motivate the employees to work towards a common goal. The business would thus become a means to achieving these ends. This does not mean that the focus should entirely be on the results and not on the work itself. Each step taken by the employees should be carefully analyzed and the employees should be given feed back on how the work is progressing.  This would ensure expert quality as well as commendable results for the company. The leader should create a healthy atmosphere in the work area that provides the employees with the space and freedom to think freely and apply his imagination in getting the work done. A rigid system of work would alienate the employees from each other and from the leader. This would jeopardize the whole system and affect the vision of the company.  Any kind of business includes the target audience, which are the customers of the company. The leader should also focus on the customers by bringing out results that would reach out to a larger audience."},   
      {'heading': 'Estimate Your Startup Cost',
       'snippet': "Start up costs pose problems for all of us. They are instrumental in getting one into a fix and so measuring your stakes is very important. Here are ten beneficial tips on how to estimate your business start up costs.  1. First and foremost you need to think carefully and include the costs of all the various things you need in the estimated start up of your business. Always remember, that this amount is different from the basic amount cost required for your company to survive for the year. Beside this, there are various other things that cost money and that includes advertisements, chairs and office supplies, inventory, cash registers, and service supplies. The start up cost must also include provision for any other item that you may have forgotten.  2. Don t take out bank loans unless it is absolutely necessary. And even if you do ensure that you can afford the interest that the bank is going to charge. Also inquire about the interest rates, you wouldn’t want it to be too high.  3. Take into account your household expenses during the period that is the starting time for your business. Make sure you have adequate cash to cover the amount for the credentials to acquire a loan that’ll cover your needs.  4. You must be able to judge the amount of money that is required for your business to survive its first year. You also need to be prepared for any other sporadic expenses that might occur once in a while during that year.  5. Organize yourself so that you are ready for any extra additional costs that might come up intermittently through-out the year.  6. You need to take into consideration the food expenses for the entire year. Your budget should leave sufficient money for food and other basic expenses. This will cushion you from risks during the first year of business.  7. Your company requires credentials that’ll secure a loan in case your money runs out sometime during the year. It is advisable that you get a loan only if you can generate enough sales to pay the loan back. If your business is not doing very well during the first year then you might want to shut it down. 8. The salary that you have to pay to your employees, that is, if you have employees, is another thing that has to be kept in mind.  That includes business insurance, any health insurance, and of course workers’ payments. You also have to pay an extra fee to the city for any part time and full time employees you have working for your company.  9. You may have to take tests to get certified depending on the nature of the business that you are starting. These tests cost money. Moreover you have to be aware of any other rules and regulations that your type of business entails.  10. You can always sell some personal belongings to get some extra money incase you don’t have enough. But ensure that your business offers sufficient security for selling these items. The last thing you want is end up broke having lost your company and also all your expensive belongings because you sold them to have enough money to start the company."},
      {'heading': 'Getting Funding',
       'snippet': "Successful businessmen and women who want to invest their capital in struggling businesses or startup franchises are called Business Angels. In return for the investment, they usually want convertible debt or ownership equity. In order to get a good return on their investment, they plan to use their expertise to turn the businesses into successes. Because of their experience, Business Angels are very careful about who they invest in. Their plan of action involves investing when the shares are cheap, working with the company, building it up and then selling the mature company after a few years to other stockbrokers or to the original owner. Dragons Den is a popular program that has investors waiting to invest in a business. As the owner of a business, it is important to have a great sales pitch and to prepare in advance. It helps to have a clear business strategy. The dragons are usually good at noticing if the target audience and market has not been researched adequately. In order to impress the dragons, it is important to have accurate sales projections – they want facts as answers to their questions, not lies. They will usually not invest in a high risk business if they believe it won’t work. They are experts in their field, so their advice about business ideas is very valuable, and should be heeded. Confidence is very important. Voice, posture and attitude are dead giveaways when it comes to confidence, so it helps to have these areas covered when convincing potential investors. Answers should be prepared for anticipated questions. Thinking about what the investors might ask is a good strategy. Questions about potential profits and company income are natural, so the key is to think differently. Areas of the business that make it unique and different from others should be highlighted in order to eliminate competition. Commitment is another vital factor. Business angels like to see committed workers. They are usually impressed if the business venture includes some of the starter’s own capital. However, if thousands of pounds have already been invested in the business and it’s still not making any money, they will be wary. Business Angels nowadays are very easy to find, thanks to the Internet. There are hundreds of sites dedicated to finding the right investor for a business. Angel groups or angel networks also exist. Therefore, starting a business has never been easier – investment is a hand’s throw away!"},
      {'heading': 'Brand Your Business',
       'snippet': "Attaching an identifiable brand to your business is very important to ensure success for your business. The term Branding is a conglomeration of numerous functions that must be undertaken to ensure success for the business. Branding initiates subsequent actions in diverse zones, like:  1. Increasing perception and visibility of business name and logo.  2. Formulating a company name that can immediately inspire public faith.  3. Identifying and carefully nurturing the potential consumer profile.  Branding, including the company name and logo, is not a tangible asset of a business. It is not a physical asset and is only useful in increasing the goodwill of the business, and accentuating the reputation and identity of the business. Careful and cautious planning must go into branding, before it is implemented for profit maximizing. Identifying and isolating factors that attract the consumer base with specific incentives and understanding of their requirements need to be ensured before branding is undertaken. These are some very essential steps to secure and devise a successful Brand for the business :  1)Consistency in Advertisements: Advertising your brand involves showcasing and emphasizing the unique points of the brand, which the competitors lack. These points are to be repeatedly stressed and advertised, so that it creates a recall value within its customer base. The public is to be absolutely showered with these advertisements so that they are reminded of these brands regularly.  2)Consumer service: Human resource is a very vital ingredient for the success of any business, and so, proper recruitment of sales staff is essential. They are to be certain about their position in the process of brand building.  3)Customer emphasis: Every customer needs to be respected and understood. Being inattentive or unmindful of even a single customer can mean massive losses for the business. Uncooperative staff should be sacked, because favorable responses from a customer helps attract ten more  4)Public perception: The treatment of a single customer can spread very fast through word of the mouth, and, negative publicity jeopardizes your business. While brand promotion, illegitimate and false promises are not to be made. The purchasing and billing process is to be simplified to ensure customer convenience. Prior commitments are to be respected, and increase goodwill of the brand.  5)Usage of technological advancements: The denial of the impact of internet in business promotion and marketing would be improper. Internet queries from customers must be satisfactorily answered. The business must also be regularly updated and implemented with advanced technologies."},
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

      $http.get('json/sss_data.json').success(function(data){
        $scope.sss_data = data;
      });

           
     
    }]);






'use strict';
  angular.module('myApp').controller('sss_data_filling', ['$scope', '$http',function ($scope, $http){
    
    $scope.today = function() {
      $scope.dt = new Date();
    };
    $scope.today();

    $scope.showWeeks = true;
    $scope.toggleWeeks = function () {
      $scope.showWeeks = ! $scope.showWeeks;
    };

    $scope.clear = function () {
      $scope.dt = null;
    };

    // Disable weekend selection
    $scope.disabled = function(date, mode) {
      return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
    };

    $scope.toggleMin = function() {
      $scope.minDate = ( $scope.minDate ) ? null : new Date();
    };
    $scope.toggleMin();

    $scope.open = function($event) {
      $event.preventDefault();
      $event.stopPropagation();

      $scope.opened = true;
    };

    $scope.dateOptions = {
      'year-format': "'yy'",
      'starting-day': 1
    };

    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'shortDate'];
    $scope.format = $scope.formats[0];

    $scope.addClass = function(){     
      var subject = $scope.subject;
      var dt = $scope.dt;
      var timings = $scope.timings;
      var venue = $scope.venue;
      var ta = $scope.ta;
      console.log(subject,dt,timings,venue,ta);
    };
     
  

  }]);

