

jQuery( document ).ready(function( $ ) {
    $('.allCategories').DataTable({
		"oLanguage": {
			"oPaginate": {
	 	        "sFirst": "<<",
	 	        "sLast": ">>",
	 	        "sNext": ">",
	 	        "sPrevious": "<"
	 	    },
	       	"sLengthMenu": "Show Rows_MENU_",
		   	"sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
    		"sInfoEmpty": "Showing 0 to 0 of 0 entries",
			"sInfoFiltered": " ",
	   }
	});
});
