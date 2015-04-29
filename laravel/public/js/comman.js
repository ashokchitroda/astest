$(document).ready(function(){
    $( ".action" ).live("click", function(event) {
	    
        var action = $( this ).attr('href') || $( this ).parents('form').attr('action');
        var method = (($( this ).attr('href'))? 'GET' : $( this ).parents('form').attr('method')) || 'GET';
        var data = (($( this ).attr('href'))? '' : $( this ).parents('form').serialize()) || '';
    	//alert(action); alert(method); alert(data);
    		if(typeof action != 'undefined') { 	
		    	 $.ajax({
		    		url: action,
		    	  	type: method,
		    	  	data: data,
		    	  	dataType: "html",
		    	  	async: false,
		    	  	success: function(data) {
		    			$('.content').html(data);
		    	  	}
		    	}); 
    		}
		return false;    	
    });
});    