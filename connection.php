<?php

//    $servername = "type-script.net";
    $username = "typescri";
    $password = "quovadis2014";
    $dbname = "typescri_concertticket";
 $servername = "127.0.0.1";
    // $username = "root";
    // $password = "Passw0rd";
    // $dbname = "gcdtiket";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>