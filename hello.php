<?php


?>
<script type="text/javascript" src="libraries/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">

(function($){
    $.fn.extend({ 
        //plugin name - animatemenu
        animateMenu: function(options) {
 
            var defaults = {
                animatePadding: 60,
                defaultPadding: 10,
                evenColor: '#ccc',
                oddColor: '#eee'
            };
             
            var options = $.extend(defaults, options);
         
            return this.each(function() {
                  var o =options;
                  var obj = $(this);                
                  var items = $("li", obj);
                   
                  $("li:even", obj).css('background-color', o.evenColor);               
                  $("li:odd", obj).css('background-color', o.oddColor);                   
                   
                  items.mouseover(function() {
                      $(this).animate({paddingLeft: o.animatePadding}, 300);
                     
                  }).mouseout(function() {
                      $(this).animate({paddingLeft: o.defaultPadding}, 300);
                     
                  });
            });
        }
    });
})(jQuery);

/*
 * making the simple function 
 */
 (function( $ ){

	  $.fn.myPlugin = function(options) {
	  
	    // there's no need to do $(this) because
	    // "this" is already a jquery object

	    // $(this) would be the same as $($('#element'));
	        
	    this.fadeOut('slow', function(){

	      // the this keyword is a DOM element

	    });
	    alert(options.name);

	  };
	})( jQuery );


/*
 * tooltip function 
 */


 (function( $ ){

	  $.fn.tooltip = function( options ) {  

	    // Create some defaults, extending them with any options that were provided
	    var settings = $.extend( {
	      'location'         : 'top',
	      'background-color' : 'blue'
	    }, options);

	    return this.each(function() {        

	      // Tooltip plugin code here
	     v=document.createElement("div");
	     v.setAttribute("style","background-color: blue");
	      console.log(v);
		$(this).append(v);
	    });

	  };
	})( jQuery );
	

$(document).ready(function(){

	//$('#menu').animateMenu({animatePadding: 30, defaultPadding:10});
	$("#fader").tooltip();
	
});

</script>
<p id="fader"> I'm goon fade in</p>

<p>newly Added</p>


