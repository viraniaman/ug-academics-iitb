// JavaScript Document
$(document).ready(function(){
	
	
	 
$('#title').flowtype({  minFont   : 12,  maxFont   : 60,  fontRatio : 19,  lineRatio : 2 }); 
$('#hone').flowtype({  minFont   : 9,  maxFont   : 40,  fontRatio : 25,  lineRatio : 1.5 }); 
$('#htwo').flowtype({  minFont   : 9,  maxFont   : 40,  fontRatio : 25,  lineRatio : 1.5 }); 
$('#hthree').flowtype({  minFont   : 9,  maxFont   : 40,  fontRatio : 25,  lineRatio : 1.5 }); 
$('#hfour').flowtype({  minFont   : 9,  maxFont   : 40,  fontRatio : 25,  lineRatio : 1.5 }); 
$('#hfive').flowtype({  minFont   : 9,  maxFont   : 40,  fontRatio : 25,  lineRatio : 1.5 });
 
 $('.hone').flowtype({  minFont   : 9,  maxFont   : 50,  fontRatio :19,  lineRatio : 2 });
 $('.htwo').flowtype({  minFont   : 9,  maxFont   : 50,  fontRatio :19,  lineRatio : 2 });
 $('.hthree').flowtype({  minFont   : 9,  maxFont   : 50,  fontRatio :19,  lineRatio : 2 });
 
$('#pone').flowtype({  minFont   : 7,  maxFont   : 20,  fontRatio : 20,  lineRatio : 2 });
$('#ptwo').flowtype({  minFont   : 7,  maxFont   : 20,  fontRatio : 20,  lineRatio : 2 });
$('#pthree').flowtype({  minFont   : 7,  maxFont   : 20,  fontRatio : 20,  lineRatio : 2 });
$('#pfour').flowtype({  minFont   : 7,  maxFont   : 20,  fontRatio : 20,  lineRatio : 2 });
$('#pfive').flowtype({  minFont   : 7,  maxFont   : 20,  fontRatio : 20,  lineRatio : 2 });
$('#psix').flowtype({  minFont   : 7,  maxFont   : 20,  fontRatio : 20,  lineRatio : 2 });

$('#copyright').flowtype({  minFont   : 7,  maxFont   : 20,  fontRatio : 20,  lineRatio : 2 });


$('.pgac').flowtype({  minFont   : 7,  maxFont   : 40,  fontRatio : 51,  lineRatio : 2 });
	mainmenu();
	rajediv();
	
	
	
	
	$(".rajmain .rajleft").hover(function() {
		$(this).parent(".rajmain").css("background","#CCFF66").fadeIn('slow');
		
		$(this).siblings(".rajright").css("display","block");
		$(this).children("p.chide").css("display","block");
		// Set the color by using the class name from the box when hovering
		
	}, function() {
		// Reset the color when the hover is done
		$(this).parent(".rajmain").css("background","");
		$(this).siblings(".rajright").css("display","none");
		$(this).children("p.chide").css("display","none");
	});
	
		
	});
	

function mainmenu(){
$(" .pgac ul ").css({display: "none"}); // Opera Fix
$(" .pgac li").hover(function(){
$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400);
},function(){
$(this).find('ul:first').slideUp(400);



var x;
 setInterval(function() {
 if(x == 0) {
 $('.blinking_text').removeAttr('style');
 x = 1;
} else  {
 if(x = 1) {
 $('.blinking_text').css('color', 'red');
  x = 0;
}
 }
}, 500); // change the time if you want




})};
