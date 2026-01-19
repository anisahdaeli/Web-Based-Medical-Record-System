<style>
 .danger{background-color:red;color:white;}
 .success{background-color:green;color:white;}
</style>
<br>
<h1 class='text-success'><i class="fa-solid fa-user-gear"></i>Halaman Ganti Password<hr></h1>
<div id='divform'>
    <div id='divpesan'></div>
    <div id='divpesan'></div>
    <form class="form-horizontal" role="form" method="post" id='form1'>
    <?php foreach($dtuser->result() as $row){ ?>
    <div class="form-group">
        <label for="nama" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="user" name="user" value="<?php echo $row->user ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="alamat" class="col-sm-3 control-label">Nama</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="col-sm-3 control-label">Level</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="level" name="level" value="<?php echo $row->level ?>" readonly>
    </div>
    </div>
    <div class="form-group">
        <label for="simpan" class="col-sm-3 control-label"></label>
        <div class="col-sm-5">
            <input type="hidden" id="hiduser" name="hiduser">
          <input type="submit" class="btn btn-primary" name="tblsimpan" id="tblsimpan" value="Save">
          <input type="reset" class="btn btn-info" name="tblreset" id="tblreset" value="Reset">
          <input type="button" class="btn btn-danger" value="Close" onclick="$('#divform').fadeOut();">
        </div>
    </div>
</div>
</div>
    <?php } ?>
</form>
<script>
$(document).ready(function(e) {
     $("#form1").submit(function() {
        var datastring = $("#form1").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/adminuser/ganti_password_aksi')?>",
            data: datastring,
            dataType: "json",
            success: function(data){
                $('#divpesan').addClass(data.stat);
                $('#divpesan').html(data.msg);
                var aksi = "Password Berhasil diubah";
                alert(aksi);
                setTimeout("window.open(self.location, '_self')",250);
            },
            error: function() {
                alert('Error');
            }
        });
        return false;
    })
});
</script>