<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $ticket_id = mysqli_real_escape_string($conn, $_POST['ticket_id']);
    $ticket_type = mysqli_real_escape_string($conn, $_POST['ticket_type']);

    global $conn;

    $sql = "INSERT INTO ticket_".$ticket_type." ( name, telp, ticket_id, is_active, update_dt)VALUES('$name','$telp','$ticket_id', 1 ,DATE_ADD(NOW(), INTERVAL 11 HOUR))";

    if ($conn->query($sql) === TRUE) {

        $insertedid = $conn->insert_id;

        $sql = "UPDATE ticket SET ticket_qty= ticket_qty+1, update_dt= DATE_ADD(NOW(), INTERVAL 11 HOUR) WHERE id = '$ticket_id'";

        if ($conn->query($sql) === TRUE) {
    
            $data = array("success"=> 'Ticket berhasil di tambahkan', "ticket_id"=> $insertedid);
            echo json_encode($data);
        
        }else {
            $data = array("error"=> 'Error Tiket gagal di tambahkan', "ticket_id"=> '');
            echo json_encode($data);
        }
    
    }else {

        $data = array("error"=> 'Error Tiket gagal di tambahkan', "ticket_id"=> '');
        echo json_encode($data);

    }

?>