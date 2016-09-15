// JavaScript Document
function restructure(){
	//$('#slidingNav').height($(window).height());	
	
	$('#nav').clone().appendTo('#slidingNav');
	$('#slidingNav').find('#nav').attr('id','mobileNav').addClass('mobileNav');
	
	}// restructure end

function contbannerresize(){
	var findmargin = $('.contBanner img').width()>$(window).width()?$('.contBanner img').width()-$(window).width():$(window).width()-$('.contBanner img').width();
$('.contBanner img').width()>$(window).width()?$('.contBanner img').css('margin-left','-'+findmargin/2+'px'):$('.contBanner img').css('margin-left',findmargin/2+'px');
	}//contbannerresize
	
	
$(function(){
	$('body').prepend("<div id='slidingNav' style='display:none'></div>");
	
	
	
$('#nav > li').hover(function(){
	if($(this).find('ul').length>0){
	  $(this).find('ul').slideDown();
	 // alert('a');
	}else{
		//alert('n');
		}
	},function(){
	  $('#nav li ul').slideUp(200);	
	  });
	
	
	
	restructure();
	$('#slidingNavBtn').click(function(){
		//$("#slidingNav").mCustomScrollbar();
         $("#slidingNav").slideToggle();
             
      });
	

contbannerresize()	
$(window).resize(function(){
	$('#slidingNav').remove();
	$('body').prepend("<div id='slidingNav' style='display:none'></div>");
	restructure();
	contbannerresize();
	});


var mobli = $('#mobileNav li').length
 
 //$('#mobileNav li').slice(0, 3).wrapAll("<div class='wrap' />");
  //$('#mobileNav li').slice(4).wrapAll("<div class='wrap' />");
 
 $('#relatedsiteLink').click(function(e) {
     $('.relatedsite > div').slideToggle();
	 return false
 	 });
 

});


$(window).load(function(){
	contbannerresize();
	})


$(document).ready(function(){	

var totop = $('#totop');
totop.click(function(){
 $('html, body').stop(true,true).animate({scrollTop:0}, 1000);
 return false;
});

$(window).scroll(function(){
 if ($(this).scrollTop() > 100){ 
  totop.fadeIn();
 }else{
  totop.fadeOut();
 }
});
});	

// for customize scrollbar//////////

/*(function($){
			
			$(window).load(function(){
				
				$("#slidingNav").mCustomScrollbar({
					theme:"minimal",
					scrollButtons:{
						enable:false
					}
				});
			
				
			});
		})(jQuery);	*/
// for customize scrollbar//////////
