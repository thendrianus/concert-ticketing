<?php

    include('connection.php');

    header('Access-Control-Allow-Origin: *');

    global $conn;

    $sql = 'SELECT
        t1.id,
        t1.name,
        t2.name as "PIC_name",
        t2.telp as "PIC_TELP",
        t1.telp,
        t1.update_dt,
        t1.is_active
        FROM ticket_1 t1 INNER JOIN ticket t2 ON t1.ticket_id = t2.id WHERE t1.is_active = 1 AND t1.ticket_id = 8' ;

    $query=mysqli_query($conn, $sql);

    $count = 0;
    $str = "";
    while( $row=mysqli_fetch_array($query) ) {  

        $count+=1;

        $str .= "".$count.". ".$row["name"]."(GCBF".sprintf("%04d", $row["id"]).")<br>";
    }

    echo $str;

?>
