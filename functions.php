<?php

echo "dumaan sa functions.php";
switch($_POST['process']){
	case "AddCategory": {
		insertCategory();
	}break;
}

//UPDATE category_tbl SET name = '$name',category_code = '$category_code',description = '$description'

function insertCategory(){
	$d = $_POST['data'];
	

	$sql = "INSERT INTO category_tbl (name,category_code,description) VALUES ('".getFieldValue($d,'name')."','".getFieldValue($d,'category_code')."','".getFieldValue($d,'description')."')";

	echo $sql;
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

?>

