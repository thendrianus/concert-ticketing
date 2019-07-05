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
                        <div class="table-responsive" id="listpictickettable2">
                            <h3>Tiket 1 Juta</h3>
                            <button type="submit" class="btn btn-default" id="select2">Pilih data</button>
                            <button type="submit" class="btn btn-default" id="select2finish">Selesai pilih data</button>
                            <textarea row="4" class="form-control" id="selected2" placeholder="data yang di pilih"></textarea>
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

                </div>
            </div>
        </div>

    </body>

    <script>

        var listpicticket2 = $('#listpicticket2').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "../semua/listpicticket2.php",
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listpicticket2").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listpicticket2").css("display", "none");
                }
            }
        });

        $('#selected2').hide();
        $('#select2finish').hide();

        var selected2 = false;
        $('#select2').click(function(){
            $('#select2').hide();
            $('#selected2').show();
            $('#select2finish').show();
            selected2 = true;
        });

        $('#select2finish').click(function(){
            $('#select2').show();
            $('#selected2').hide();
            $('#selected2').val('');
            $('#select2finish').hide();
            selected2 = false;
            listpicticket2.ajax.reload();
        }); 

        $('#listpicticket2 tbody').on( 'click', 'tr', function () {
            if(selected2 == true){
                $(this).toggleClass('selected');
                var a= listpicticket2.rows('.selected').data()
                var str = "";
                $.each(a.reverse(), function( index, value ) {
                    str += (index+1)+". "+value[2]+"("+value[1]+") \n";
                });
                $('#selected2').val(str);
            }
        } );

    </script>
</html>