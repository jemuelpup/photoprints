<?php

session_start();
require $_SERVER['DOCUMENT_ROOT'].'/common/dbconnect.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$process = $request->process;
$data = $request->data;

switch($process){
	case "addOrder":{
		insertOrder($conn,$data);
	}break;
	case "orderPaid":{
		updateOrder($conn,$data);
	}break;
	case "getID":{
		getSessionId($conn,$data);
	}break;
	case "getAccessPosition":{
		getAccessPosition($conn,$data);
	}
}

function updateOrder($c,$d){
	$cashier = $_SESSION["employeeID"];
	$sql = "UPDATE order_tbl SET cashier_fk = $cashier,payment = ".validateData($d->cash).",received_date = NOW() WHERE id = ".validateData($d->id)."";
	echo $sql;
	return 
	$msg = ($c->query($sql) === TRUE) ? "Setting order paid success" : "Error: " . $sql . "<br>" . $c->error;
}

function insertOrder($c,$d){
	$operator = $_SESSION["employeeID"];
	$sql = "INSERT INTO order_tbl (order_date,cashier_fk,branch_fk,operator_fk,total_amount,customer_name,down_payment) VALUES (NOW(),".validateData($d->cashier_fk).",".validateData($d->branch_fk).",".$operator.",".validateData($d->total_amount).",'".validateData($d->customer_name)."',".validateData($d->down_payment).")";

	if (mysqli_query($c, $sql)) {
		$order_id = mysqli_insert_id($c);
		$sql2 = "INSERT INTO order_line_tbl (order_id_fk,item_id_fk,name,code,quantity,price,discount,multiplyer,description) VALUES";
		foreach ($d->items as $item) {
			$sql2 .= " (".validateData($order_id).",".validateData($item->itemID).",'".validateData($item->itemName)."','".validateData($item->code)."',".validateData($item->quantity).",".validateData($item->price).",".validateData($item->discount).",".validateData($item->multiplyer).",'".validateData($item->desc)."'),";
		}

		$sql2 = rtrim($sql2,',');
		$c->query($sql2);
	}
}

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

function getSessionId(){
	$id = isset($_SESSION["employeeID"]) ? $_SESSION["employeeID"] : 0;
	echo $id;
}

function getAccessPosition(){
	$accessPosition = isset($_SESSION["position"]) ? $_SESSION["position"] : 0;
	echo $accessPosition;
}

function changeTheValue($value){
	$jsonString = file_get_contents('/operations.json');
	$data = json_decode($jsonString, false);
	$data[0]['hasChanges'] = $value;
	$newJsonString = json_encode($data);
	file_put_contents('/operation.json', $newJsonString);
}

?>