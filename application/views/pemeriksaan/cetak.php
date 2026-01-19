<!DOCTYPE html>
<html lang="en">
 <head>
    <title>Cetak Rekam Medis</title>
</head>
<style>
  .tbl{
    border:1px solid #000000;
    border-radius: 3px;
    padding : 10px 10px 10px 10px;
  }
</style>
<body  style="font-family:Times New Roman;font-size:30px">
<?php foreach($pemeriksaan->result() as $row){ ?>
<center><h1></h1></center>
<table  id="example1" class="tbl">
<tr align="center" border="1">
	<td colspan="3">
			<h3><i>	CI rm_MaaDeSu.com</i></h3>
			<h4>Informasi Rekam Medis Pasien</h4>
			<hr>	
	</td>
</tr>
<tr>
	<td>Tanggal_Periksa</td>
	<td>:</td>
	<td><?php echo $row->tanggal ?></td>                       
</tr>
<tr>
	<td>Id Pemeriksaan </td>
	<td>:</td>
	<td><?php echo $row->id_periksa ?></td>                       
</tr>
<tr>
	<td>Kd Rm</td>
	<td>:</td>
	<td><?php echo $row->kd_rm ?></td>
</tr>
<tr>
	<td>Dokter</td>
	<td>:</td>
	<td><?php echo $row->dokter ?></td>
</tr>
<tr>
	<td>Keluhan</td>
	<td>:</td>
	<td><?php echo $row->keluhan ?></td>
</tr>	
<tr>
	<td>Diagnosa</td>
	<td>:</td>
	<td><?php echo $row->diagnosa ?></td>
</tr>
<tr>
	<td>Tindakan</td>
	<td>:</td>
	<td><?php echo $row->tindakan ?></td>
</tr>
<?php } ?>
</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>