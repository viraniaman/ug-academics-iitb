<div ui-view>
<div class="status">Entre</div>
    <div class="insidecontainerheader" style="font-size:1.5em;">Entrepreneurship
    </div>
    <div class="resourcedropdown">
        <select ng-model="query"
                ng-options="act.heading for act in appingdata">                
        </select>
    </div>
    <div class="insidecontainerdata">
<!-- 
<tabset justified="true">
    <tab heading="Introduction">
    To become a successful entrepreneur you need good ideas, a little luck, money and lots of hard work. Ninety per cent of successful people fail. Which means to gain something (profits, equity etc) you must first lose something (your initial investment). Phat-farm is a multimillionaire company whose owner Russell Simmons lost 10 million dollars in the first five years.<br>
	Although a lot of experience and resources are not required, to become a successful entrepreneur you need to have passion and persistence. Turning everyday ideas into business is what makes an ordinary entrepreneur extraordinary. This talent or gift is what makes them unique. Most start with very limited resources and move ahead of their competitors through personal effort. The moves have to be fast and good decisions need to be taken to gain a share in the market and move forward for bigger competitors.
	They differ in age, sex and race but it’s easy to spot an entrepreneur and their business. They might grow richer with their ideas but the start up point is to look for areas not being served and change the way things are done. A good idea is not the same as an ideal opportunity. Understanding the distinction will save your time, effort and money. The entrepreneur creates a vision and pushes the company through ups and downs towards fulfilling that vision. Becoming an entrepreneur is at the same time scary, thrilling, worrisome, yet an exciting experience. But before you become one you have to understand the concept of entrepreneurship first. There are many types of entrepreneurs such as social, home based, virtual, traditional etc.
	The widely accepted definition of entrepreneurship would be to start up a new organization or take over an old one to respond to certain identified opportunities. You must realize and recognize that a large number of new businesses fail. The most successful people are those who are not afraid to experiment, learn from their past mistakes and correct them to become successful.
	The difference between an entrepreneur and a small business owner is the process or method they use to implement the expansion of their business. Small business owners want their business to be the way they are i.e. small and geographically bound. Their vision is less broad, only making a few millions in their entire lifespan.<br>
	Entrepreneurial ventures look forward to earning millions in the first 3-5 years and expand internationally utilizing all opportunities. Other characteristics include a focus on innovation, and creation of new values to shake up the marketplace. In America small businesses provide maximum jobs whereas entrepreneurs provide most of the new jobs.
    </tab>
    <tab heading="Strategy">
    </tab>
    <tab heading="Small Business">
    </tab>
    <tab heading="Successful venture">
    </tab>
    <tab heading="Start-up Mistakes">
    </tab>
    <tab heading="Myths">
    </tab>
    <tab heading="Ethics">
    </tab>
    <tab heading="Communication">
    </tab>
    <tab heading="Time Management">
    </tab>
    <tab heading="leadership Attributes">
    </tab>
    <tab heading="Estimate your Startup Costs">
    </tab>

</tabset> -->

    <li ng-repeat="topic in appingdata | filter:query">
      <h2>{{topic.heading}}</h2>
      <p>{{topic.snippet}}</p>
    </li>
    
        
    
</div>

</div>