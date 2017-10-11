$(document).ready(function(){
/*
	Navigation buttons
*/
	$(".product-management-btn").click(function(){
		hideAll();
		$(".product-management").show();
	});
	$(".employee-management-btn").click(function(){
		hideAll();
		$(".employee-management").show();
	});
	$(".buisness-management-btn").click(function(){
		hideAll();
		$(".buisness-management").show();
	});
	hideAll();
	function hideAll(){
		$(".product-management,.employee-management,.buisness-management").hide();
	}
/********************************************/
/*
	Materialize codes
*/	
	// $('.modal').modal();
/********************************************/
/*
	Employee table
*/
	$(".employee-list tr").click(function(){
		$(".employee-list tr.active").removeClass("active");
		$(this).toggleClass("active");
	});
});
