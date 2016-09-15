// JavaScript Document
$(function(){
	    var pageName = (function () {
        var a = window.location.href,
            b = a.lastIndexOf("/");
        return a.substr(b + 1);
   		 }());
/*--- Tata steel careers about ---*/
		var pageNamearray1 = ["about-us.aspx"]
	    for(i=0;i<pageNamearray1.length;i++){
		if(pageName == pageNamearray1[i]){
		$("#nav > li:nth-child(1)").addClass('navActive');
		
		}
	}	
/*--- what-we-do ---*/
		var pageNamearray2 = ["what-we-do.aspx"]
	    for(i=0;i<pageNamearray2.length;i++){
		if(pageName == pageNamearray2[i]){
		$("#nav > li:nth-child(2)").addClass('navActive');
		}
	}	
	/*--- life-tata-steel ---*/
		var pageNamearray3 = ["life-tata-steel.aspx"]
	    for(i=0;i<pageNamearray3.length;i++){
		if(pageName == pageNamearray3[i]){
		$("#nav > li:nth-child(3)").addClass('navActive');
		}
	}	
/*--- Join Us ---*/
		var pageNamearray4 = ["opportunities.aspx","openings.aspx"]
	    for(i=0;i<pageNamearray4.length;i++){
		if(pageName == pageNamearray4[i]){
		$("#nav > li:nth-child(4)").addClass('navActive');
		
		}
	}	
/*---33333---*/
		var pageNamearray5 = ["events.php"]
	    for(i=0;i<pageNamearray5.length;i++){
		if(pageName == pageNamearray5[i]){
		$("#nav > li:nth-child(5) > a").addClass('navActive');
		}
	}	
/*---33333---*/
		var pageNamearray6 = ["work-with-us.php","current-openings.php","apply-now.php"]
    	for(i=0;i<pageNamearray6.length;i++){
		if(pageName == pageNamearray6[i]){
		$("#nav > li:nth-child(6) > a").addClass('nav-active');
		}
	}		
/*---connect-with-us.aspx---*/
		var pageNamearray7 = ["connect-with-us.aspx"]
	    for(i=0;i<pageNamearray7.length;i++){
		if(pageName == pageNamearray7[i]){
		$("#nav > li:nth-child(7)").addClass('navActive');
		$(".cont-left ul > li:eq("+i+")").addClass('subactive');
		}
	}		
})


