<?php
if(isset($_POST['kirim'])){
  $komentar = $_POST['komentar'];

/*  $tanggal = now();*/
  $sql = "SELECT max(id_tanya) as id FROM tanya_jawab";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;

  $sql = "INSERT INTO tanya_jawab VALUES ('$idBaru','$id_pelapor','','$ktp','$komentar',now())";
/*print_r($sql);
die();*/
  $s = $conn->query($sql);
 if($s){
  echo "<script>alert('Pertanyaan berhasil dikirim');</script>";
    header("Refresh:0; URL=?p=tanyajawab");
  }  
}
?>
<div class="judul">
  <h2>Isi Pertanyaan</h2>
</div>

<div class="row">

  <div class="col-md-6">
    <form method="post" action="">

      <div class="form-group">

        <label></label>
        <br />
        <textarea class="form-control" required rows="3" name="komentar" <?php if(!isset($_SESSION['login1'])) echo 'readonly'; ?>placeholder="Pertanyaan kamu"></textarea>

      </div>

      <div class="form-group">

        <button type="reset" class="btn btn-default" <?php if(!isset($_SESSION['login1'])) echo 'disabled'; ?>>Reset</button>

        <button type="submit" class="btn btn-primary" name="kirim" <?php if(!isset($_SESSION['login1'])) echo 'disabled'; ?>>Kirim </button>

      </div>

    </form>
  </div>

</div>