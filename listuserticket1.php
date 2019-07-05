<?php

    include('connection.php');

    header('Access-Control-Allow-Origin: *');

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

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

    $where="";
    if($user_id == '') {
        $where = "WHERE t1.user_id = 900";
    }else if($user_id == '2') {
        $where = "WHERE t1.user_id = 2";
    }else{
        $where = "WHERE t1.user_id <> 2";
    }
    $sql = 'SELECT
        t1.id,
        t1.name,
        t2.name as "user_name",
        t1.telp,
        t1.ticket_qty,
        t1.description,
        t1.update_dt,
        t1.followup
        FROM ticket t1 INNER JOIN pic t2 ON t1.user_id = t2.id '.$where.' ' ;

    $query=mysqli_query($conn, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    if( !empty($requestData['search']['value']) ) {  

        $sql.="  AND concat(t1.name,'-', t1.telp)  LIKE '%".$requestData['search']['value']."%' ";

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
        
        $btnParam = array("id"=> $row['id'], "name"=> $row['name'], "telp"=> $row['telp'], "description"=> $row['description'], "name"=> "pic", "followup"=> $row['followup']);

        $btnLabel = "Rubah";
        $btntype = "btn-default";

        $nestedData[] = $count;
        $nestedData[] = $row["id"];
        $nestedData[] = $row["name"];
        $nestedData[] = $row["user_name"];
        $nestedData[] = $row["telp"];
        $nestedData[] = $row["description"];
        $nestedData[] = $row["ticket_qty"];
        $nestedData[] = $row["update_dt"];
        
        if($row["followup"] == "0"){
            $nestedData[] = "<button class='btn btn-default' onClick='followup(".json_encode($btnParam).")'><i class='icon pencil'></i>Follow Up</button>";
        }else{
            $nestedData[] = "<button class='btn btn-warning' onClick='followup(".json_encode($btnParam).")'><i class='icon pencil'></i>Cancel Follow Up</button>";
        }
        
        $nestedData[] = "<button class='btn btn-default' onClick='editbutton4(".json_encode($btnParam).")'><i class='icon pencil'></i>Edit</button>";
        
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
