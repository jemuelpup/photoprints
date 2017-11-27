<?php
require $_SERVER['DOCUMENT_ROOT'].'/common/dbconnect.php';

$process="";
$data = "";

if(isset($_POST['process'])){
	$process = $_POST['process'];
}
else{
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$process = $request->process;
	$data = $request->data;
}

switch($process){
	case "AddCategory": {
		insertCategory($conn,$data);
	}break;
	case "AddItem":{
		insertItem($conn,$data);
	}break;
	case "AddPosition":{
		insertPosition($conn,$data);
	}break;
	case "AddBranch":{
		insertBranch($conn,$data);
	}break;
	case "AddEmployee": {
		insertEmployee($conn,$data);
	}break;
	case "AddAccess": {
		insertAccess($conn,$data);
	}break;
	case "EditEmployee": {
		updateEmployee($conn,$data);
	}break;
	case "EditCategory": {
		updateCategory($conn);
	}break;
	case "EditItem": {
		updateItem($conn,$data);
	}break;
	case "RemoveEmployee":{
		deleteEmployee($conn,$data);
	}break;
	case "RemoveItem":{
		deleteItem($conn,$data);
	}break;
}

/****************************************************************************
	Database operations
*/


/* INSERT */
function insertCategory($c,$d){
	$sql = "INSERT INTO category_tbl (name,category_code,description) VALUES ('".$d->name."','".$d->category_code."','".$d->description."')";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
}

function insertItem($c,$d){
	$sql = "INSERT INTO item_tbl (name,item_code,category_fk,modified_by_fk,price) VALUES ('".$d->name."','".$d->code."',".$d->category.","."1".",".$d->price.")";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
}

function insertPosition($c,$d){
	$sql = "INSERT INTO position_tbl (name,description) VALUES ('".$d->name."','".$d->description."')";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
}

function insertBranch($c,$d){
	$sql = "INSERT INTO branch_tbl (name,address,description,branch_code) VALUES ('".$d->name."','".$d->address."','".$d->description."','".$d->branch_code."')";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
}

function insertEmployee($c,$d){
	// print_r($d);
	$sql = "INSERT INTO employee_tbl (name,address,contact_number,email,position_fk,branch_fk,salary,birth_day,gender) VALUES ('".validateData($d->name)."','".validateData($d->address)."','".validateData($d->contact_number)."','".validateData($d->email)."',".validateData($d->position_fk).",".validateData($d->branch_fk).",".validateData($d->salary).",'".validateDate($d->birth_day)."',".validateData($d->gender).")";
	// echo "$sql";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
}

function insertAccess($c,$d){
	$sql = "INSERT INTO access_tbl (employee_id_fk,username,password) VALUES (".validateData($d->id).",'".validateData($d->username)."','".validateData($d->password)."')";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
}

/* UPDATE */
function updateEmployee($c,$d){
	$sql = "UPDATE employee_tbl SET name = '".validateData($d->name)."',address = '".validateData($d->address)."',contact_number = '".validateData($d->contact_number)."',email = '".validateData($d->email)."',position_fk = ".validateData($d->position_fk).",branch_fk = ".validateData($d->branch_fk).",salary = ".validateData($d->salary).",birth_day = '".validateDate($d->birth_day)."',gender = ".validateData($d->gender)." WHERE id = ".validateData($d->id)."";
	// echo "$sql";
	
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
}

function updateCategory($c){
	$d = $_POST['data'];
	$sql = "UPDATE category_tbl SET name = '".getFieldValue($d,'name')."',category_code = '".getFieldValue($d,'category_code')."',description = '".getFieldValue($d,'description')."' WHERE id = ".getFieldValue($d,'id')."";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
	// echo $sql;
	// echo $msg;
}

function updateItem($c,$d){
	$sql = "UPDATE item_tbl SET name = '".validateData($d->name)."',item_code = '".validateData($d->item_code)."',category_fk = ".validateData($d->category_fk).",price = ".validateData($d->price)." WHERE id = ".validateData($d->id)."";
	echo "$sql";
	$msg = ($c->query($sql) === TRUE) ? "Adding new Category success" : "Error: " . $sql . "<br>" . $c->error;
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


/* DELETE */
function deleteCategory(){
	$sql = "UPDATE category_tbl SET date_modified = NOW(),modified_by_fk = 1,active = 0 WHERE id = $id";
	echo $sql;
}
function deleteItem($c,$d){
	$id = $d->id;
	$sql = "UPDATE item_tbl SET active = 0 WHERE id = $id";
	// // echo "$sql";
	$msg = ($c->query($sql) === TRUE) ? "Deleting employee success" : "Error: " . $sql . "<br>" . $c->error;
}

function deleteEmployee($c,$d){
	$id = $d->id;
	$sql = "UPDATE employee_tbl SET active = 0 WHERE id = $id";
	// echo "$sql";
	$msg = ($c->query($sql) === TRUE) ? "Deleting employee success" : "Error: " . $sql . "<br>" . $c->error;
}

/**************************************************************************/

function validateData($d){
	if(isset($d)){
		return $d;
	}
	return "";
}
function validateDate($d){
	if(isset($d)){
		return date("Y-m-d", strtotime(str_replace('/', '-',$d)));
	}
	return "0000-00-00";
}



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
// function getFieldValue2($d,$name){
// 	foreach($d as $data){
// 		if($data["name"]==$name){
// 			return $data["value"];
// 		}
// 	}
// }

?>

