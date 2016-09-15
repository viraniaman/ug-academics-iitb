<div ui-view>
	<div class="status">Jobs</div>
	<div class="insidecontainerheader">Jobs</div>
	<div ng-repeat="field in dataa" class="modal-div">
		<nav class="same_align">
			<ul >
			<li class="modal_header">
				{{field.heading}}
			</li>
			<li class="modal_subheader">
				{{field.sub_header}}
			</li>
			</ul>
		</nav>
		<button class="btn btn-primary same_align" ng-click="info(field.id)">More Info</button>
		<div class="model_data" ng-show="getUserId() == {{field.id}}">
			<b>Profile : </b>{{field.profile}}<br><br>
			<b>Growth Option : </b>{{field.growth_option}}<br><br>
			<b>Comments : </b>{{field.comments}}<br><br>
			<b>Qualififcation : </b>{{field.qualification}}<br><br>
			<button class="btn btn-primary" ng-click="ok(field.id)">ok</button>
		</div>
	</div>
	
</div>

