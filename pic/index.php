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

                                        <th>Admin</th>
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

        var listuserticket1 = $('#listuserticket1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "../semua/listuserticket1.php",
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