var parent = $('#toggle-view'), // storing main ul for use below
    delay = 200; // storing delay for easier configuration

// bind the click to all headers
$('li h3', parent).click(function() {
    
    // get the li that this header belongs to
    var li = $(this).closest('li');
    //alert(li.id);
    
    // check to see if this li is not already being displayed
    if (!$('p', li).is(':visible'))
    {
        // loop on all the li elements
        $('li', parent).each(function() {
            
            // slide up the element and set it's marker to '+' 
            $('p', $(this)).slideUp(delay);
            $('span', $(this)).text('+');
        });
    
        // display the current li with a '-' marker
        $('p', li).slideDown(delay);
        $('span', li).text('-');
    }
    else {
        $('p', li).slideUp(delay);
        $('span', li).text('+');  
    }
});