$(document).ready(function(){
/*
	Variables:
*/
	var itemId = 0; // this is the active item in the table


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
	Database Operations
*/
// EDIT TRIGGERS
$("#edit-category-trigger").click(function(){
	var activeRow = $(".category-list-table table tr.active");
	itemId = activeRow.attr("data-id");
	if(itemId){
		$(activeRow.children("td")).each(function(e){
			$('#edit-category input[name="'+$(this).attr('name')+'"]').val($(this).text())
			console.log($(this).attr('name'));
		});
		$('#edit-category').modal('open');
	}
	else{ alert("Select item category"); }
});
// FOR EDITTING
$(".edit-category form").submit(function(e){
	e.preventDefault();

	var d = $(this).serializeArray();
	d.push({name:"id",value:itemId});// get the id... add to serialize array...
	init();
	dbOperations("EditCategory",d,function(){displayDataInTable()});
	$('#edit-category').modal('close');
});


/**/
	// FOR ADDING
	$(".category form").submit(function(e){
		e.preventDefault();
		dbOperations("AddCategory",$(this).serializeArray());
	});
	$(".item form").submit(function(e){
		e.preventDefault();
		dbOperations("AddItem",$(this).serializeArray());
	});
	$(".position form").submit(function(e){
		e.preventDefault();
		dbOperations("AddPosition",$(this).serializeArray());
	});
	$(".branch form").submit(function(e){
		e.preventDefault();
		dbOperations("AddBranch",$(this).serializeArray());
	});
/**/


// FOR DELETING

/********************************************/
/*
	System Operations
*/
// This function highlight the row selected
$(".data-clickable tr").click(function(){
	if($(this).index()!=0){
		if($(this).hasClass("active")){
			$(this).removeClass("active");
		}
		else{
			$(this).parent().children().removeClass("active");
			$(this).addClass("active");
		}
	}
});
// This function pass data to php file that handles database recording
function dbOperations(processName,dataInputs){
	$.post("functions.php",
	{
		process: processName,
		data: dataInputs
	},
	function(data,status){
		console.log(status);
		console.log(data);
	});
}
function dbOperations(processName,dataInputs,callback){
	$.post("functions.php",
	{
		process: processName,
		data: dataInputs
	},
	function(data,status){
		console.log(status);
		console.log(data);
		callback();
	});
}
/********************************************/
/*
	Materialize codes
*/	
	$('.modal').modal();
/********************************************/


	


});
