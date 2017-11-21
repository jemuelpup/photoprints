<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
// $process = $request->process;
$data = $request->data;

login($data->username,$data->password);

// login("jemuel","123");

function startSession($employeeID,$position){
	session_start();
	$_SESSION["employeeID"] = $employeeID;
	$_SESSION["position"] = $position;
}

function login($userName,$uPass){
	require $_SERVER['DOCUMENT_ROOT'].'/common/dbconnect.php';
	// echo $uPass."ito yun";
	$sql = "SELECT e.position_fk, e.id
	FROM access_tbl a, employee_tbl e
	WHERE a.active=1 AND a.username='$userName' AND a.password='$uPass' AND a.employee_id_fk = e.id";
	// echo  $sql;
	$res = $conn->query($sql);
	$sesID = null;
	$position = null;
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$sesID = $row["id"];
			$position = $row["position_fk"];
		}
	}
	// echo $sesID;
	startSession($sesID,$position);
	print_r(json_encode($_SESSION));
}




?>