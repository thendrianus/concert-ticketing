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
                        <div class="table-responsive" id="listpictickettable3">
                            <h3>Tiket 500 ribu</h3>
                            <button type="submit" class="btn btn-default" id="select3">Pilih data</button>
                            <button type="submit" class="btn btn-default" id="select3finish">Selesai pilih data</button>
                            <textarea row="4" class="form-control" id="selected3" placeholder="data yang di pilih"></textarea>
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
            </div>
        </div>

    </body>

    <script>

        var listpicticket3 = $('#listpicticket3').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "../semua/listpicticket3.php",
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listpicticket3").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listpicticket3").css("display", "none");
                }
            }
        });

        $('#selected3').hide();
        $('#select3finish').hide();

        var selected3 = false;
        $('#select3').click(function(){
            $('#select3').hide();
            $('#selected3').show();
            $('#select3finish').show();
            selected3 = true;
        });

        $('#select3finish').click(function(){
            $('#select3').show();
            $('#selected3').hide();
            $('#selected3').val('');
            $('#select3finish').hide();
            selected3 = false;
            listpicticket3.ajax.reload();
        });
 
        $('#listpicticket3 tbody').on( 'click', 'tr', function () {
            if(selected3 == true){
                $(this).toggleClass('selected');
                var a= listpicticket3.rows('.selected').data()
                var str = "";
                $.each(a.reverse(), function( index, value ) {
                    str += (index+1)+". "+value[2]+"("+value[1]+") \n";
                });
                $('#selected3').val(str);
            }
        } );

    </script>
</html>