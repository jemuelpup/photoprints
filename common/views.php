<?php
		
	require $_SERVER['DOCUMENT_ROOT'].'/common/dbconnect.php';

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$process = $request->process;

	switch($process){
		case "getItems":{
			selectItem($conn);
		}break;
		case "getCategories":{
			selectCategory($conn);
		}break;
		case "getCategoriesAndItems":{
			selectCategoriesAndItems($conn);
		}break;
	}

	/* This function needs some edit*/
	function selectItem($c){
		$sql = "SELECT id,name,item_code,category_fk,date_modified,price FROM item_tbl";
		print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
	}
	function selectCategory($c){
		$sql = "SELECT id,name FROM `category_tbl` WHERE 1";
		print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
	}
	function selectCategoriesAndItems($c){
		$sql = "SELECT i.id, i.name, i.item_code, i.category_fk, i.price, c.name as category_name FROM item_tbl i, category_tbl c WHERE i.active = 1 and i.category_fk = c.id ORDER BY category_fk,id";
		print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
	}
	function selectUnclaimedOrders(){
		$sql = "";
	}


/*
	FUNCTIONS AREA
*/
// get the rows of the query
function selectQuery($c,$sql){
	$resultSetArray = [];
	$res = $c->query($sql);
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			array_push($resultSetArray,$row);
		}
		return $resultSetArray;
	}
	return "";
}
// check if query produces output
function hasRows($c,$sql){
	$res = $c->query($sql);
	if($res->num_rows>0){
		return true;
	}
	return false;
}
?>