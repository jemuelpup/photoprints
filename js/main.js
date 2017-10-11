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
	// hideAll();
	function hideAll(){
		$(".product-management,.employee-management,.buisness-management").hide();
	}
/********************************************/
/*
	Operations
*/
$(".category form").submit(function(e){
	e.preventDefault();
	console.log("dumaan dito");
	var dataInputs = $( this ).serializeArray();
	// console.log(dataInputs);
	$.post("functions.php",
	{
		process: "AddCategory",
		data: dataInputs
	},
	function(data,status){
		console.log(status);
		console.log(data);
	});
	
});
/********************************************/
/*
	Materialize codes
*/	
	$('.modal').modal();
/********************************************/
/*
	Employee table
*/
	$(".employee-list tr").click(function(){
		$(".employee-list tr.active").removeClass("active");
		$(this).toggleClass("active");
	});
});
