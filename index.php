<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Grand Concert Tour Batam</title>listuserticket1
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="datatables.min.css"/>
        <script type="text/javascript" src="datatables.min.js"></script>

    </head>
    <body>

        <div class="jumbotron text-center">
            <h1>Concert Batam 2018</h1>
            <p>Ticketing System</p> 
            <a class="btn btn-info" href="./semua" target="_blank" role="button"> Lihat Semua tiket </a>
            <a class="btn btn-info" href="./free" target="_blank" role="button"> Lihat tiket Free </a>
            <a class="btn btn-info" href="./1juta" target="_blank" role="button"> Lihat tiket 1 Juta </a>
            <a class="btn btn-info" href="./500ribu" target="_blank" role="button"> Lihat tiket 500ribu </a>
            <a class="btn btn-info" href="./pic" target="_blank" role="button"> Lihat Daftar PIC </a>
        </div>
        
        <div class="container">
            <div class="text-center" id="welcome">
                <h2 id="welcome_name"></h2>
                <p id="welcome_name21"></p>
                <button id="logout" type="button" class="btn btn-danger"> Logout </button>
            </div>
            <div class="row" id="login_row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="form-group col-sm-12">
                        <label for="email">Nama Admin:</label>
                        <select class="form-control" id="pic_username">
                            <option value="no">Havent got data from server</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pic_password">
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-default" id="login_submit">Masuk</button>
                    </div>
                </div>
            </div>
            <div class="row" id="ticketing_row">
                <div class="col-sm-12">
                    <div class="row" id="PIC_row">
                        <h3>Keterangan PIC Tiket</h3>
                        <div class="col-sm-6">
                            <div class="form-group col-sm-12">
                                <label for="pwd">Nama PIC</label>
                                <input type="text" class="form-control" id="pic_name" placeholder="harus isi">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="pwd">No telp PIC</label>
                                <input type="number" class="form-control" id="pic_telp" placeholder="harus isi">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group col-sm-12">
                                <label for="pwd">Jumlah Tiket</label>
                                <input type="number" class="form-control" id="pic_ticket_qty" readonly>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="pwd">Description</label>
                                <textarea row="4" class="form-control" id="pic_description" placeholder="optional"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-success" id="pic_add">Tambahkan</button>
                                <button type="submit" class="btn btn-primary" id="pic_edit">Rubah</button>
                                <button type="submit" class="btn btn-default" id="pic_clear_form">Clear Form</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12" id="ticket_row">
                    <div class="text-center">
                        <h2> Daftar Pemegang tiket berdasarkan PIC</h2>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-inline" action="javascript:void(0);">

                                <div class="form-group">
                                    <label for="email">Jenis Tiket</label>
                                    <select class="form-control" id="ticket_type">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Nama:</label>
                                    <input type="text" class="form-control" id="ticket_name" placeholder="optional">
                                </div>
                            
                                <div class="form-group">
                                    <label for="pwd">No Telp:</label>
                                    <input type="number" class="form-control" id="ticket_telp" placeholder="optional">
                                </div>
                            
                                <div class="form-group">
                                    <button class="btn btn-success" id="ticket_add">Tambahkan</button>
                                    <button class="btn btn-primary" id="ticket_edit">Rubah</button>
                                    <button class="btn btn-default" id="ticket_clear_form">Clear Form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive" id="listpictickettable1">
                            <h3>Tiket Gratis</h3>
                            <button type="submit" class="btn btn-default" id="select1">Pilih data</button>
                            <button type="submit" class="btn btn-default" id="select1finish">Selesai pilih data</button>
                            
                            <textarea row="4" class="form-control" id="selected1" placeholder="data yang di pilih"></textarea>
                            
                            <button type="submit" class="btn btn-default" id="select2g">Pilih semua data</button>
                            <textarea row="4" class="form-control" id="selected2g" placeholder="Semua data"></textarea>
                            
                            <table class="table table-striped" id="listpicticket1" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>No Tiket</th>

                                        <th>Nama</th>

                                        <th>Telp</th>

                                        <th>Update DT</th>

                                        <th>Status</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

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

                                        <th>Update DT</th>

                                        <th>Status</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

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

                                        <th>Update DT</th>

                                        <th>Status</th>

                                        <th>Action</th>
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
                                        
                                        <th>User Input</th>

                                        <th>Telp</th>

                                        <th>Description</th>

                                        <th>Ticket Qty</th>

                                        <th>Update DT</th>
                                        
                                        <th>Follow Up</th>

                                        <th>Action</th>
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

        $( "#welcome" ).hide();
        $('#ticketing_row').hide();
        $('#pic_edit').hide();
        $('#ticket_edit').hide();
        $('#listpictickettable1').hide();
        $('#listpictickettable2').hide();
        $('#listpictickettable3').hide();

        var user_id = "";
        var user_username = "";

        $.get( "total.php", function( data ) {
            $('#welcome_name21').append(data);
        });
        
        var user_data = []
        //load PIC
        $.get( "/tiket/getpic.php", function( data ) {
            var data = JSON.parse(data);
            user_data = data;
            $('#pic_username').html('');
            for (const key in data) {
                $('#pic_username').append('<option value="'+data[key].id+'">'+data[key].name+'</option>');
            }
        });
        
        var ticket_id = '';
        var listpicticket1 = $('#listpicticket1').DataTable({
            "processing": true,
            "serverSide": true,
            "language": {
				          "lengthMenu": 'Display <select>'+
                        '<option value="50">50</option>'+
                        '<option value="100">100</option>'+
                        '<option value="150">150</option>'+
                        '<option value="250">250</option>'+
                        '<option value="500">500</option>'+
			            '</select> records'},
            "ajax": {
                url: "listpicticket1.php",
                data: function (d) {
                    Object.assign(d, {'ticket_id': ticket_id});
                    return d;
                },
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
            "language": {
				          "lengthMenu": 'Display <select>'+
                        '<option value="50">50</option>'+
                        '<option value="100">100</option>'+
                        '<option value="150">150</option>'+
                        '<option value="250">250</option>'+
                        '<option value="500">500</option>'+
			            '</select> records'},
            "ajax": {
                url: "listpicticket2.php",
                data: function (d) {
                    Object.assign(d, {'ticket_id': ticket_id});
                    return d;
                },
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
            "language": {
				          "lengthMenu": 'Display <select>'+
                        '<option value="50">50</option>'+
                        '<option value="100">100</option>'+
                        '<option value="150">150</option>'+
                        '<option value="250">250</option>'+
                        '<option value="500">500</option>'+
			            '</select> records'},
            "ajax": {
                url: "listpicticket3.php",
                data: function (d) {
                    Object.assign(d, {'ticket_id': ticket_id});
                    return d;
                },
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
            "language": {
				          "lengthMenu": 'Display <select>'+
                        '<option value="50">50</option>'+
                        '<option value="100">100</option>'+
                        '<option value="150">150</option>'+
                        '<option value="250">250</option>'+
                        '<option value="500">500</option>'+
			            '</select> records'},
            "ajax": {
                url: "listuserticket1.php",
                data: function (d) {
                    Object.assign(d, {'user_id': user_id});
                    return d;
                },
                type: "post",
                error: function (data) {
                    console.log(data)
                    $(".myTable-error").html("");
                    $("#listuserticket1").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#listuserticket1").css("display", "none");
                }
            }
        });

        $('#login_submit').click(function(){
            if($('#pic_password').val() != ''){
                for (const key in user_data) {
                    if(user_data[key].id == $('#pic_username').val()){
                        if(user_data[key].password == $('#pic_password').val()){
                            user_id = user_data[key].id;
                            user_username = user_data[key].name;
                            $( "#login_row" ).hide();
                            $( "#welcome" ).show();
                            $( "#welcome_name" ).html('Selamat datang '+ user_data[key].name +'');
                            $('#ticketing_row').show();
                            $('#user_username').html('Admin '+ user_data[key].name +'')
                            listuserticket1.ajax.reload();
                            if(user_data[key].status == 0){
                                listpicticket1.ajax.reload();
                                $('#listpictickettable1').show();
                                $('#ticket_type').append('<option value="1">Free</option>');
                            }else if(user_data[key].status == 1){
                                listpicticket2.ajax.reload();
                                $('#listpictickettable2').show();
                                listpicticket3.ajax.reload();
                                $('#listpictickettable3').show();
                                $('#ticket_type').append('<option value="2">1 Juta</option><option value="3">500 Ribu</option>');
                            }else if(user_data[key].status == 2){
                                listpicticket1.ajax.reload();
                                $('#listpictickettable1').show();
                                listpicticket2.ajax.reload();
                                $('#listpictickettable2').show();
                                listpicticket3.ajax.reload();
                                $('#listpictickettable3').show();
                                $('#ticket_type').append('<option value="1">Free</option><option value="2">1 Juta</option><option value="3">500 Ribu</option>');
                            }
                        }else{
                            alert('Passsword anda salah')
                        }
                    }
                }
            }else{
                alert('Password harus di isi');
            }
        });

        $('#logout').click(function() {
            location.reload();
        });

        $('#pic_add').click(function(){
            if($('#pic_name').val() == ""){
                alert('nama pic tidak bisa kosong');
            }else if($('#pic_telp').val() == ""){
                alert('no telp pic tidak bisa kosong');
            }else if(user_id == 0){
                alert('User id anda kosong, coba untuk refresh browser');
            }else{
                $.post( "addpic.php", {
                    name: $('#pic_name').val(),
                    telp: $('#pic_telp').val(),
                    user_id: user_id,
                    description: $('#pic_description').val()
                }, function( data ) {
                    var data = JSON.parse(data);
                    if(!data.error){
                        $('#pic_add').hide();
                        $('#pic_edit').show();
                        ticket_id = data.ticket_id;
                        listpicticket1.ajax.reload();
                        listpicticket2.ajax.reload();
                        listpicticket3.ajax.reload();
                        listuserticket1.ajax.reload();
                        alert(data.success);
                        checkpic();
                    }else{
                        alert(data.error);
                    }
                } );
            }
        })

        $('#pic_edit').click(function(){
            if($('#pic_name').val() == ""){
                alert('nama pic tidak bisa kosong');
            }else if($('#pic_telp').val() == ""){
                alert('no telp pic tidak bisa kosong');
            }else if(ticket_id == ""){
                alert('PIC id kosong, coba untuk refresh browser');
            }else{
                $.post( "editpic.php", {
                    name: $('#pic_name').val(),
                    telp: $('#pic_telp').val(),
                    ticket_id: ticket_id,
                    description: $('#pic_description').val()
                }, function( data ) {
                    var data = JSON.parse(data);

                    if(!data.error){
                        listpicticket1.ajax.reload();
                        listpicticket2.ajax.reload();
                        listpicticket3.ajax.reload();
                        listuserticket1.ajax.reload();
                        alert(data.success);
                        checkpic();
                    }else{
                        alert(data.error);
                    }
                } );
            }
        })
        
        function followup(val){
            var r = confirm("Yakin sudah follow up "+val.name+"!?");
            if (r == true) {

                if(val.followup == '1'){
                    var followup = 0;
                }else{
                    var followup = 1;
                }

                $.post( "followup.php", {
                    id: val.id,
                    followup: followup
                }, function( data ) {
                    console.log(data);
                    var data = JSON.parse(data);
                    if(!data.error){
                        listuserticket1.ajax.reload();
                        alert(data.success);
                    }else{
                        alert(data.error);
                    }
                } );
            } else {
                console.log('cancel')
            }
        }

        function checkpic(){
            $.post( "checkpic.php", {
                ticket_id: ticket_id,
            }, function( data ) {
                console.log(data);
                var data = JSON.parse(data);
                if(data.length > 0){
                    $('#pic_ticket_qty').val( data[0].ticket_qty );
                }
            } )
        }

        function editbutton4(val){
            ticket_id = val.id;
            $('#pic_name').val(val.name);
            $('#pic_telp').val(val.telp);
            $('#pic_edit').show();
            $('#pic_add').hide();
            $('#pic_description').val(val.description);
            listpicticket1.ajax.reload();
            listpicticket2.ajax.reload();
            listpicticket3.ajax.reload();
            checkpic();
            $('html, body').animate({
                scrollTop: $("#PIC_row").offset().top
            }, 800);
        }

        var ticket_detail_id = '';
        var ticket_detail_is_active= '';
        $('#ticket_add').click(function(){
            if($('#ticket_name').val() == ""){
                $('#ticket_name').val('-');
            }
            
            if($('#ticket_telp').val() == ""){
                $('#ticket_telp').val('-');
            }

            if(ticket_id == ""){
                alert('PIC id kosong, silahkan tambahkan PIC atau edit PIC terlebih dahulu');
            }else{
                $.post( "addticket.php", {
                    name: $('#ticket_name').val(),
                    telp: $('#ticket_telp').val(),
                    ticket_id: ticket_id,
                    ticket_type: $('#ticket_type').val()
                }, function( data ) {
                    var data = JSON.parse(data);

                    if(!data.error){
                        $('#ticket_name').val('');
                        $('#ticket_telp').val('');
                        ticket_detail_id = '';
                        ticket_detail_is_active= '';
                        listpicticket1.ajax.reload();
                        listpicticket2.ajax.reload();
                        listpicticket3.ajax.reload();
                        listuserticket1.ajax.reload();
                        alert(data.success);
                    }else{
                        alert(data.error);
                    }
                } );
            }

        })

        $('#ticket_edit').click(function(){
            if($('#ticket_name').val() == ""){
                $('#ticket_name').val('-');
            }
            
            if($('#ticket_telp').val() == ""){
                $('#ticket_telp').val('-');
            }

            if(ticket_id == ""){
                alert('PIC id kosong, Silahakn edit PIC atau tambahkan PIC terlebih dahulu');
            }else if(ticket_detail_id == ""){
                alert('Ticket id kosong, coba untuk refresh browser');
            }else if(ticket_detail_is_active == ""){
                alert('something wrong, coba untuk refresh browser')
            }else{
                $.post( "editticket.php", {
                    name: $('#ticket_name').val(),
                    telp: $('#ticket_telp').val(),
                    ticket_id: ticket_id,
                    ticket_detail_id: ticket_detail_id,
                    is_active: ticket_detail_is_active,
                    ticket_type: $('#ticket_type').val(),
                }, function( data ) {
                    var data = JSON.parse(data);
                    if(!data.error){
                        listuserticket1.ajax.reload();
                        alert(data.success);
                        $('#ticket_name').val('');
                        $('#ticket_telp').val('');
                        $('#ticket_edit').hide();
                        $('#ticket_add').show();
                        ticket_detail_id= '';
                        ticket_detail_is_active= '';
                    }else{
                        alert(data.error);
                    }
                    listpicticket1.ajax.reload();
                    listpicticket2.ajax.reload();
                    listpicticket3.ajax.reload();
                } );
            }
            
        })

        function editbutton1(val){
            $('#ticket_name').val(val.name);
            $('#ticket_telp').val(val.telp);
            $('#ticket_type').val(1);
            $('#ticket_type').prop('readonly', true);
            $('#ticket_edit').show();
            $('#ticket_add').hide();
            ticket_detail_id = val.id;
            ticket_detail_is_active= val.is_active;
            $('html, body').animate({
                scrollTop: $("#ticket_row").offset().top
            }, 800);
        }

        function deletebutton(val){
            var r = confirm("Yakin ingin menghapus tiket "+val.id+" dengan nama "+val.name+"!");
            if (r == true) {
                $.post( "deleteticket.php", {
                    id: val.id,
                    ticket_type: val.ticket_type,
                    ticket_id: ticket_id
                }, function( data ) {
                    console.log(data);
                    var data = JSON.parse(data);
                    if(!data.error){
                        listpicticket1.ajax.reload();
                        listpicticket2.ajax.reload();
                        listpicticket3.ajax.reload();
                        listuserticket1.ajax.reload();
                        alert(data.success);
                        $('#ticket_name').val('');
                        $('#ticket_telp').val('');
                        ticket_detail_id= '';
                        ticket_detail_is_active= '';
                    }else{
                        alert(data.error);
                    }
                } );
            } else {
                console.log('cancel')
            }
        }

        function editbutton2(val){
            $('#ticket_name').val(val.name);
            $('#ticket_telp').val(val.telp);
            $('#ticket_type').val(2);
            $('#ticket_type').prop('readonly', true);
            ticket_detail_id = val.id;
            ticket_detail_is_active= val.is_active;
            $('#ticket_edit').show();
            $('#ticket_add').hide();
            $('html, body').animate({
                scrollTop: $("#ticket_row").offset().top
            }, 800);
        }

        function editbutton3(val){
            $('#ticket_name').val(val.name);
            $('#ticket_telp').val(val.telp);
            $('#ticket_type').val(3);
            $('#ticket_type').prop('readonly', true);
            ticket_detail_id = val.id;
            ticket_detail_is_active= val.is_active;
            $('#ticket_edit').show();
            $('#ticket_add').hide();
            $('html, body').animate({
                scrollTop: $("#ticket_row").offset().top
            }, 800);
        }

        $('#ticket_clear_form').click(function(){
            $('#ticket_name').val('');
            $('#ticket_telp').val('');
            $('#ticket_edit').hide();
            $('#ticket_add').show();
            ticket_detail_id= '';
            ticket_detail_is_active= '';
            $('#ticket_type').prop('readonly', false);
        })

        $('#pic_clear_form').click(function(){
            $('#ticket_name').val('');
            $('#ticket_telp').val('');
            $('#ticket_edit').hide();
            $('#ticket_add').show();
            $('#pic_edit').hide();
            $('#pic_add').show();
            ticket_detail_id= '';
            ticket_detail_is_active= '';
            $('#ticket_type').prop('readonly', false);

            $('#pic_name').val('');
            $('#pic_telp').val('');
            $('#pic_ticket_qty').val('');
            ticket_id= '';
            $('#pic_description').val('');

            listpicticket1.ajax.reload();
            listpicticket2.ajax.reload();
            listpicticket3.ajax.reload();
        })

        $('#selected1').hide();
        $('#select1finish').hide();

        var selected1 = false;
        $('#select1').click(function(){
            $('#select1').hide();
            $('#selected1').show();
            $('#select1finish').show();
            selected1 = true;
        });
        
        $('#selected2g').hide();
        
        $('#select2g').click(function(){
            $('#selected2g').show();
            var a= listpicticket1.rows().data();
            
            var str = "";
            var count = 0;
            $.each(a.reverse(), function( index, value ) {
                console.log(value);
                if(value[5] != "0"){
                    str += (count+1)+". "+value[2]+"("+value[1]+") \n";   
                    count += 1;
                }
            });
            $('#selected2g').val(str);            
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
                    str += (a.length - index)+". "+value[2]+"("+value[1]+") \n";
                });
                $('#selected3').val(str);
            }
        } );
    </script>
</html>