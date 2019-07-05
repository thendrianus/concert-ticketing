<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $followup = mysqli_real_escape_string($conn, $_POST['followup']);

    global $conn;

    $sql = "UPDATE ticket SET followup= '$followup', update_dt= DATE_ADD(NOW(), INTERVAL 11 HOUR) WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {

        $data = array("success"=> 'Data telah berhasil di update');
        echo json_encode($data);
    
    }else {
        $data = array("error"=> 'Error gagal update database', "ticket_id"=> '');
        echo json_encode($data);
    }

?>