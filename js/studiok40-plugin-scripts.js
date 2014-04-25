// JavaScript Document

// Toggle Function
jQuery(function($){
    $(document).ready(function(){ 
         $(".toggle_container").hide();
         $("h3.trigger").click(function(){
        $(this).toggleClass("active").next().slideToggle("normal");
        return false; //Prevent the browser jump to the link anchor
    });
    }); // END <------ $(document).ready --------->
}); // END <------ jQuery(function($) ---------->




// Clearing Default Field Values with jQuery for Gravity forms
jQuery(document).ready(function() {
	jQuery.fn.cleardefault = function() {
	return this.focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}

	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});
};

jQuery(".clear_input input, .clear_input textarea").cleardefault();
});