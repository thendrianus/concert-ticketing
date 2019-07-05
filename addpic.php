<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    global $conn;

	$q2 = 'SELECT t1.id, t1.name, t2.name as "pic" FROM ticket t1 INNER JOIN pic t2 on t1.user_id = t2.id WHERE t1.telp = "'.$telp.'" ';

	$result = $conn->query($q2);

	$json_response = array();

	while($r = mysqli_fetch_assoc($result)) {
		$json_response[] = $r;
    }
    
    if(count($json_response) > 0){
        $data = array("error"=> 'No telp sudah ada atas nama PIC "'.$json_response[0]['name'].'/id '.$json_response[0]['id'].'" yang dimasukkan oleh Admin "'.$json_response[0]['pic'].'"', "ticket_id"=> '');
        echo json_encode($data);
    }else{
        $sql = "INSERT INTO ticket ( user_id, name, telp, ticket_qty, description, update_dt)VALUES('$user_id','$name','$telp', 0 ,'$description',DATE_ADD(NOW(), INTERVAL 11 HOUR))";

        if ($conn->query($sql) === TRUE) {
    
            $data = array("success"=> 'PIC berhasil di tambahkan', "ticket_id"=> $conn->insert_id);
            echo json_encode($data);
        
        }else {
            $data = array("error"=> 'Error PIC gagal di tambahkant', "ticket_id"=> '');
            echo json_encode($data);
        }
    }

?>