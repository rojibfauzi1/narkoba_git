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
/*  $tanggal = now();*/
  
  $sql = "SELECT max(id_komentar) as id FROM komentar";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;

/*  if($nama_pelapor && $id_pelapor){
  	 $id_pelapor1 = $id_pelapor;
  	 $pelapor = $nama_pelapor;  
  }elseif($nama_admin && $id_admin){
  	 $id_admin1 = $id_admin;
  	 $admin = $nama_admin;

  }*/



  $sql = "INSERT INTO komentar VALUES ('$idBaru','','$idtanya','$id_pelapor','$nama_pelapor','$hp','$ktp','$komentar',now())";

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
	<h4><?php echo $row['deskripsi'] ?></h4></p><br/><br/><br/><br/>
	<p>Author : <?php echo $row['nama_pelapor'] ?> </p>
  <p>Published :  <?php echo $row['tanggal'] ?></p>
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

      <div class="col-md-2 col-xs-4" >

        <div class="image" >

          <span class="fa fa-user" ></span>

        </div>

      </div>

      <div class="col-md-4 col-xs-2 text" > <strong><?php echo $row['nama']; ?></strong>
        &#45; <em><?php if($row['id_pelapor']==0){ echo 'admin';}else{echo "pelapor";} ?></em>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <em align="right"><?php echo $row['tanggal'] ?></em>
        <br />
        <p>
         
          <p><?php echo $row['deskripsi_komen']; ?></p>

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
      <div class="form-group">
<input type="hidden" name="id_tanya" value="<?php echo $row['id_tanya'] ?>" />

        <label>Komentar kamu :</label>
        <br />
        <textarea class="form-control" required rows="3" name="komentar" placeholder="Komentar kamu"></textarea>

      </div>

      <div class="form-group">

        <button type="reset" class="btn btn-default" >Reset</button>

        <button type="submit" class="btn btn-primary" name="kirim" >Kirim Komentar</button>

      </div>

    </form>
  </div>

</div>
<script type="text/javascript">
  

  $(window).load(function() {
  $("html, body").animate({ scrollTop: $(document).height() }, 1000);
});


</script>