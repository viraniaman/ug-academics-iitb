function deleteRow(buttonObj){
	$(buttonObj).closest("tr").remove();
}
function deleteProject(buttonObj){
	$(buttonObj).closest(".panel").remove();
}
function deletePersonal(buttonObj){
	$(buttonObj).parent().parent().siblings().remove();
	$(buttonObj).remove();
	$("#personal button").show();
}

function addSkillsData(obj){
	input = $('<tr><td class="col-md-4"><div class="input-group" style="width:100%"><textarea rows="2" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control"></textarea></td><td class="col-md-7"><div class="input-group" style="width:100%"><textarea rows="2" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control"></textarea></td><td class="col-md-1"><button class="btn btn-default" onclick="deleteRow(this);" type="button">-</button></td></tr>');
	$(obj).parent().prev().append(input);
}

function addCoursesData(obj){
	input = $('<tr><td><div class="input-group" style="width:100%"><textarea rows="2" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control"></textarea></td><td><div class="input-group" style="width:100%"><textarea rows="2" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control"></textarea></td><td><button class="btn btn-default" onclick="deleteRow(this);" type="button">-</button></td></tr>');
	$(obj).parent().prev().append(input);
}
function addPersonalData(obj){
	input = $('<tr><td><textarea rows="1" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control md-input" placeholder="Name"></textarea></td><td><textarea rows="1" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control md-input" placeholder="Email"></textarea></td></tr><tr><td><textarea rows="1" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control md-input" placeholder="Homepage"></textarea></td></tr><tr><td><button class="btn btn-danger" onclick="deletePersonal(this);">Remove</button></td></tr>');
	$(obj).hide();
	$(obj).parent().prev().append(input);
}

function addSubData(obj){
	input = $('<tr><td><div class="input-group"><textarea rows="2" data-hidden-buttons="cmdHeading,cmdUrl,cmdImage,cmdCode,cmdList,cmdList0,cmdQuote" data-provide="markdown-editable" class="form-control"></textarea>       <span class="input-group-btn">        <button class="btn btn-default" onclick="deleteRow(this);" type="button">-</button>      </span></div></td></tr>');
	$(obj).parent().prev().append(input);
}
function reorder(sObj){
	$(sObj).parent().insertBefore($(sObj).parent().prev());
}
// function addItem(obj){
// 	input = $('<tr><td><div class="input-group"><input type="text" class="form-control">        <span class="input-group-btn">        <button class="btn btn-default" type="button">-</button>      </span></div></tr></td>');
// 	$("#"+id).append(input);
// }
function addProject(id){
	input = $('<div class="panel panel-info subData"><table class="table"><tr><td><input type="text" class="form-control" placeholder="Title eg.ITC Ltd"></td><td width="50%"><input type="text" class="form-control" placeholder="Duration eg. Summer 2014"></td></tr><tr><td ><input type="text" class="form-control" placeholder="Sub Heading eg. Guide: Mr. Singh"></td></tr></table><div><button class="btn btn-default" onclick="addSubData(this);" type="button">Add Description</button><button class="btn btn-danger pull-right" onclick="deleteProject(this);">Remove</button></div></div>');
	$("#"+id).append(input);	
}

function fillData(){
	
}
function init(){
	$(".data").hide();
	$("#"+active).show();
	$("#A"+active).addClass("active");	
}
$(document).ready(function(){ 	
	init();
	fillData();
    $(".sideBar a").click(function(){
    	var aid = this.id;
    	var id = aid.substring(1);
    	$("#"+active).hide();
    	$("#A"+active).removeClass("active");    	
    	$("#"+id).show();
    	$(this).addClass("active");
    	active = id;
    });
});


function getSkills(){
	var skillObj = {};
	var no = 1;
	var topic = "";
	$("#skill table tr td .form-control").each(function(){
		if (no%2==0){
			skillObj[topic] = $(this).val();
		}
		else {
			topic = $(this).val();
		}
		no++;
	});	
	return skillObj;
}

function getCourses(){
	var courseObj = [];
	$("#course table tr td .form-control").each(function(){
		courseObj.push($(this).val());
	});	
	return courseObj;
}

function getPersonal(){
	var personalObj = {};
	var args = ["name", "email", "homepage"];
	$("#personal table tr td .form-control").each(function(index){
		personalObj[args[index]] = $(this).val();
	});	
	return personalObj;
}

function getOrder(){
	order = [];
	$(".sideBar a").each(function(){
		var id = $(this).attr("id").substring(1);
		order.push(id);
	});
	return order;
}

function getType1(id){
	var Obj = [];
	$("#"+id+" table tr .form-control").each(function(){
		Obj.push($(this).val());
	});	
	return Obj;
}

function getType2(id){
	var internshipObj = [];
	$("#"+vars[index]+" table").each(function(index){
		var projectObj = {};
		var inputs = $(this).find("input");
		var description = [];
		var texts = $(this).find("textarea");

		$(inputs).each(function(index){
			var str = $(this).val();
			if(index == 0)
				projectObj["title"] = str;
			else if(index == 1)
				projectObj["duration"] = str;
			else if(index ==  2)
				projectObj["subtitle"] = str;	
		});
		$(texts).each(function(index){
			var str = $(this).val();				
			description.push(str);
		});	
		projectObj["description"] = description;
		internshipObj.push(projectObj);
	});	
	return internshipObj;
}

function generateJson(){
	var dataObj = new Object();

	dataObj["scholastic"] = getType1("scholastic");
	dataObj["extra"] = getType1("extra");

	vars = ["internship", "project", "por"];
	for (index in vars){
		dataObj[vars[index]] = getType2(vars[index]);
	}

	dataObj["order"] = getOrder();
	dataObj["personal"] = getPersonal();
	dataObj["skill"] = getSkills();
	dataObj["course"] = getCourses();
	return JSON.stringify(dataObj);
}

function OpenInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}

function postJson(){
	var json = generateJson();
	//var json = JSON.stringify(getPersonal());
	alert(json);
	$.ajax({
	    type: "GET",
	    //url: "./process.php",
	    //data: json,
	    url:"./process.php?json="+encodeURIComponent(JSON.stringify(json)),
	    contentType: "application/json; charset=utf-8",
	    dataType: "json",
	    success: function(data){
	    	OpenInNewTab("./JSONS/"+ldap+".pdf");
	    },
	    failure: function(errMsg) {
	        alert(errMsg);
	    },
	    error:function(error){
	    	alert(error);
	    }
	});
}