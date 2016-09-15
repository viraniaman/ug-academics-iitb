function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}
var open=false;

$(function(){
    $('#side-lines').live('click',function(){
        if(!open){
            $('#side-header').animate({ "margin-left": "+=225px" }, "slow" );
            open = true;
        }
        // else {
        //     $('#side-header').animate({ "left": "-=225px" }, "slow" );
        //     open = false;
        // }
    });
});
$("html").click(function(){
    if(open){
        $('#side-header').animate({ "margin-left": "-=225px" }, "slow" );
        open = false;
        // alt = false;
    }
});

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54892211-2', 'auto');
  ga('send', 'pageview');
