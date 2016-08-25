<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$sql = "SELECT max(id_pecandu) as id FROM pecandu";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;

$sql1 = "SELECT max(no_rekam_medis) as id FROM pecandu";
  $s1 = $conn->query($sql1);
  $row1 = $s1->fetch_assoc();
  $idku1 = $row1['id'];
  $nourut1 = (int)$idku1;
  $nourut1++;
  $idBaru1 = $nourut1;

?>
<div class="judul">
  <h2>Form Pendaftaran Pecandu</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="">
  <div class="form-group">
  <input type="hidden" name="id_pelapor" value="<?php echo $id_pelapor ?>" />
  <input type="hidden" name="id" value="<?php echo $idBaru ?>" />
    <label for="id">No Rekam Medis</label>
    <input type="text" required name="id_rekam" class="form-control"  value="<?php echo $idBaru1; ?>">
  </div>

  <div class="form-group">
    <label for="nama">Nama </label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="nama">No KTP/SIM</label>
    <input type="number" required name="ktp" class="form-control" placeholder="No KTP/SIM">
  </div>
  <div class="form-group">
    <label for="nama">Nama Ibu</label>
    <input type="text" required name="nama_ibu" class="form-control" placeholder="Nama Ibu">
  </div>
    <div class="form-group">
    <label for="nama">Nama Ayah</label>
    <input type="text" required name="nama_ayah" class="form-control" placeholder="Nama Ayah">
  </div>
  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <div class="input-group date">
      <input type="text" required name="tanggal" id="datepicker" class="form-control"><span class="input-group-addon"></span>
    </div>
  </div>
  <div class="form-group">
    <label for="nama">Umur</label>
    <input type="number" required name="umur" class="form-control" placeholder="Umur">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="radio" name="jk" value="laki-laki">Laki-Laki<br/>
    <input type="radio" name="jk" value="perempuan">Perempuan<br/>
  </div>
  <div class="form-group">
    <label for="jk">agama</label><br/>
    <input type="radio" name="agama" value="islam"> islam&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="agama" value="kristen"> kristen <br/>
    <input type="radio" name="agama" value="katolik"> katolik&nbsp;&nbsp;
    <input type="radio" name="agama" value="hindu"> hindu<br/>
    <input type="radio" name="agama" value="budha"> budha&nbsp;&nbsp;&nbsp;

  </div>
  <div class="form-group">
    <label for="nama">Suku</label>
    <input type="text" required name="suku" class="form-control" placeholder="Suku">
  </div>
    <div class="form-group">
    <label for="menikah">Status Menikah</label><br/>
    <input type="radio" name="menikah" value="menikah">Menikah<br/>
    <input type="radio" name="menikah" value="belum menikah">Belum Menikah<br/>
  </div>
  <div class="form-group">
    <label for="nama">Pekerjaan</label>
    <input type="text" required name="pekerjaan" class="form-control" placeholder="Pekerjaan">
  </div>
  <div class="form-group">
    <label for="nama">Alamat KTP</label>
    <textarea required name="alamat_ktp" class="form-control" placeholder="Alamat"></textarea>
  </div>
    <div class="form-group">
    <label for="nama">Alamat domisili</label>
    <textarea required name="alamat_domisili" class="form-control" placeholder="Alamat"></textarea>
  </div>
    <div class="form-group">
    <label for="jk">Golongan Darah</label><br/>
    <input type="radio" name="golongan" value="O"> O&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="golongan" value="A"> A <br/>
    <input type="radio" name="golongan" value="B"> B&nbsp;&nbsp;
    <input type="radio" name="golongan" value="AB"> AB<br/>


  </div>
  <div class="form-group">
    <label for="nama">No Telepon</label>
    <input type="number" required name="telp" class="form-control" placeholder="No Telepon">
  </div>

 
  <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $id_rekam = $_POST['id_rekam'];
  $id_pelapor = $_POST['id_pelapor'];
  $nama = $_POST['nama'];
  $no_ktp = $_POST['ktp'];
  $nama_ibu = $_POST['nama_ibu'];
  $nama_ayah = $_POST['nama_ayah'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  $umur = $_POST['umur'];
  $jk = $_POST['jk'];
  $agama = $_POST['agama'];
  $suku = $_POST['suku'];
  $status_menikah = $_POST['menikah'];
  $pekerjaan = $_POST['pekerjaan'];
  $alamat_ktp = $_POST['alamat_ktp'];
  $alamat_domisili = $_POST['alamat_domisili'];
  $golongan_darah = $_POST['golongan'];
  $tgl = date('Y-m-d H:i:s');
  $telp = $_POST['telp'];


 
$cek = "SELECT * FROM pecandu where id_pecandu='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){


   $sql = "INSERT INTO pecandu VALUES ('$id','','$id_pelapor','$id_rekam',
    '$nama','$no_ktp','$nama_ibu','$nama_ayah','$tanggal','$umur','$jk','$agama','$suku',
    '$status_menikah','$pekerjaan','$alamat_ktp','$alamat_domisili','$golongan_darah','$telp','3','$tgl')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
 
  }
}else{ 

 $sql = "INSERT INTO pecandu VALUES ('$id','','$id_pelapor','$id_rekam',
    '$nama','$no_ktp','$nama_ibu','$nama_ayah','$tanggal','$umur','$jk','$agama','$suku',
    '$status_menikah','$pekerjaan','$alamat_ktp','$alamat_domisili','$golongan_darah','$telp','3','$tgl')";
  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=pecandu");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

