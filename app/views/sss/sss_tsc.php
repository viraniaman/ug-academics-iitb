
<div ui-view>
	<div class="status">TSC</div>
	<div class="insidecontainerheader">Tutorial Service Center</div>
	<div class="fb_right sss_right">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FStudent-Support-Services-IIT-Bombay%2F607050295996937&amp;width&amp;height=82&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:82px;" allowTransparency="true"></iframe>
	</div>
	<div class="insidecontainerdata">
		The Tutorial Services Centre has been established to help the students cope up with courses and get a feel of what the subject is. This aims to help weak and backlogged students to complete their course work on time and have a smooth transit through out their academics. Our service is extended to all the students not only weak. Most of the students loose their focus on studies because they are unable to grasp the subject from class room and hence give up on learning deciding to take up non technical carriers and compromising on the quality of Indian education, this centre is specially designed for such people. The ultimate motive behind this tutorials is to divert students towards academics.<br>
	</div>
	<h3><b>Time Table</b></h3>
	<div ng-repeat = "thing in sss_data" class="sss_data">
		<div>
			<b>Subject :</b>{{thing.subject}}
		</div>
		<div>
			<b>Date :</b>{{thing.date}}
		</div>
		<div>
			<b>Timings :</b>{{thing.timings}}
		</div>
		<div>
			<b>Venue :</b>{{thing.venue}}
		</div>
		<div>
			<b>TA :</b>{{thing.ta}}
		</div>
	</div>
</div>




