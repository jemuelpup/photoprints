<?php

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
}

function updateOrder($c,$d){
	$sql = "UPDATE order_tbl SET payment = ".validateData($d->total_amount).",received_date = NOW() WHERE id = ".validateData($d->id)."";
	$msg = ($c->query($sql) === TRUE) ? "Setting order paid success" : "Error: " . $sql . "<br>" . $c->error;
}

function insertOrder($c,$d){
	// $d = $_POST['data'];
	// print_r($data);

	$sql = "INSERT INTO order_tbl (order_date,cashier_fk,branch_fk,operator_fk,total_amount,customer_name) VALUES (NOW(),".validateData($d->cashier_fk).",".validateData($d->branch_fk).",".validateData($d->operator_fk).",".validateData($d->total_amount).",'".validateData($d->customer_name)."')";

	if (mysqli_query($c, $sql)) {
		$order_id = mysqli_insert_id($c);
		// create query here for transaction



		$sql2 = "INSERT INTO order_line_tbl (order_id_fk,item_id_fk,name,code,quantity,price,discount,multiplyer) VALUES";
		foreach ($d->items as $item) {
			$sql2 .= " (".validateData($order_id).",".validateData($item->itemID).",'".validateData($item->itemName)."','".validateData($item->code)."',".validateData($item->quantity).",".validateData($item->price).",".validateData($item->discount).",".validateData($item->multiplyer)."),";
			# code...
		}

		$sql2 = rtrim($sql2,',');
		// echo $sql2;
		$c->query($sql2);
		// mysqli_multi_query($c, $sql);
	}
	
	// echo $d->items->


	// echo $sql;
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

?>