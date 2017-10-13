<?php
require 'dbconnect.php';
// create require field for modified by field
// echo date("Y-m-d",$t);
// include "dbconnect.php";
switch($_POST['process']){
	case "AddCategory": {
		insertCategory($conn);
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
	case "AddEmployee": {
		insertEmployee();
	}break;
	case "EditCategory": {
		updateCategory($conn);
	}break;
}

/****************************************************************************
	Database operations
*/


/* INSERT */
function insertCategory($c){
	$d = $_POST['data'];
	$sql = "INSERT INTO category_tbl (name,category_code,description) VALUES ('".getFieldValue($d,'name')."','".getFieldValue($d,'category_code')."','".getFieldValue($d,'description')."')";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
	echo $msg;
}

// edit the modified by:
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

/* UPDATE */
function updateCategory($c){
	$d = $_POST['data'];
	$sql = "UPDATE category_tbl SET name = '".getFieldValue($d,'name')."',category_code = '".getFieldValue($d,'category_code')."',description = '".getFieldValue($d,'description')."' WHERE id = ".getFieldValue($d,'id')."";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
	// echo $sql;
	// echo $msg;
}
function updateItem(){
	$id = $_POST['id'];
	$d = $_POST['data'];
	$sql = " WHERE id = $id";
	echo $sql;
}
function updatePosition(){
	$id = $_POST['id'];
	$d = $_POST['data'];
	$sql = " WHERE id = $id";
	echo $sql;
}
function updateBranch(){
	$id = $_POST['id'];
	$d = $_POST['data'];
	$sql = " WHERE id = $id";
	echo $sql;
}
function updateEmployee(){
	$d = $_POST['data'];
	$id = $_POST['id'];
	$sql = "UPDATE employee_tbl SET name = '".getFieldValue($d,'name')."',address = '".getFieldValue($d,'address')."',contact_number = '".getFieldValue($d,'contact_number')."',email = '".getFieldValue($d,'email')."',position_fk = ".getFieldValue($d,'position_fk').",branch_fk = ".getFieldValue($d,'branch_fk').",salary = ".getFieldValue($d,'salary').",birth_day = ".getFieldValue($d,'birth_day').",gender = ".getFieldValue($d,'gender')." WHERE id = $id";
	echo $sql;
}

/* DELETE */
function deleteCategory(){
	
	$sql = "UPDATE category_tbl SET date_modified = NOW(),modified_by_fk = 1,active = 0 WHERE id = $id";


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

