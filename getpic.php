<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

	global $conn;
	
	$q2 = 'SELECT * FROM pic';

	$result = $conn->query($q2);

	$json_response = array();

	while($r = mysqli_fetch_assoc($result)) {
		$json_response[] = $r;
	}

	echo json_encode($json_response);

?>