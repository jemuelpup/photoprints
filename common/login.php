<?php


function startSession($employeeID){
	session_start();
	$_SESSION["employeeID"] = $employeeID;
}


function login(){
	$sql = "
	SELECT e.position_fk, e.id
	FROM access_tbl a, employee_tbl e
	WHERE a.active=1 AND a.username='jemuel' AND a.password='123' AND a.employee_id_fk=e.id";
}


?>