<style>
 .danger{background-color:red;color:white;}
 .success{background-color:green;color:white;}
</style>
<br>
<h1 class='text-success'><i class="fa-solid fa-user-gear"></i>Master User<hr></h1>
<div id='divform'>
    <form class="form-horizontal" role="form" action="<?php echo base_url('index.php/adminuser/save');?>" method="post" id='form1'>
    <div class="form-group">
        <label for="nama" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="user" name="user" placeholder="username" maxlenght='25' required value="" autofocus required>
        </div>
    </div>
    <div class="form-group">
        <label for="alamat" class="col-sm-3 control-label">Nama</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" maxlenght='255' required>
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="password" maxlenght='100' required>
        </div>
    </div>
    <div class="form-group">
        <label for="level" class="col-sm-3 control-label">Level</label>
        <div class="col-sm-5">
            <select id="level" name="level" class="form-control" required>
                <option value="">--pilih level user--</option>
                <option value="admin">Admin</option>
                <option value="dokter">Dokter</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="simpan" class="col-sm-3 control-label"></label>
        <div class="col-sm-5">
            <input type="hidden" id="hiduser" name="hiduser">
          <input type="submit" class="btn btn-primary" name="tblsimpan" id="tblsimpan" value="Save">
          <input type="button" class="btn btn-info" name="tblreset" id="tblreset" value="Reset" onclick='backbutton()'>
          <input type="button" class="btn btn-danger" value="Close" onclick="$('#divform').fadeOut();">
        </div>
    </div>
</form>
<hr>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header> <h5 class="text-success">Data User</h5> </header>
            <div class="table-responsive">
                <table id="tabledata" class="table table-bordered table-condensed table-hower table-striped">
                    <thead> <tr> <th><b>Username</b></th> <th><b>Nama</b></th> <th><b>level</b></th> <th><b>Action</b></th> </tr> </thead> 
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- /.row-->
<script>
$(document).ready(function(e) {
     $("#form1").submit(function() {
        var datastring = $("#form1").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/adminuser/save')?>",
            data: datastring,
            dataType: "json",
            success: function(data){
                $('#divpesan').addClass(data.stat);
                $('#divpesan').html(data.msg);
                listdata();
            },
            error: function() {
                alert('Error');
            }
        });
        return false;
    })
    listdata();
});
function listdata(){
    //ambil data AJAX dan tampilkan ke table id='tabledata'
    $('#tabledata tbody').html('')
    $.ajax({
        type: "GET",
            url: "<?php echo base_url('index.php/adminuser/getData')?>",
            dataType: "json",
            success: function(data){
                $.each(data, function(i, item) {
                    var baris = "<tr><td>"+item.user+"</td><td>"+item.nama+"</td><td>"+item.level+"</td>";
                    baris += "<td><a href=# onclick=ambilData('"+item.user+"')>Ubah</a> | ";
                    baris += "<a href='#' onclick=hapusData('"+item.user+"')>Hapus</a></td></tr>";
                    //alert(baris);
                    $("#tabledata tbody").append(baris)
                })
            },
            error: function() {
                alert('error');
            }
    });
}
function ambilData(id){
    //kosongkan div pesan form
    $('#divpesan').removeClass('danger,success');
    $('#form1').each (function() {
        this.reset();
    });
    $.post('<?php echo base_url ('index.php/adminuser/getDataById')?>',{id:id},function(data) {
        $('#user,#hiduser').val(data.user).attr('readonly','readonly');
        $('#nama').val(data.nama);
    },'json');
}
function hapusData(id){
    if(confirm('apakah yakin akan menghapus data?')) {
        $('#divpesan').removeClass('danger,success');
        $('#form1').each (function() {
            this.reset() ;
        });
        $.post('<?php echo base_url ('index.php/adminuser/deleteData')?>',{id:id},function(data) {
            $('#divpesan').addClass(data.stat);
            $('#divpesan').html (data.msg);
            $('#user,#hiduser').val(data.user).attr('readonly','readonly');
            $('#nama').val(data.nama);
            listdata();
        },'json');
    }
}
function backbutton()
{
    document.location='<?php echo base_url('index.php/adminuser/')?>';
}
</script>