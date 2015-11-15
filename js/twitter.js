

$(document).ready(function(){

	//Hide (Collapse) the toggle containers on load
	$(".toggle_content").hide(); 

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$("h4.toggle_title").click(function(){
		$(this).toggleClass("toggle_active").next().slideToggle("slow");
		return false; //Prevent the browser jump to the link anchor
	});

});


jQuery(document).ready(function() {
								jQuery(".tabs_container").each(function(){
		jQuery("ul.tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	jQuery(".mini_tabs_container").each(function(){
		jQuery("ul.mini_tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	jQuery.tools.tabs.addEffect("slide", function(i, done) {
		this.getPanes().slideUp();
		this.getPanes().eq(i).slideDown(function()  {
			done.call();
		});
	});


								});