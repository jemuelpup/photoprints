
init();
displayDataInTable();
function displayDataInTable(){
	$.post("view.php",{ process: "getItemCategoryTable" },
	function(data,status){
		// console.log(data);
		$(".category-list-table table tbody").append(data);
	});
}

function init(){
	$(".category-list-table table tbody tr td").parent().remove();
}