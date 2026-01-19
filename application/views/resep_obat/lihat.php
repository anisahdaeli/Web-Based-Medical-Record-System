  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class='text-success'><i class="fa-solid fa-receipt"></i>Halaman Detail Resep<hr></h1>
    </section>
            <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
    <div class="box-body">
 <?php foreach ($pemeriksaan as $r) { ?>
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Rekam Medis </label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?= $r->kd_rm ?>" readonly>
                </div>
                </div>    
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pasien</label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?= $r->nama_pasien ?>" readonly>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Pemeriksaan</label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?= $r->id_periksa ?>" readonly>
                </div>
                </div>
<?php } ?>
                              
          

<div class="box-body">            
           <table id="example1" class="table table-bordered table-striped ">
                      <thead>
                        <tr>
                        <th>No</th>
                        <th>Kode Resep</th>
                        <th>Obat</th>
                        <th>Aturan Pakai</th>
                        <th>Jumlah</th>
                      </tr>
                      </thead>
                        <tbody>
                          <?php 
                         $no = 1;
                         foreach ($resep as $r) { ?>
                          <tr>
                          <td><?php echo $no++ ?></td>
                        <td><?php echo $r->kd_resep ?></td>
                        <td><?php echo $r->nama_obat ?></td>
                        <td><?php echo $r->aturan_pakai ?></td>
                        <td><?php echo $r->stok_out ?></td>
                          </tr>
                        <?php } ?>
                       </tbody>
                                         
                   
                </table>
                <a href="javascript:history.go(-1)" class="btn btn-success">Kembali</a>
    
                  
           
       
 

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>