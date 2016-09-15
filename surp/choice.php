<?php
	session_start();
	require_once("functions1.php");
	require_once("connect1.php");
	if (!(isset($_SESSION['ldap_id']))){
		header("location: apply.php");
	}
	$is_registered=0;
	if(is_registered($_SESSION['ldap_id'])){
		$is_registered=1;
	}
        $info = ldap_find_all('uid',$_SESSION['ldap_id']);
	$fullname = $info[0]["cn"][0];
	$username=$info[0]['uid'][0];
	$dep = explode(",",$info[0]["dn"]);
	$alldepartment = explode("=",$dep[2]);
	$alldepartments =  DepartmentFindAll();
	$mydepartment=$alldepartment[1];
	//$mydepartment = "cse";
	$email=$info[0]["mail"][0];
	$alternate_email=$info[0]['mailforwardingaddress'][0];
	$year = explode('/',$info[0]["mailmessagestore"][0]);
	$year_of_study=2016-$year[2];
	//$all_projects=get_department_projects($mydepartment);
	
	?>
<!DOCTYPE html>
<html>
<?php require_once("functions1.php"); ?>
<head>

  <meta charset="UTF-8">

  <title>Apply | SURP</title>

  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style_apply.css">

    <!--<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js"></script>-->
	<script src="extra/js/jquery.js" type="text/javascript"></script>
    <script src="extra/js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="extra/js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="extra/js/jquery-ui-custom.min.js" type="text/javascript"></script>
   
	<!--<script src="js/jquery-ui.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="extra/js/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="extra/css/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="extra/css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="extra/css/ui.multiselect.css" />
    <link rel="stylesheet" href="extra/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.ui-jqgrid tr.jqgrow td {
    white-space: normal !important;
}
</style>
    <script>
		var count_1=0;
		var count_2=0;
		var count_3=0;
		var count_4=0;
		var err=0;
		
		var preference_1="-1";
		var preference_2="-1";
		var preference_3="-1";
		var preference_4="-1";

    function mySubmit(){
    	//alert("tp");
			$(".preference").each(function(i){
				val = $(this).val();
						
				if (val==1){
					var temp1=$(this).attr('name');
					if(preference_1 == "-1"){
						preference_1=temp1;
						count_1+=1;
					}
					else if(preference_1!=temp1)
						err=1;
				}
				else if (val==2){
					var temp2=$(this).attr('name');
					if(preference_2 == "-1"){
						preference_2=temp2;
						count_2+=1;
					}
					else if(preference_2!=temp2)
						err=2;
				}
				else if (val==3){
					var temp3=$(this).attr('name');
					if(preference_3 == "-1"){
						preference_3=temp3;
						count_3+=1;
					}
					else if(preference_3!=temp3)
						err=3;
				}
				else if (val==4){
					var temp4=$(this).attr('name');
					if(preference_4 == "-1"){
						preference_4=temp4;
						count_4+=1;
					}
					else if(preference_4!=temp4)
						err=4;
				}

			});

			if(err){
				alert(err+" is selected more than once. Please fill all the choices again.");
				location.reload(true);
			}			
				
		}
		
    $(document).ready(function(){
		$("a#single_image").fancybox();
		$("a#single_image2").fancybox();

		var department = '<?php echo $mydepartment; ?>';
		var username = '<?php echo $_SESSION['ldap_id'];?>';
			$(table1).hide();
		$("#type1").click(function(){
			
			$(table1).show();
		});	
		

		$("#check").click(function(){	
		mySubmit();
		if (count_1<=0){
		 alert("Please choose  Preference 1 ");
		 err=1;
		 
		}
		else if (count_2<=0 && count_3>=1){
			alert("Preference 2 not specified");
			err=1;
		}
		else if (count_3<=0 && count_4>=1){
			alert("Preference 3 not specified");
			err=1;
		}
			
	 if (err==0){
		//alert(preference_1);
		 $.ajax({
			type: 'POST',
			url: 'savedata.php',
			data : "user="+username+"&preference_1="+preference_1+"&preference_2="+preference_2+"&preference_3="+preference_3+"&preference_4="+preference_4,
			success:function(){
				alert("Your preferences have been saved. You may check by pressing 'My preferences'. Note : If you leave the project in middle for another internship then you can't write that internship project in your resume either.");
				location.reload(true);
				},
            		error: function(jqXHR, textStatus, thrownError) {
				alert("err "+thrownError+" "+textStatus+" "+jqXHR.responseText);
			      }
			});
		 }
		//return err; 
			
		});
		
		
		
		/*jQuery("#toolbar").jqGrid({
			url:'projects.php?department='+department,
			datatype: "json",
			height: 455,
			width: 700,
			autowidth: true,
			colNames:['Prof. Name','Project Title ', 'Project Description','Eligibility Criteria','Preference'],
			colModel:[
					
					{name:'prof_name',index:'prof_name', width:35, sorttype:'text'},
					{name:'title',index:'title', width:50, sorttype: 'text'},
					{name:'description',index:'description', width:100},
					{name:'eligibility',index:'eligibility', width:100},
					{name:'apply',index:'apply', width:25,formatter:format}
				],
			rowNum:70,
			rownumbers:true,
			rowTotal: 2000,
			rowList : [20,30,70],
			loadonce:true,
			mtype: "GET",
			ignoreCase:true,
			gridview: true,
			pager: '#ptoolbar',
			sortname: 'prof_name',
			viewrecords: true,
			sortorder: "asc",
			onSelectRow: function(id){
		$.ajax({
		  url: 'expanded.php?id='+id,
		  success: function(data) {
		   
		    $("#data").html(data);
		    $("#hidden-href").hide();
		    
		    $("a#single_image").trigger('click');
		    
		  }
		});
			},
					
			
				caption: ""	
		});

		jQuery("#toolbar").jqGrid('navGrid','#ptoolbar',{del:false,add:false,edit:false,search:false});
		jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});

		*/
		$("#choose-dep").change(function(){
			//alert("clicked");
			mySubmit();
			department=$(this).val();
			//jQuery("#toolbar").jqGrid().setGridParam({url : 'projects.php?department='+department}).trigger("reloadGrid");
			gridSearch(department);
			
		
			});



		/*jQuery("#toolbar2").jqGrid({
			url:'projects2.php?department='+department,
			datatype: "json",
			height: 455,
			width: 700,
			autowidth: true,
			colNames:['Prof. Name','Interests/Tentative Problems','Eligibility Criteria','Preference'],
			colModel:[
					
					{name:'prof_name',index:'prof_name', width:35, sorttype:'text'},
					{name:'interests',index:'interests', width:100},
					{name:'eligibility',index:'eligibility', width:100},
					{name:'apply',index:'apply', width:25,formatter:format}
				],
			rowNum:70,
			rownumbers:true,
			rowTotal: 2000,
			rowList : [20,30,70],
			loadonce:true,
			mtype: "GET",
			ignoreCase:true,
			gridview: true,
			pager: '#ptoolbar2',
			sortname: 'prof_name',
			viewrecords: true,
			sortorder: "asc",
			onSelectRow: function(id){
		$.ajax({
		  url: 'expanded.php?id='+id,
		  success: function(data) {
		   
		    $("#data2").html(data);
		    $("#hidden-href2").hide();
		    
		    $("a#single_image2").trigger('click');
		    
		  }
		});
			},
					
			
			caption: "Type 2 Projects (Come up with your own idea)"	
		});

		jQuery("#toolbar2").jqGrid('navGrid','#ptoolbar2',{del:false,add:false,edit:false,search:false});
		jQuery("#toolbar2").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});

	*/
		$("#choose-dep2").change(function(){
			mySubmit();
			department=$(this).val();
			//jQuery("#toolbar").jqGrid().setGridParam({url : 'projects.php?department='+department}).trigger("reloadGrid");
			gridSearch2(department);
			});

	});

	function gridSearch(department)
    {
	    $('#toolbar').jqGrid('GridUnload');	
        
        $('#toolbar').trigger("reloadGrid");
       jQuery("#toolbar").jqGrid({
			url:'projects.php?department='+department,
			datatype: "json",
			height: 455,
			width: 700,
			autowidth: true,
			colNames:['Prof. Name','Project Title ', 'Preference'],
			colModel:[
					
					{name:'prof_name',index:'prof_name', width:35, sorttype:'text'},
					{name:'title',index:'title', width:50, sorttype: 'text'},
					{name:'apply',index:'apply', width:25,formatter:format}
				],
			rowNum:70,
			rownumbers:true,
			rowTotal: 2000,
			rowList : [20,30,70],
			loadonce:true,
			mtype: "GET",
			ignoreCase:true,
			gridview: true,
			pager: '#ptoolbar',
			sortname: 'prof_name',
			viewrecords: true,
			sortorder: "asc",
			onSelectRow: function(id){
		$.ajax({
			  url: 'expanded.php?id='+id,
			  success: function(data) {

			    
			    $("#data").html(data);
			    $("#hidden-href").hide();
			    
			    $("a#single_image").trigger('click');
			    
			  }
			});
				},
						
				
				caption: "Click on the project for details "	
			});

			$("#toolbar").trigger("reloadGrid");
			jQuery("#toolbar").jqGrid('navGrid','#ptoolbar2',{del:false,add:false,edit:false,search:false});
			jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
			 
 
    }


	function format(cellvalue, options, rowObject){
		rowid=options['rowId'];
		if(cellvalue=='1'){
		return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1' selected='selected'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select>";
		}
		else if(cellvalue=='2'){
			return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1' >1</option><option value='2' selected='selected'>2</option><option value='3'>3</option><option value='4'>4</option></select>";
		}
		else if(cellvalue=='3'){
			return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1'>1</option><option value='2'>2</option><option value='3'  selected='selected'>3</option><option value='4'>4</option></select>";
		}
		else if(cellvalue=='4'){
			return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1'>1</option><option value='2'>2</option><option value='3' >3</option><option value='4' selected='selected'>4</option></select>";
		}
			
		else
		{
			return "<select name='projectid-"+rowid+"' class='preference'><option value='0' selected='selected' ></option><option value='1'>1</option><option value='2'>2</option><option value='3'  >3</option><option value='4'>4</option></select>";
		};
	}
	
    </script>

</head>


<?php/*
session_start();
require_once("functions.php");
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(ldap_auth($username,$password)){
	$_SESSION['ldap_id']=$username;
	header("location: apply.php");
}
}

	*/
?>


<body id="body1">
<div class="container">
  <div class="page-header">
    <h1>Preferences | <a href="index.php">SURP</a><small> Summer Undergraduate Research Program</small></h1>
</div></div>
    <div style="width: 95%; margin: auto;" class="wrapper container-fluid">
	      
	<div style="font:14px;">
	<a href="preferences.php" class="btn btn-primary btn-large">My preferences/info</a> </td>
      <a href="register.php" class="btn btn-primary btn-large">Update Registration Info</a>
	<br><strong>You can apply for projects in any department unless stated otherwise. You can update your preferences until the deadline 18th April(11:59PM). You will be allocated projects (as per your preference order) by 20th April.</strong>
	<br>For any doubts you may drop a mail to Sunny Soni <a 
href="mailto:isaa.enpower@gmail.com">isaa.enpower@gmail.com</a>
	<br><br>You can give preference from 1 to 4(1 being highest) to any four(or less) projects with no same preference to same project. 
	<br>If you want to update, then fill all the preferences again and press submit.
	<br>If you still find the project in your preference table then set its priority 0.<br>
<h4>NOTE : In case of any error refresh page and fill all the preferences again. Press submit button after filling all the preferences. Verify your preferences by pressing "My preferences" button. <br> Please ensure that after filling the preferences you verify them in the My Preferences tab and fill individual SOP for each entry. Failing to do so, your entry shall be considered null or invalid.</h4>	
</div>
<table>
		<tr><td><input  type="button" class="btn btn-primary btn-large" id="type1" value="Projects"></td>	
			
		</tr>	
	</table>
	<br>
	<div style="width: 90%; margin: auto;" id="table1">
	<?php 
        // $alldepartments = DepartmentFindAll();
         
         echo "Project Department: <select name='department' id='choose-dep'>";
         foreach ($alldepartments as $key=>$value){
	if ($value['value']!=$mydepartment){
		
	echo "<option value='" . $value['value']. "'>".$value['department']. " " . $value['value'] . "</option>";
	}
	else{ 
		echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";
	}	
	}
echo "</select>";
echo "<br>Please change the dept. to start.";

         ?>
<div id="info">
<table id="toolbar"></table>
<div id="ptoolbar" ></div>
</div>

<a id="single_image" href="#data"></a>

<div id="hidden-href">
<div id="data"></div>
</div>
<br>
</div>



<a id="single_image2" href="#data2"></a>

<div id="hidden-href2">
<div id="data2"></div>
</div>
</div>
<table align="center"><tr>
	<td>	<input style="margin-left:50%;" type="button" class="btn btn-primary btn-large" id="check" value="Submit"> </td>

	<td>	 <a style="margin-left:50%;" href="apply.php?logout=true" class="btn btn-primary btn-large">Logout</a> </td>
</table>
<br>
</div>

</div>
<br>
<br>


         
       
			 
		
    
</body>
</html>

