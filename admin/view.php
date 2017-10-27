<?php
/* This file contains the elements for viewing */

require $_SERVER['DOCUMENT_ROOT'].'/common/dbconnect.php';
// 

$process="";

if(isset($_POST['process'])){
	$process = $_POST['process'];
}
else{
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$process = $request->process;
}

switch($process){
	case "getItems":{
		selectItem($conn);
	}break;
	case "getItemCategory":{
		selectItemCategory($conn);
	}break;
	case "getBranches":{
		selectBranch($conn);
	}break;
	case "getPositions":{
		selectPosition($conn);
	}break;
	case "getEmployees":{
		selectEmployee($conn);
	}break;
}

/*
	QUERY AREA
*/

// selectItemCategory($conn);
function selectItemCategory($c){
	$sql = "SELECT id,name,category_code,description FROM category_tbl";
	print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
}

/* This function needs some edit*/
function selectItem($c){
	$sql = "SELECT id,name,item_code,category_fk,date_modified,price FROM item_tbl";
	print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
}

function selectBranch($c){
	$sql = "SELECT id,name,address,description,branch_code FROM branch_tbl";
	print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
}

function selectPosition($c){
	$sql = "SELECT id,name,description FROM position_tbl";
	print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
}

function selectEmployee($c){
	$sql = "SELECT id,name,address,contact_number,email,position_fk,branch_fk,salary,date_modified,active,birth_day,gender FROM employee_tbl";
	print_r(hasRows($c,$sql) ? json_encode(selectQuery($c,$sql)) : "");
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
