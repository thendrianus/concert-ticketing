<?php

	include('connection.php');

	header('Access-Control-Allow-Origin: *');

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $ticket_id = mysqli_real_escape_string($conn, $_POST['ticket_id']);
    $ticket_detail_id = mysqli_real_escape_string($conn, $_POST['ticket_detail_id']);
    $ticket_type = mysqli_real_escape_string($conn, $_POST['ticket_type']);
    $is_active = mysqli_real_escape_string($conn, $_POST['is_active']);

    global $conn;

    $where = "";
    if($is_active == 0){
        $where = " AND is_active = 0";
    }
    $sql = "UPDATE ticket_".$ticket_type." SET name= '$name', telp = '$telp', ticket_id = '$ticket_id', update_dt= DATE_ADD(NOW(), INTERVAL 11 HOUR), is_active= 1 WHERE id = '$ticket_detail_id' ".$where." ";

    if ($conn->query($sql) === TRUE) {

        if($is_active == 0){
            if($conn->affected_rows > 0){
                $sql = "UPDATE ticket SET ticket_qty= ticket_qty+1, update_dt= DATE_ADD(NOW(), INTERVAL 11 HOUR) WHERE id = '$ticket_id'";

                if ($conn->query($sql) === TRUE) {
            
                    $data = array("success"=> 'Ticket berhasil di dirubah');
                    echo json_encode($data);
                
                }else {
                    $data = array("error"=> 'Error Ticket gagal di rubah', "ticket_id"=> '');
                    echo json_encode($data);
                }
            }else{
                $data = array("error"=> 'Error Ticket yang di cancel sudah di gunakan oleh admin lain. silahkan clear form dan pilih canceled ticket yang lain', "ticket_id"=> '');
                echo json_encode($data);
            }
        }else{
            $data = array("success"=> 'Ticket berhasil di dirubah');
            echo json_encode($data);
        }
    
    }else {
        $data = array("error"=> 'Error Ticket gagal di rubah', "ticket_id"=> '');
        echo json_encode($data);
    }

?>