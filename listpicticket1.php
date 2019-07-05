<?php

    include('connection.php');

    header('Access-Control-Allow-Origin: *');

    $ticket_id = mysqli_real_escape_string($conn, $_POST['ticket_id']);

    global $conn;

    $requestData= $_REQUEST;

    $columns = array( 
        
        0 =>'id', 
        1 => 'name',
        2 => 'telp',
        3 => 'update_dt',
        4 => 'is_active'
    );

    $sql = 'SELECT
        id,
        name,
        telp,
        update_dt,
        is_active
        FROM ticket_1 WHERE is_active = 0 OR ticket_id = "'.$ticket_id.'" ' ;

    $query=mysqli_query($conn, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    if( !empty($requestData['search']['value']) ) {  

        $sql.="  AND concat(name,'-', telp)  LIKE '%".$requestData['search']['value']."%' ";

    }

    $query=mysqli_query($conn, $sql);

    $totalFiltered = mysqli_num_rows($query); 
    $sql.=" ORDER BY is_active DESC, id DESC , ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

    $query=mysqli_query($conn, $sql);

    $count = 0;
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  
        $nestedData=array(); 

        $count+=1;
        
        $btnParam = array("id"=> $row['id'], "name"=> $row['name'], "telp"=> $row['telp'], "is_active"=> $row['is_active'], "ticket_type"=> 1);

        $btnLabel = "Rubah";
        $btntype = "btn-default";
        $btnDel = "<button class='btn btn-danger' onClick='deletebutton(".json_encode($btnParam).")'><i class='icon pencil'></i>Hapus</button>";

        if($row["is_active"] == 0){
            $btnLabel = "Pakai";
            $btntype = "btn-warning";
            $btnDel = "";
        }

        $nestedData[] = $count;
        $nestedData[] = "GCBF".sprintf("%04d", $row["id"]);
        $nestedData[] = $row["name"];
        $nestedData[] = $row["telp"];
        $nestedData[] = $row["update_dt"];
        $nestedData[] = $row["is_active"];
        $nestedData[] = "<button class='btn ".$btntype."' onClick='editbutton1(".json_encode($btnParam).")'><i class='icon pencil'></i>".$btnLabel."</button> ".$btnDel." ";
        
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
