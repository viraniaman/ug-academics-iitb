<!-- <div class=" sidenavbar lefty"  >
	<nav id="sidenavbar">
		<ul >
			<li ui-sref="career" class="navheader">Career Cell</li>
			<li ui-sref="career_genre" class="navheadersecond">
				<div class="nav_fields">Genre</div>
			</li>
			<li ui-sref="career_genre_{{header}}" ng-repeat="header in genre" class="about" >
				<!-- <div class="nav_images">
				<img src="img/{{header}}.png" alt="{{header}}">
				</div> -->
				<!-- <div class="nav_fields">{{header}}</div>
			</li>
		</ul>
	</nav>
</div>  -->
<div ui-view>
	<div class="status">Genre</div>
	<div class="insidecontainerheader">Genre</div>
</div>

