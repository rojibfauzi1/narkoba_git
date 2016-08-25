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


    $id_pelapor = $_POST['id_pelapor'];
    $nama_pelapor = $_POST['nama_pelapor'];
    ?>
<div class="row" id="komentar_wrapper" style="background-color:#ffffff; padding:20px; border-radius:4%;">

  <?php
    $sql2 = "SELECT * FROM chatting where id_pelapor='$id_pelapor' ";
  $s2 = $conn->query($sql2);
  $row2 = $s2->fetch_assoc();

  $pelapor1 = $row2['id_pelapor'] == $id_pelapor;

    if( $pelapor1 != 1 ){
       
      $sql = "SELECT max(id_chat) as id FROM chatting";
      $s = $conn->query($sql);
      $row = $s->fetch_assoc();
      $idku = $row['id'];
      $nourut = (int)$idku;
      $nourut++;
      $idBaru = $nourut;

    $sql = "INSERT INTO chatting VALUES ('$idBaru','$id_pelapor')";
    $s = $conn->query($sql);
 
  }else{

$q = "SELECT detail_chatting.id_admin,isi,tanggal,detail_chatting.id_chat FROM detail_chatting  join chatting on detail_chatting.id_chat=chatting.id_chat

where chatting.id_pelapor='$id_pelapor' order by detail_chatting.id_detail_chat desc";
$sql = $conn->query($q);

  while($row = $sql->fetch_assoc()) {
    if($row['id_admin'] == 0){
     ?>

     <div class="col-md-offset-6" >
       
  <div class="col-md-2 col-xs-4" >

    <div class="image">

      <span class="fa fa-user"></span>

    </div>

  </div>

  <div class="col-md-10 col-xs-8 text"> <strong><?php if($row['id_admin'] == 0){ echo $nama_pelapor;}else{ echo 'ADMIN';} ?></strong>
    &#45; <em><?php echo $row['tanggal']; ?></em>
    <br />
    <p>
      <?php echo $row['isi']; ?></p>
    <br/>

  </div>
     </div>
  <?php
        }else{
          ?>
  <div class="col-md-2 col-xs-4">

    <div class="image">

      <span class="fa fa-user"></span>

    </div>

  </div>

  <div class="col-md-10 col-xs-8 text"> <strong><?php if($row['id_admin'] == 0){ echo $nama_pelapor;}else{ echo 'ADMIN';} ?></strong>
    &#45; <em><?php echo $row['tanggal']; ?></em>
    <br />
    <p>
      <?php echo $row['isi']; ?></p>
    <br/>

  </div>

        <?php }
      }

                                        }
                                        ?></div>
<?php } ?>