<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="shortcut icon" href="img/icon.png"/>

<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<title>bookBay</title>

	
	<link rel="stylesheet" type="text/css" media="screen" href="themes/redmond/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="themes/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="themes/ui.multiselect.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-responsive.min.css" />

    <link rel="stylesheet" href="themes/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="img/favicon.png">
	<script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
  <script>
    $(document).ready(function(){
		
		jQuery("#toolbar").jqGrid({
   	url:'deleteset.php',
	datatype: "json",
	height: 255,
	width: 600,
	autowidth: true,
   	colNames:['Book Name','Semester Used', 'Course', 'Cost','Tags','Delete'],
   	colModel:[
   		{name:'book_name',index:'book_name', width:100, sorttype:'text'},
   		
   		{name:'sem_used',index:'semester_used', width:50, sorttype: 'int'},
   		{name:'course',index:'course', width:50, sorttype:'text'},
   		{name:'cost',index:'cost', width:50,sorttyoe:'int'},
   		{name:'tags',index:'tags', width:100,sorttype:'text'},
   		{name:'Delete',index:'delete', width:50,formatter:deleteformatter}
   		
   	],
   	rowNum:50,
	rowTotal: 2000,
	rowList : [20,30,50],
	loadonce:true,
   	mtype: "GET",
	rownumbers: true,
	rownumWidth: 40,
	gridview: true,
   	pager: '#ptoolbar',
   	sortname: 'item_id',
    viewrecords: true,
    sortorder: "asc",
    onSelectRow: function(id){
		$.ajax({
  url: 'related_stuff.php?id='+id,
  success: function(data) {
    //$('.result').html(data);
    //alert(
    $("#data").html(data);
    $("#hidden-href").hide();
    //alert(data);
    $("a#single_image").trigger('click');
    
  }
});
	},
	
	caption: "Delete My Books"	
});

jQuery("#toolbar").jqGrid('navGrid','#ptoolbar',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
jQuery("#toolbar").showCol('subgrid');


	});
	
	function deleteformatter(cellvalue, options, rowObject){
		rowid=options['rowId'];
		button = "<input type='button' id='delete1' class='delete-button' onClick='deletebook("+String(rowid)+")' value='Delete' >";
		return button;
	}
	function deletebook(id){
		var username = '<?php echo $_SESSION['ldap_id'];?>';
		var r=confirm("Delete Book?");
	if (r==true)
	{
		$.ajax({
			type: "POST",
			url: "deletebooks.php",
			data: "username="+username+"&rowid="+id
			}).done(function( msg ) {
				alert( "Data Saved: " + msg );
				$('#toolbar').jqGrid('GridUnload');	
				jQuery("#toolbar").jqGrid({
   	url:'deleteset.php',
	datatype: "json",
	height: 255,
	width: 600,
	autowidth: true,
   	colNames:['Book Name','Semester Used', 'Course', 'Cost','Tags','Delete'],
   	colModel:[
   		{name:'book_name',index:'book_name', width:100, sorttype:'text'},
   		
   		{name:'sem_used',index:'semester_used', width:50, sorttype: 'int'},
   		{name:'course',index:'course', width:50, sorttype:'text'},
   		{name:'cost',index:'cost', width:50,sorttyoe:'int'},
   		{name:'tags',index:'tags', width:100,sorttype:'text'},
   		{name:'Delete',index:'delete', width:50,formatter:deleteformatter}
   		
   	],
   	rowNum:50,
	rowTotal: 2000,
	rowList : [20,30,50],
	loadonce:true,
   	mtype: "GET",
	rownumbers: true,
	rownumWidth: 40,
	gridview: true,
   	pager: '#ptoolbar',
   	sortname: 'item_id',
    viewrecords: true,
    sortorder: "asc",
    onSelectRow: function(id){
		$.ajax({
  url: 'related_stuff.php?id='+id,
  success: function(data) {
    //$('.result').html(data);
    //alert(
    $("#data").html(data);
    $("#hidden-href").hide();
    //alert(data);
    $("a#single_image").trigger('click');
    
  }
});
	},
	
	caption: "Delete My Books"	
});
			});
  }
	}
    </script>
    </head>


<body>
<?php include_once("analytics.php");?>

<div class="container-fluid">
  <div class="row-fluid" id="topbar">
    <div class="span11" id="outer">
    <a href="#" id="logo"><img src="img/title1.png" /></a>
    <a href="http://gymkhana.iitb.ac.in/~ugacademics/" style="margin-right:20px;text-decoration:none;float:right;"><img src="img/logo.png" width="80"></a>
    <h3>Buy and sell your old books online with bookBay. </h3>
    </div>
  </div>
<div id="main1" class="row-fluid">

<table id="toolbar"></table>
<div id="ptoolbar" ></div>
<a id="single_image" href="#data"></a>

<div id="hidden-href">
<div id="data"></div>
</div>
</div>

<aside class="sidebar big-sidebar right-sidebar navigationbar">
  <ul>  
    <li class="color-bg">
      <ul class="blocklist">
        <li><a href="view.php">Search</a></li>
        <li><a href="add.php">Add Book</a>
        <li class="active"><a href="delete.php">Delete Book</a></li>
        <li><a href="index.php?logout=true">Logout</a></li> 
    </li>
  </ul>
</aside>

</div>



</body>
</html>
