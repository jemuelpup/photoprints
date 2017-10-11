<?php

echo "dumaan sa functions.php";
switch($_POST['process']){
	case "AddCategory": {
		insertCategory();
	}break;
}

function insertCategory(){
	$d = $_POST['data'];
	print_r( $d );
	echo getFieldValue($d,"name");
}

function getFieldValue($d,$name){
	foreach($d as $data){
		print_r( $data );
		if($data["name"]==$name){
			echo "Pumasok sa if";
			print_r( $data );
			return $data["value"];
		}
	}
}

?>