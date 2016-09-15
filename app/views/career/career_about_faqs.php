<div ui-view ng-init="datacalling('general')">
  <div class="status">FAQs</div>
    <div class="insidecontainerheader">FAQs</div>
    <div class="insidecontainerdata">
      <div id="main">
        <tabset justified="true">
            <tab heading="general" ng-click="datacalling('general');active=true;"></tab>
            <tab heading="Apping" ng-click="datacalling('apping');active=true;"></tab>
            <tab heading="Entrpreneurship" ng-click="datacalling('entre');active=true;"></tab>
        </tabset>
        <ul class="faqslist">
          <li ng-repeat="point in questions" class="thumbnail phone-listing">
            <p class="shadow">{{point.que}}</p>
          	<p>{{point.ans}}</p>
          </li>
        </ul>
      </div>
    </div>
</div>

