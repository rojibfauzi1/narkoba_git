<style type="text/css">
  .isi-komentar .row {
  margin: 20px auto;
}
.isi-komentar .image {
  width: 80px;
  height: 80px;
  background-color: #34495e;
  border-radius: 50%;
  overflow: hidden;
  text-align: center;
  vertical-align: center;
}
.isi-komentar .image span {
  color: #fff;
  font-size: 36px;
  line-height: 80px;
}
.isi-komentar .text {
  background-color: #34495e;
  padding-top: 10px;
  padding-bottom: 10px;
  color: #fff;
}
.isi-komentar .text:before{
  position: absolute;
  content: '';
  left: -18px;
  top: 0;
  border-top: 10px solid #34495e;
  border-right: 10px solid #34495e;
  border-left: 10px solid transparent;
  border-bottom: 10px solid transparent;
}
.isi-komentar strong {
  text-transform: uppercase;
}
</style>
<div class="judul">
	<h2>Topik Pertanyaan</h2>
</div>
<?php
if(isset($_POST['kirim'])){
  $komentar = $_POST['komentar'];
  $id_chat = $_GET['id'];
  $idtanya = $_POST['id_tanya'];

  
  $sql = "SELECT max(id_komentar) as id FROM komentar";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;




  $sql = "INSERT INTO komentar VALUES ('$idBaru','$id_admin','$idtanya','','$nama_admin','','','$komentar')";

/*print_r($sql);
die();*/
  $s = $conn->query($sql);

/*  if($s){
    header("location: ?p=tambahchat");
  }  */
}




$sql = "SELECT * FROM tanya_jawab join pelapor on tanya_jawab.id_pelapor=pelapor.id_pelapor Where id_tanya='$_GET[id]'";
$s = $conn->query($sql);
while ($row = $s->fetch_assoc()) {
?>
<div class="well col-md-8">
	<h4><?php echo $row['deskripsi'] ?></h4>
	<p>Author : <?php echo $row['nama_pelapor'] ?></p>
</div>
<?php
}
$q = "SELECT * FROM komentar 

WHERE id_tanya='$_GET[id]' order by id_komentar asc";
$sql = $conn->query($q);
?>
<div class="row isi-komentar">

  <div class="col-md-12">

    <?php
  while ($row = $sql->fetch_assoc()) {

     ?>

    <div class="row">

      <div class="col-md-2 col-xs-4">

        <div class="image">

          <span class="fa fa-user"></span>

        </div>

      </div>

      <div class="col-md-10 col-xs-8 text"> <strong><?php echo $row['nama']; ?></strong>
        &#45; <em><?php if($row['id_pelapor']==0){ echo 'admin';}else{echo "pelapor";} ?></em>
        <br />
        <p>
         
          <p><?php echo $row['deskripsi']; ?></p>

      </div>

    </div>
    <?php
                                        }
                                        ?>
</div>

</div>
<div class="row">

  <div class="col-md-6">
    <form role="form" method="post" action="">
    <?php
$sql = "SELECT * FROM tanya_jawab join pelapor on tanya_jawab.id_pelapor=pelapor.id_pelapor Where id_tanya='$_GET[id]'";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
?>
<input type="hidden" name="id_tanya" value="<?php echo $row['id_tanya'] ?>" />

      <div class="form-group">

        <label>Komentar kamu :</label>
        <br />
        <textarea class="form-control" required rows="3" name="komentar" placeholder="Komentar kamu"></textarea>

      </div>

      <div class="form-group">

        <button type="reset" class="btn btn-default" >Reset</button>

        <button type="submit" class="btn btn-primary" name="kirim" id="bottom" >Kirim Komentar</button>

      </div>

    </form>
  </div>

</div>
<script type="text/javascript">
  

$(window).load(function() {
  $("html, body").animate({ scrollTop: $(document).height() }, 1000);
});


</script>