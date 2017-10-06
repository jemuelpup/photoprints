<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "employeemgmttemp";
	$data = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT `id`, `name`, `employeeNum`, `division`, `client`, `salary`, `civilStatus`, `dependent`, `active`, `hire_date`, `regularization_date`, `employmentStatus` FROM `employee_tbl` WHERE 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$data .= '{"id":'.$row["id"].',"name":"'.$row["name"].'","employeeNum":"'.$row["employeeNum"].'"},';
	    }
	}
	$data = rtrim($data,",");
	// $data = '{"data":['.$data.']}';
	$data = '['.$data.']';
	echo "$data";
	$conn->close();
