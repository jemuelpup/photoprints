<?php
/* This file contains the elements for viewing */

require 'dbconnect.php';
// 
switch($_POST['process']){
	case "getItemCategoryTable":{
		selectItemCategory($conn);
	}break;
}

/* SELECT 
function selectItemCategory($c){
	$sql = "SELECT id,name,category_code,description FROM category_tbl";
	$code = "";
	$res = $c->query($sql);
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$code .= "<tr data-id='".$row["id"]."'>
			<td name=".$row["name"].">".$row["name"]."</td>
			<td name=".$row["category_code"].">".$row["category_code"]."</td>
			<td name=".$row["description"].">".$row["description"]."</td></tr>";
		}
	}
	echo "$code";
}
*/

function selectItemCategory($c){
	$sql = "SELECT id,name,category_code,description FROM category_tbl";
	$code = "";
	$res = $c->query($sql);
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$code.="<tr data-id='".$row["id"]."'>
			<td name='name'>".$row["name"]."</td>
			<td name='category_code'>".$row["category_code"]."</td>
			<td name='description'>".$row["description"]."</td></tr>";
		}
	}
	echo $code;
}


?>
