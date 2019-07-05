<?php

    include('../connection.php');

    header('Access-Control-Allow-Origin: *');

    global $conn;

    $requestData= $_REQUEST;

    $columns = array( 
        0 =>'id', 
        1 => 'name',
        2 => 'PIC_name',
        3 => 'PIC_TELP',
        4 => 'telp',
        5 => 'update_dt',
        6 => 'is_active'
    );

    $sql = 'SELECT
        t1.id,
        t1.name,
        t2.name as "PIC_name",
        t2.telp as "PIC_TELP",
        t1.telp,
        t1.update_dt,
        t1.is_active
        FROM ticket_1 t1 INNER JOIN ticket t2 ON t1.ticket_id = t2.id WHERE t1.is_active = 1' ;

    $query=mysqli_query($conn, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    if( !empty($requestData['search']['value']) ) {  

        $sql.="  AND concat(t1.name,'-', t1.telp)  LIKE '%".$requestData['search']['value']."%' ";

    }

    $query=mysqli_query($conn, $sql);

    $totalFiltered = mysqli_num_rows($query); 
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

    $query=mysqli_query($conn, $sql);

    $count = 0;
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  
        $nestedData=array(); 

        $count+=1;

        $nestedData[] = $count;
        $nestedData[] = "GCBF".sprintf("%04d", $row["id"]);
        $nestedData[] = $row["name"];
        $nestedData[] = $row["telp"];
        $nestedData[] = $row["PIC_name"];
        $nestedData[] = $row["PIC_TELP"];
        $nestedData[] = $row["update_dt"];
        $nestedData[] = $row["is_active"];
        
        $data[] = $nestedData;
    }

    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),
        "recordsTotal"    => intval( $totalData ),  
        "recordsFiltered" => intval( $totalFiltered ), 
        "data"            => $data   
    );

    echo json_encode($json_data); 

?>
