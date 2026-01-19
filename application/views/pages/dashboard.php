<style type="text/css">
.content{
    min-height:250px;
    padding:15px;
    margin-right:auto;
    margin-left:auto;
    padding-left:15px;
    padding-right:15px
}


.content-wrapper,.right-side,.main-footer{
        margin-left:0 !important;
        min-height:0 !important;
        -webkit-transform:translate(0, 0) !important;
        -ms-transform:translate(0, 0) !important;
        -o-transform:translate(0, 0) !important;
        transform:translate(0, 0) !important
    }
  
.small-box{
    border-radius:2px;
    position:relative;
    display:block;
    margin-bottom:20px;
    box-shadow:0 1px 1px rgba(0,0,0,0.1)
}
.small-box>.inner{
    padding:13px
}
.small-box>.small-box-footer{
    position:relative;
    text-align:center;
    padding:3px 0;
    color:#fff;
    color:rgba(255,255,255,0.8);
    display:block;
    z-index:10;
    background:rgba(0,0,0,0.1);
    text-decoration:none
}
.small-box>.small-box-footer:hover{
    color:#fff;
    background:rgba(0,0,0,0.15)
}
.small-box h3{
    font-size:38px;
    font-weight:bold;
    margin:0 0 10px 0;
    white-space:nowrap;
    padding:0
}
.small-box p{
    font-size:15px
}
.small-box p>small{
    display:block;
    color:#f9f9f9;
    font-size:13px;
    margin-top:5px
}
.small-box h3,.small-box p{
    z-index:5
}
.small-box .icon{
    -webkit-transition:all .3s linear;
    -o-transition:all .3s linear;
    transition:all .3s linear;
    position:absolute;
    top:0px;
    right:10px;
    z-index:0;
    font-size:90px;
    color:rgba(0,0,0,0.15)
}
.small-box:hover{
    text-decoration:none;
    color:#f9f9f9
}
.small-box:hover .icon{
    font-size:95px
}

.bg-red,.bg-yellow,.bg-aqua,.bg-blue,.bg-light-blue,.bg-green,.bg-navy,.bg-teal,.bg-olive,.bg-lime,.bg-orange,.bg-fuchsia,.bg-purple,.bg-maroon,.bg-black,.bg-red-active,.bg-yellow-active,.bg-aqua-active,.bg-blue-active,.bg-light-blue-active,.bg-green-active,.bg-navy-active,.bg-teal-active,.bg-olive-active,.bg-lime-active,.bg-orange-active,.bg-fuchsia-active,.bg-purple-active,.bg-maroon-active,.bg-black-active,.callout.callout-danger,.callout.callout-warning,.callout.callout-info,.callout.callout-success,.alert-success,.alert-danger,.alert-error,.alert-warning,.alert-info,.label-danger,.label-info,.label-warning,.label-primary,.label-success,.modal-primary .modal-body,.modal-primary .modal-header,.modal-primary .modal-footer,.modal-warning .modal-body,.modal-warning .modal-header,.modal-warning .modal-footer,.modal-info .modal-body,.modal-info .modal-header,.modal-info .modal-footer,.modal-success .modal-body,.modal-success .modal-header,.modal-success .modal-footer,.modal-danger .modal-body,.modal-danger .modal-header,.modal-danger .modal-footer{
    color:#fff !important
}
.bg-aqua,.callout.callout-info,.alert-info,.label-info,.modal-info .modal-body{
    background-color:#00c0ef !important
}
.bg-green,.callout.callout-success,.alert-success,.label-success,.modal-success .modal-body{
    background-color:#00a65a !important
}   
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class='text-success'><i class="fas fa-tachometer-alt"></i>Dashboard<hr></h1>
      <div class="container">
      <?php if ($_SESSION["level"]=="admin"){ ?>
        <h4 class="h4 mb-4 text-gray-800">"Anda Login Sebagai <?= $admin['nama']; ?>"</h4>
      <?php } ?>  
      <?php if ($_SESSION["level"]=="dokter"){ ?>
        <h4 class="h4 mb-4 text-gray-800 text-success">"Selamat Datang Dr. <?= $dokter['nama']; ?>"</h4>
        <div class="container"><div class="container">
        <p>Silahkan gunakan menu disamping untuk menggunakan website ini</p>
        <p>dibawah ini adalah informasi jumlah pasien dan pemeriksaan yang telah dilakukan</p></div></div>
      <?php } ?> 
      </div> 
    </section>          
      <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="container">
      <!-- <p class="text-primary">Ini adalah halaman dashboard anda</p>
      <p class="text-primary">Silahkan gunakan menu disamping untuk menggunakan website ini</p> -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $jumlahpasien; ?></h3>

              <p>Data (Pasien)</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('index.php/adminpasien'); ?>" class="small-box-footer">Lihat Data Pasien <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $jumlahrm; ?></h3>

              <p>Rekam Medis (RM)</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <?php if ($_SESSION["level"]=="dokter"){ ?>
            <a href="<?= base_url('index.php/dokterpemeriksaan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a><?php } ?>
          </div>
        </div>
           
      </div>
      </div></div>
    </section>
    
  </div>
  </div>