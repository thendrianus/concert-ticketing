<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $ticket_id = mysqli_real_escape_string($conn, $_POST['ticket_id']);
	$ticket_type = mysqli_real_escape_string($conn, $_POST['ticket_type']);

    global $conn;

    $sql = "UPDATE ticket_".$ticket_type." SET name= CONCAT('Canceled Ticket ', name), update_dt= DATE_ADD(NOW(), INTERVAL 11 HOUR), is_active= 0 WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {

        $sql = "UPDATE ticket SET ticket_qty= ticket_qty-1, update_dt= DATE_ADD(NOW(), INTERVAL 11 HOUR) WHERE id = '$ticket_id'";

        if ($conn->query($sql) === TRUE) {
    
            $data = array("success"=> 'Ticket berhasil di hapus');
        echo json_encode($data);
        
        }else {
            $data = array("error"=> 'Error Ticket gagal di hapus', "ticket_id"=> '');
            echo json_encode($data);
        }
    
    }else {
        $data = array("error"=> 'Error Ticket gagal di hapus', "ticket_id"=> '');
        echo json_encode($data);
    }

?>