<?php

    include('connection.php');

    header('Access-Control-Allow-Origin: *');

    global $conn;
    
    $total = 0;

    $sql = 'SELECT
        count(t1.id) as "aaa"
        FROM ticket_1 t1 INNER JOIN ticket t2 ON t1.ticket_id = t2.id WHERE t1.is_active = 1 AND t1.name NOT LIKE "%WL%"' ;

    $query=mysqli_query($conn, $sql);

    $str = "";
    while( $row=mysqli_fetch_array($query) ) {  
    
        $str = "Total pendaftar gratis adalah :<b>".$row["aaa"]."</b> <br>";
        $total += intval($row["aaa"]);
    }

    echo $str;
    
    $sql = 'SELECT
        count(t1.id) as "aaa"
        FROM ticket_1 t1 INNER JOIN ticket t2 ON t1.ticket_id = t2.id WHERE t1.is_active = 1 AND t1.name LIKE "%WL%"' ;

    $query=mysqli_query($conn, $sql);

    $str = "";
    while( $row=mysqli_fetch_array($query) ) {  
    
        $str = "Total Waiting List gratis adalah :<b>".$row["aaa"]."</b> <br>";
    }

    echo $str;
    
    $sql = 'SELECT
        count(t1.id) as "aaa"
        FROM ticket_1 t1 INNER JOIN ticket t2 ON t1.ticket_id = t2.id WHERE t1.is_active = 0 AND t1.name NOT LIKE "%WL%"' ;

    $query=mysqli_query($conn, $sql);

    $str = "";
    while( $row=mysqli_fetch_array($query) ) {  
    
        $str = "Total Cancel Ticket gratis adalah :<b>".$row["aaa"]."</b> <br>";
    }

    echo $str;
    
    $sql = 'SELECT
        count(t1.id) as "aaa"
        FROM ticket_2 t1 INNER JOIN ticket t2 ON t1.ticket_id = t2.id WHERE t1.is_active = 1 AND t1.name NOT LIKE "%WL%"' ;

    $query=mysqli_query($conn, $sql);

    $str = "";
    while( $row=mysqli_fetch_array($query) ) {  
    
        $str = "Total Ticket VVIP adalah :<b>".$row["aaa"]."</b> <br>";
        $total += intval($row["aaa"]);
    }

    echo $str;
    
    $sql = 'SELECT
        count(t1.id) as "aaa"
        FROM ticket_3 t1 INNER JOIN ticket t2 ON t1.ticket_id = t2.id WHERE t1.is_active = 1 AND t1.name NOT LIKE "%WL%"' ;

    $query=mysqli_query($conn, $sql);

    $str = "";
    while( $row=mysqli_fetch_array($query) ) {  
    
        $str = "Total Ticket VIP adalah :<b>".$row["aaa"]."</b> <br>";
        $total += intval($row["aaa"]);
    }

    echo $str;

    echo "<b> Total Hadir: ".$total." </b> <br>";
    
    $total = 2400 -$total;
    echo "<b> Total Slot Kosong: ".$total." </b>";
?>
