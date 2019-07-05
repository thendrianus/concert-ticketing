<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

    $ticket_id = mysqli_real_escape_string($conn, $_POST['ticket_id']);

	global $conn;
	
	$q2 = 'SELECT * FROM ticket WHERE id = "'.$ticket_id.'" LIMIT 1';

	$result = $conn->query($q2);

	$json_response = array();

	while($r = mysqli_fetch_assoc($result)) {
		$json_response[] = $r;
	}

	echo json_encode($json_response);

?>