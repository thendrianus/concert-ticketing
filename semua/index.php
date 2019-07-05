<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Grand Concert Tour Batam</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../datatables.min.css"/>
        <script type="text/javascript" src="../datatables.min.js"></script>

    </head>
    <body>

        <div class="jumbotron text-center">
        <h1>Concert Batam 2018</h1>
        <p>Ticketing System</p> 
        </div>
        
        <div class="container">
            <div class="row" id="ticketing_row">
                <div class="col-sm-12">
                    <br>
                    <div class="row">
                        <div class="table-responsive" id="listpictickettable1">
                            <h3>Tiket Gratis</h3>
                            <table class="table table-striped" id="listpicticket1" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>No Tiket</th>

                                        <th>Nama</th>

                                        <th>Telp</th>

                                        <th>Nama PIC</th>

                                        <th>Telp PIC</th>

                                        <th>Update DT</th>

                                        <th>Status</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive" id="listpictickettable2">
                            <h3>Tiket 1 Juta</h3>
                            <table class="table table-striped" id="listpicticket2" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>No Tiket</th>

                                        <th>Nama</th>

                                        <th>Telp</th>

                                        <th>Nama PIC</th>

                                        <th>Telp PIC</th>

                                        <th>Update DT</th>

                                        <th>Status</th>

                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive" id="listpictickettable3"> 
                            <h3>Tiket 500 ribu</h3>
                            <table class="table table-striped" id="listpicticket3" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>

                                        <th>No</th>

                                        <th>No Tiket</th>

                                        <th>Nama</th>

                                        <th>Telp</th>

                                        <th>Nama PIC</th>

                                        <th>Telp PIC</th>

                                        <th>Update DT</th>

                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2> Daftar PIC <b id="user_username"></b> </h2>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped" id="listuserticket1" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>No PIC</th>

                                        <th>Nama</th>

                                        <th>Telp</th>

                                        <th>Description</th>

                                        <th>Ticket Qty</th>

                                        <th>Update DT</th>

                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    <script>
        
        var listpicticket1 = $('#listpicticket1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "listpicticket1.php",
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listpicticket1").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listpicticket1").css("display", "none");
                }
            }
        });

        var listpicticket2 = $('#listpicticket2').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "listpicticket2.php",
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listpicticket2").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listpicticket2").css("display", "none");
                }
            }
        });

        var listpicticket3 = $('#listpicticket3').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "listpicticket3.php",
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listpicticket3").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listpicticket3").css("display", "none");
                }
            }
        });

        var listuserticket1 = $('#listuserticket1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "listuserticket1.php",
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listuserticket1").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listuserticket1").css("display", "none");
                }
            }
        });

    </script>
</html>