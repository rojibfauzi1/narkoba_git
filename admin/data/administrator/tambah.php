
<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];

  $nip = $_POST['nip'];
  $password = $_POST['password'];
  $no_telp = $_POST['no_telp'];
  $alamat = $_POST['alamat'];

 
$cek = "SELECT * FROM admin where id_admin='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$sql = "SELECT max(id_admin) as id FROM admin";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;

   $sql = "INSERT INTO admin VALUES ('$id','$nip','$password','$nama','$no_telp','$alamat')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=admin");
  }
}else{ 

   $sql = "INSERT INTO admin VALUES ('$id','$nip','$password','$nama','$no_telp','$alamat')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=admin");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>
<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$sql = "SELECT max(id_admin) as id FROM admin";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;

?>


<div class="judul">
  <h2>Tambah Administrator</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="">
  <div class="form-group">
    <!-- <label for="id">ID</label> -->
    <input type="hidden" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
    <div class="form-group">
    <label for="nama">NIP</label>
    <input type="text" required name="nip" class="form-control" placeholder="NIP">
  </div>

  <div class="form-group">
    <label for="nama">Nama Lengkap</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama Lengkap">
  </div>

  <div class="form-group">
    <label for="nama">password</label>
    <input type="password" required name="password" class="form-control" placeholder="password">
  </div>
  <div class="form-group">
    <label for="nama">no_telp</label>
    <input type="text" required name="no_telp" class="form-control" placeholder="no_telp">
  </div>
    <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea  required name="alamat" class="form-control" placeholder="alamat"></textarea>
  </div>
 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Administrator</button>
</form>
<div class="clear" style="clear:both;"></div>