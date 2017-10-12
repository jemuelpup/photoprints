<?php

switch($_POST['process']){
	case "AddCategory": {
		insertCategory();
	}break;
	case "AddItem":{
		insertItem();
	}break;
	case "AddPosition":{
		insertPosition();
	}break;
	case "AddBranch":{
		insertBranch();
	}break;
}

/****************************************************************************
	Database operations
*/
function insertCategory(){
	$d = $_POST['data'];
	$sql = "INSERT INTO category_tbl (name,category_code,description) VALUES ('".getFieldValue($d,'name')."','".getFieldValue($d,'category_code')."','".getFieldValue($d,'description')."')";
	echo $sql;
}

// edit the mpdified by:
function insertItem(){
	$d = $_POST['data'];
	$sql = "INSERT INTO item_tbl (name,code,category_fk,modified_by_fk,price) VALUES ('".getFieldValue($d,'name')."','".getFieldValue($d,'code')."',".getFieldValue($d,'category_fk').","."1".",".getFieldValue($d,'price').")";
	echo $sql;
}

function insertPosition(){
	$d = $_POST['data'];
	$sql = "INSERT INTO position_tbl (name,description) VALUES ('".getFieldValue($d,'name')."','".getFieldValue($d,'description')."')";
	echo $sql;
}

function insertBranch(){
	$d = $_POST['data'];
	$sql = "INSERT INTO branch_tbl (name,address,description,code) VALUES ('".getFieldValue($d,'name')."','".getFieldValue($d,'address')."','".getFieldValue($d,'description')."','".getFieldValue($d,'code')."')";
	echo $sql;
}

function insertEmployee(){
	$d = $_POST['data'];
	$sql = "INSERT INTO employee_tbl (name,address,contact_number,email,position_fk,branch_fk,salary,birth_day,gender) VALUES ('".getFieldValue($d,'name')."','".getFieldValue($d,'address')."','".getFieldValue($d,'contact_number')."','".getFieldValue($d,'email')."',".getFieldValue($d,'position_fk').",".getFieldValue($d,'branch_fk').",".getFieldValue($d,'salary').",'".getFieldValue($d,'birth_day')."',".getFieldValue($d,'gender').")";
	echo $sql;
}
function updateEmployee(){
	$d = $_POST['data'];
	$employeeID = $_POST['id'];
	$sql = "UPDATE employee_tbl SET name = '".getFieldValue($d,'name')."',address = '".getFieldValue($d,'address')."',contact_number = '".getFieldValue($d,'contact_number')."',email = '".getFieldValue($d,'email')."',position_fk = ".getFieldValue($d,'position_fk').",branch_fk = ".getFieldValue($d,'branch_fk').",salary = ".getFieldValue($d,'salary').",birth_day = ".getFieldValue($d,'birth_day').",gender = ".getFieldValue($d,'gender')." WHERE id = $employeeID";
	echo $sql;
}
/**************************************************************************/

/*
@param
$d - serialize array value from jquery
$name - name of the field
*/
function getFieldValue($d,$name){
	foreach($d as $data){
		if($data["name"]==$name){
			return $data["value"];
		}
	}
}

?>

