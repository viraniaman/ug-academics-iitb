<?php
session_start();
	require_once("functions.php");
	if (!(isset($_SESSION['ldap_id']))){
		header("location: index.php");
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
	$email=$info[0]["mail"][0];
	$alternate_email=$info[0]['mailforwardingaddress'][0];
	$year = explode('/',$info[0]["mailmessagestore"][0]);
	$year_of_study=2012-$year[2];
	//$all_projects=get_department_projects($mydepartment);
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<html>
	<head>
	<title>ISPA Apply</title>
 <!--<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js"></script>-->
	<script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
   
	<!--<script src="js/jquery-ui.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <!--<script src="js/jquery-1.9.1.js" type="text/javascript"></script>-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />
 	<!--<link rel="stylesheet" type="text/css" media="screen" href="js/jquery-ui.css" />-->
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<style>
.ui-jqgrid tr.jqgrow td {
    white-space: normal !important;
}
</style>
    <script>
    $(document).ready(function(){
	$("a#single_image").fancybox();
		var department = '<?php echo $mydepartment; ?>';
		var username = '<?php echo $_SESSION['ldap_id'];?>';
		
		$("#check").click(function(){
	
		var count_1=0;
		var count_2=0;
		var count_3=0;
		var err=0;
		
		var preference_1="preference-1";
		var preference_2="preference-2";
		var preference_3="preference-3";
		
		
		$(".preference").each(function(i){
			val = $(this).val();
			
			
			if (val==1){
				preference_1=$(this).attr('name');
				
				count_1+=1;
			}
			if (val==2){
				preference_2=$(this).attr('name');
				count_2+=1;
			}
			if (val==3){
				preference_3=$(this).attr('name');
				count_3+=1;
			}
			
			
		});
	
		if (count_1<=0){
		 alert("Please choose  Preference 1 ");
		 err=1;
		 
		}
		else if (count_1>1){
			alert("Preference 1 is selected more than once");
			err=1;
			}
		/*else if (count_2<=0){
		 alert("Please choose  Preference 2 ");
		 err=1;
		 
		}*/
		else if (count_2>1){
			alert("Preference 2 is selected more than once");
			err=1;
			}
		/*else if (count_3<=0){
		 alert("Please choose  Preference 3 ");
		 err=1;
		 
		}*/
		else if (count_3>1){
			alert("Preference 3 is selected more than once");
			err=1;
			}
		else if (count_2<=0 && count_3>1){
			alert("Preference 2 not specified");
			err=1;
		}
			
	 if (err==0){
		 $.ajax({
			type: 'POST',
			url: 'savedata.php',
			data : "user="+username+"&department="+department+"&preference_1="+preference_1+"&preference_2="+preference_2+"&preference_3="+preference_3,
			success:function(){alert("Your preferences have been saved");},
            		error: function(jqXHR, textStatus, thrownError) {
				alert("err "+thrownError+" "+textStatus+" "+jqXHR.responseText);
			      }
			});
	 }
		//return err; 
		
	
		});
		
		
		
		jQuery("#toolbar").jqGrid({
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
			
	
	caption: "ISPA Projects(CLick on a row to expand)"	
});

jQuery("#toolbar").jqGrid('navGrid','#ptoolbar',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});

$("#choose-dep").change(function(){
			department=$(this).val();
			//jQuery("#toolbar").jqGrid().setGridParam({url : 'projects.php?department='+department}).trigger("reloadGrid");
			gridSearch(department);
			
		
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
			
	
	caption: "ISPA Projects(Click on a row to expand)"	
});

$("#toolbar").trigger("reloadGrid");
jQuery("#toolbar").jqGrid('navGrid','#ptoolbar2',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
 
 
    }
	function format(cellvalue, options, rowObject){
		rowid=options['rowId'];
		if(cellvalue=='1'){
		return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1' selected='selected'>1</option><option value='2'>2</option><option value='3'>3</option></select>";
	}
	if(cellvalue=='2'){
		return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1' >1</option><option value='2' selected='selected'>2</option><option value='3'>3</option></select>";
	}
	if(cellvalue=='3'){
		return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1'>1</option><option value='2'>2</option><option value='3'  selected='selected'>3</option></select>";
	}
		
		else
		{
			return "<select name='projectid-"+rowid+"' class='preference'><option value='0' selected='selected' ></option><option value='1'>1</option><option value='2'>2</option><option value='3'  >3</option></select>";
		}
		
		//alert(rowObject[0]);
	}
	
    </script>

</head>


<?php
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

	
?>


<body id="body1">


    <div class="container-fluid">
	      <div class="page-header">
		  <h1>ISPA</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Institute Summer Project Allocation</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li><a href="index.php">Home</a></li>
		   <li class="active"><a href="login.php">Apply</a></li>
		  <li><a href="#">Updates/Results</a></li>
		  <li><a href="ISPA_2013.pdf">Rule Book</a></li>
		  <li><a href="contacts.php">Contact</a></li>
		  </ul>
	<div style="font:14px;">
	You can update your preferences until the deadline. Few more projects might be added by <b>26th April</b>. You are advised to check the portal again on that date. For any doubts you may drop a mail to Keshav Kumar <a href="mailto:isaa.enpower@gmail.com">isaa.enpower@gmail.com</a>
<br/>	<br/>
<strong>* Please fill the preference form for various categories of projects here:
<a href="https://docs.google.com/forms/d/1SkSQjnv4ydvor6jACTL0KTpSehKJUJJe4Q2SkK5lBgY/viewform" target="_blank">Preference form</a><br/>
* Your application will be not considered if you fail to do this.</strong>
	</br></br>
	</div>



	<?php 
        // $alldepartments = DepartmentFindAll();
         
         echo "<select name='department' id='choose-dep'>";
         foreach ($alldepartments as $key=>$value){
	if ($value['value']!=$mydepartment){
		
	echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
	}
	else {
		echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";}
	
		
}
echo "</select>";

         ?>
<div id="info">
<table id="toolbar"></table>
<div id="ptoolbar" ></div>
</div>

<a id="single_image" href="#data"></a>

<div id="hidden-href">
<div id="data"></div>
</div>

<br/>
<table align="center"><tr>
	<td>	<input style="margin-left:50%;" type="button" class="btn btn-primary btn-large" id="check" value="Submit"> </td>

	<td>	 <a style="margin-left:50%;" href="login.php?logout=true" class="btn btn-primary btn-large">Logout</a> </td>
</table>
<br/>
		</div>

</div>



         
       
			 
		
    
</body>
</html>


