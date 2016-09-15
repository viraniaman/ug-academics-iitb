<form name="remind" ng-submit="addClass()">
	<div class="param-wrapper">
		<div class="label">Subject</div>
		<div class="value">
		<input type="text" name="subject" ng-model="subject" placeholder="subject" class="textbox" required /> 
		</div>
		<div class="clear"></div>
	</div>
	<div class="param-wrapper">
		<p class="input-group" style="width:200px;">
	      <input type="text" class="form-control" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" min="minDate" max="'2015-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
	      <span class="input-group-btn">
			<button class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
	      </span>
        </p>
	</div>
	<div class="param-wrapper">
		<div class="label">timings</div>
		<div class="value">
		<input type="text" name="timings" ng-model="timings" placeholder="timings" class="textbox" required /> 
		</div>
		<div class="clear"></div>
	</div>
	<div class="param-wrapper">
		<div class="label">Venue</div>
		<div class="value">
		<input type="text" name="venue" ng-model="venue" placeholder="venue" class="textbox" required /> 
		</div>
		<div class="clear"></div>
	</div>
	<div class="param-wrapper">
		<div class="label">Teaching Assistance</div>
		<div class="value">
		<input type="text" name="ta" ng-model="ta" placeholder="T.A." class="textbox" required /> 
		</div>
		<div class="clear"></div>
	</div>

	<div class="param-wrapper">
		<div class="value">
		<input type="submit" value="Add class" id="add-new"/>
		<div class="clear"></div>
		</div>
	</div>	
</form>