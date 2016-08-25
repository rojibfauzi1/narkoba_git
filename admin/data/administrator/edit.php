<?php


if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];

  $nip = $_POST['nip'];
  $password = $_POST['password'];
  $no_telp = $_POST['no_telp'];
  $alamat = $_POST['alamat'];

 

$s = "UPDATE admin SET id_admin='$id',nama='$nama',nip='$nip',
    password='$password',no_telp='$no_telp',alamat='$alamat'";
  $s .= " WHERE kd_admin='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=admin");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM admin WHERE id_admin = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Administrator</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="">
  <div class="form-group">
    <!-- <label for="id">ID</label> -->
    <input type="hidden" required name="id" class="form-control" readOnly value="<?php echo $id; ?>">
  </div>
    <div class="form-group">
    <label for="nama">NIP</label>
    <input type="text" required name="nip" value="<?php echo $row['nip'] ?>" class="form-control" placeholder="NIP">
  </div>

  <div class="form-group">
    <label for="nama">Nama Lengkap</label>
    <input type="text" required name="nama" class="form-control" value="<?php echo $row['nama'] ?>" placeholder="Nama Lengkap">
  </div>

  <div class="form-group">
    <label for="nama">password</label>
    <input type="password" required name="password" class="form-control" placeholder="password">
  </div>
  <div class="form-group">
    <label for="nama">no_telp</label>
    <input type="text" required name="no_telp" class="form-control" value="<?php echo $row['no_telp'] ?>" placeholder="no_telp">
  </div>
    <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea  required name="alamat" class="form-control" placeholder="alamat"><?php  echo $row['alamat'] ?></textarea>
  </div>
  <br/><br/><br/><br/><br/><button type="submit" name="edit" class="btn btn-primary">Edit Administrator</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
