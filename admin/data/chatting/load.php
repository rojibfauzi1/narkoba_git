<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc5';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
  echo "Gagal Koneksi";
}

if($_POST['type'] == 'load'){


    $id = $_POST['id'];
    $nama_admin = $_POST['nama_admin'];
    ?>
<div class="row" id="komentar_wrapper">

  <?php
$q = "SELECT * FROM detail_chatting left join chatting on detail_chatting.id_chat=chatting.id_chat
join pelapor on chatting.id_pelapor=pelapor.id_pelapor

where chatting.id_chat='$id' order by detail_chatting.id_detail_chat desc";
$sql = $conn->query($q);

  foreach($sql as $row) {
if($row['id_admin'] == 0){
     ?>
  <div class="col-md-2 col-xs-4">

    <div class="image">

      <span class="fa fa-user"></span>

    </div>

  </div>

  <div class="col-md-10 col-xs-8 text"> <strong><?php if($row['id_admin']==0){ echo $row['nama_pelapor'];}else{ echo $nama_admin;} ?></strong>
    &#45; <em><?php echo $row['tanggal']; ?></em>
    <br />
    <p>
      <?php echo $row['isi']; ?></p>
    <br/>

  </div>
  <?php
  }else{
    ?>

    <div class="col-md-offset-5 ">
<div class="col-md-2 col-xs-4">

    <div class="image">

      <span class="fa fa-user"></span>

    </div>

  </div>

  <div class="col-md-10 col-xs-8 text"> <strong><?php if($row['id_admin']==0){ echo $row['nama_pelapor'];}else{ echo $nama_admin;} ?></strong>
    &#45; <em><?php echo $row['tanggal']; ?></em>
    <br />
    <p>
      <?php echo $row['isi']; ?></p>
    <br/>

  </div>
</div>
  <?php }

                                        }
                                        ?></div>
<?php } ?>