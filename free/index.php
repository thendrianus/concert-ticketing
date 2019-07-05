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
                            
                            <h3>Tiket Gratis <b id="total1"></b></h3>
                            <button type="submit" class="btn btn-default" id="select1">Pilih data</button>
                            <button type="submit" class="btn btn-default" id="select1finish">Selesai pilih data</button>
                            <textarea row="4" class="form-control" id="selected1" placeholder="data yang di pilih"></textarea>
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

                </div>
            </div>
        </div>

    </body>

    <script>
        
        var listpicticket1 = $('#listpicticket1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "../semua/listpicticket1.php",
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listpicticket1").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listpicticket1").css("display", "none");
                }
            }
        });

        $('#selected1').hide();
        $('#select1finish').hide();

        var selected1 = false;
        $('#select1').click(function(){
            $('#select1').hide();
            $('#selected1').show();
            $('#select1finish').show();
            selected1 = true;
        });

        $('#select1finish').click(function(){
            $('#select1').show();
            $('#selected1').hide();
            $('#selected1').val('');
            $('#select1finish').hide();
            selected1 = false;
            listpicticket1.ajax.reload();
        }); 

        $('#listpicticket1 tbody').on( 'click', 'tr', function () {
            if(selected1 == true){
                $(this).toggleClass('selected');
                var a= listpicticket1.rows('.selected').data()
                var str = "";
                $.each(a.reverse(), function( index, value ) {
                    str += (index+1)+". "+value[2]+"("+value[1]+") \n";
                });
                $('#selected1').val(str);
            }
        } );

    </script>
</html>