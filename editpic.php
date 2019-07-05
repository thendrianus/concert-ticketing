<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $ticket_id = mysqli_real_escape_string($conn, $_POST['ticket_id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    global $conn;

	$q2 = 'SELECT t1.id, t1.name, t2.name as "pic" FROM ticket t1 INNER JOIN pic t2 on t1.user_id = t2.id WHERE t1.telp = "'.$telp.'" AND t1.id <> '.$ticket_id.' ';

	$result = $conn->query($q2);

	$json_response = array();

	while($r = mysqli_fetch_assoc($result)) {
		$json_response[] = $r;
    }
    
    if(count($json_response) > 0){
        $data = array("error"=> 'No telp sudah ada atas nama PIC "'.$json_response[0]['name'].'/id '.$json_response[0]['id'].'" yang dimasukkan oleh Admin "'.$json_response[0]['pic'].'"', "ticket_id"=> '');
        echo json_encode($data);
    }else{
        $sql = "UPDATE ticket SET name= '$name', telp = '$telp', description = '$description', update_dt= DATE_ADD(NOW(), INTERVAL 11 HOUR) WHERE id = '$ticket_id'";

        if ($conn->query($sql) === TRUE) {
    
            $data = array("success"=> 'PIC berhasil di dirubah');
            echo json_encode($data);
        
        }else {
            $data = array("error"=> 'Error PIC gagal di rubah', "ticket_id"=> '');
            echo json_encode($data);
        }
    }

?>