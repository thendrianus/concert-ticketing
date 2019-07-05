<?php

    include('../connection.php');

    header('Access-Control-Allow-Origin: *');

    global $conn;

    $requestData= $_REQUEST;

    $columns = array(
        0 =>'id', 
        1 => 'name',
        2 => 'telp',
        3 => 'ticket_qty',
        4 => 'description',
        5 => 'update_dt'
    );

    $sql = 'SELECT
        t1.id,
        t1.name,
        t2.name as "user",
        t1.telp,
        t1.ticket_qty,
        t1.description,
        t1.update_dt
        FROM ticket t1 INNER JOIN pic t2 ON t1.user_id = t2.id' ;

    $query=mysqli_query($conn, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    if( !empty($requestData['search']['value']) ) {  

        $sql.="  AND concat(name,'-', telp)  LIKE '%".$requestData['search']['value']."%' ";

    }

    $query=mysqli_query($conn, $sql);

    $totalFiltered = mysqli_num_rows($query); 
    $sql.=" ORDER BY t1.id DESC, ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

    $query=mysqli_query($conn, $sql);

    $count = 0;
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  
        $nestedData=array(); 

        $count+=1;

        $nestedData[] = $count;
        $nestedData[] = $row["id"];
        $nestedData[] = $row["name"];
        $nestedData[] = $row["telp"];
        $nestedData[] = $row["description"];
        $nestedData[] = $row["ticket_qty"];
        $nestedData[] = $row["update_dt"];
        $nestedData[] = $row["user"];
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
