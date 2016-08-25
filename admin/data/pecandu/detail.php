<?php

$sql = "SELECT * FROM pecandu Where id_pecandu='$_GET[id]'";
$s = $conn->query($sql);
while ($row=$s->fetch_assoc()) {

?>
<div class="judul">
  <h2>Detail Pecandu</h2>
</div>
<input class="btn btn-primary col-md-offset-7" type="button" value="Cetak" onclick="window.location.href='?p=cetak_pecandu&id=<?php echo $_GET['id'] ?>'"> 
<br/><br/>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="">
  <div class="form-group">

    <label for="id">No Rekam Medis</label>
    <input type="text" required name="id_rekam" class="form-control" readOnly value="<?php echo $row['no_rekam_medis'] ?>">
  </div>

  <div class="form-group">
    <label for="nama">Nama </label>
    <input type="text" required name="nama" readonly="" class="form-control" value="<?php echo $row['nama'] ?>" >
  </div>
  <div class="form-group">
    <label for="nama">No KTP/SIM</label>
    <input type="number" required name="ktp" readonly="" class="form-control" value="<?php echo $row['no_ktp/sim'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Ibu</label>
    <input type="text" required name="nama_ibu" readonly=""class="form-control" value="<?php echo $row['nama_ibu'] ?>">
  </div>
    <div class="form-group">
    <label for="nama">Nama Ayah</label>
    <input type="text" required name="nama_ayah" readonly=""class="form-control" value="<?php echo $row['nama_ayah'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <div class="input-group date">
      <input type="date" required name="tanggal"  readonly=""class="form-control" value="<?php echo $row['tgl_lahir'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="nama">Umur</label>
    <input type="number" required name="umur" class="form-control" readonly=""value="<?php echo $row['umur'] ?>">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="text" name="jk" class="form-control" readonly="" value="<?php echo $row['jenis_kelamin'] ?>"><br/>
    
  </div>
  <div class="form-group">
    <label for="jk">agama</label><br/>
    <input type="text" name="jk" class="form-control" readonly="" value="<?php echo $row['agama'] ?>"><br/>
  </div>
  <div class="form-group">
    <label for="nama">Suku</label>
    <input type="text" required name="suku" readonly=""class="form-control" value="<?php echo $row['suku'] ?>">
  </div>
    <div class="form-group">
    <label for="menikah">Status Menikah</label><br/>
   <input type="text" name="jk" class="form-control" readonly="" value="<?php echo $row['status_menikah'] ?>"><br/> </div>
  <div class="form-group">
    <label for="nama">Pekerjaan</label>
    <input type="text" required name="pekerjaan" readonly=""class="form-control" value="<?php echo $row['pekerjaan'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Alamat KTP</label>
    <textarea required name="alamat_ktp" readonly=""class="form-control"><?php echo $row['alamat_ktp'] ?></textarea>
  </div>
    <div class="form-group">
    <label for="nama">Alamat domisili</label>
    <textarea required name="alamat_domisili" readonly=""class="form-control"><?php echo $row['alamat_ktp'] ?></textarea>
  </div>
    <div class="form-group">
    <label for="jk">Golongan Darah</label><br/>
   <input type="text" name="jk" class="form-control" readonly="" value="<?php echo $row['golongan_darah'] ?>"><br/>

  </div>
  <div class="form-group">
    <label for="nama">No Telepon</label>
    <input type="text" required name="telp" readonly="" class="form-control" value="<?php echo $row['no_telp'] ?>">
  </div>

</form>
<div class="clear" style="clear:both;"></div>

<?php
}

?>
<?php ob_flush(); ?>

