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
  <h2>Tambah Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahberita">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul</label>
    <input type="text" required name="judul" class="form-control" placeholder="Judul">
  </div>

  <div class="form-group">
    <label for="nama">Isi</label>
    <textarea required name="isi" class="form-control"></textarea>
    
  </div>

 




 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Berita</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $tanggal = date('Y-m-d h:i:s');
  $isi = $_POST['isi'];
  $admin = $_SESSION['id_admin'];
  

 
  
 
$cek = "SELECT * FROM berita where id_berita='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$sql = "SELECT max(id_admin) as id FROM admin";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;
   $sql = "INSERT INTO berita VALUES ('$idBaru','$admin','$judul','$isi','$tanggal')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }
}else{ 

 $sql = "INSERT INTO berita VALUES ('$idBaru','$admin','$judul','$isi','$tanggal')";
/*print_r($sql);
print_r($sql);
die();
die();*/
  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

