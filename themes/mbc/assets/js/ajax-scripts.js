jQuery.noConflict($);
/* Ajax functions */
jQuery(document).ready(function($) {

//onclick
$("#loadMore").on('click', function(e) {
	e.preventDefault();
	//init
	var that = $(this);
	var page = $(this).data('page');
	var newPage = page + 1;
	var ajaxurl = that.data('url');
	
	//ajax call
	$.ajax({
	    url: ajaxurl,
	    type: 'post',
	    data: {
	        page: page,
	        action: 'ajax_script_load_more'
	
	    },
	    beforeSend: function ( xhr ) {
	      $('#ajxaloader1').show();
	    },
	    error: function(response) {
	        console.log(response);
	    },
	    success: function(response) {
	        //check
	        if (response == 0) {
	            $('#ajxaloader1').hide();
	            $('#loadMore').hide();
	        }else{
	   			function post_load(){
	             	$('#ajxaloader1').hide();
		            that.data('page', newPage);
		            $('#ajax-content').append(response.substr(response.length-1, 1) === '0'? response.substr(0, response.length-1) : response);
	            }
	            setTimeout(post_load,2500);

	        }
	    }
	});
});


//onclick
$("#tag_loadMore").on('click', function(e) {
	e.preventDefault();
	//init
	var that = $(this);
	var page = $(this).data('page');
	var newPage = page + 1;
	var ajaxurl = that.data('url');
	var tag_slug = $('#tag_slug').data('slug');
	
	//ajax call
	$.ajax({
	    url: ajaxurl,
	    type: 'post',
	    data: {
	        page: page,
	        slug: tag_slug,
	        action: 'tag_ajax_script_load_more'
	
	    },
	    beforeSend: function ( xhr ) {
	      $('#ajxaloader1').show();
	    },
	    error: function(response) {
	        console.log(response);
	    },
	    success: function(response) {
	        //check
	        if (response == 0) {
	            $('#ajxaloader1').hide();
	            $('#tag_loadMore').hide();
	        }else{
	   			function post_load(){
	             	$('#ajxaloader1').hide();
		            that.data('page', newPage);
		            $('#ajax-content').append(response.substr(response.length-1, 1) === '0'? response.substr(0, response.length-1) : response);
	            }
	            setTimeout(post_load,2500);

	        }
	    }
	});
});
});