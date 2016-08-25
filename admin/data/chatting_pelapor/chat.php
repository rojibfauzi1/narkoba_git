  
    <input id="nama_pelapor" type="hidden" value="<?php echo $nama_pelapor ?>"/>
    <input id="id_pelapor" type="hidden" value="<?php echo $id_pelapor ?>" />
<script type="text/javascript">
/*    var auto_refresh = setInterval(
    function () {
       $('#komentar_wrapper').load(load2()).fadeIn("slow");
    }, 1000); // refresh setiap 10000 millisecond*/

  $(function(){
/*load2()*/
  setInterval(load2,1000);
$('#komentar_wrapper').slimScroll({
    height: '500px',
    alwaysVisible: true
});
});
function load2(){
  var id_pelapor = $('#id_pelapor').val();
  var nama_pelapor = $('#nama_pelapor').val();

  $.ajax({
    url   : 'data/chatting_pelapor/load.php',
    method : "POST",
    dataType : "html",
    data  : {id_pelapor,nama_pelapor,type:'load'},
    success : function(data){
      $('#komentar_wrapper').html(data);
/*      timer = setTimeout('load2()',4000);*/
    }
  })
}

function updatechat(){
  var id_pelapor = $('#id_pelapor').val();

  $.ajax({
    url   : 'data/chatting_pelapor/update_ajax.php',
    method : "POST",
    dataType : "html",
    data : {id_pelapor,type:'update'},
    success : function(data){

    }
  });
}
</script>
<?php

  $sql = "SELECT * FROM chatting ";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
/*  print_r($id_pelapor);
  die();*/
    $sql2 = "SELECT * FROM chatting where id_pelapor='$id_pelapor' ";
  $s2 = $conn->query($sql2);
  $row2 = $s2->fetch_assoc();
  ?>
<input type="hidden" value="<?php echo $row2['id_chat'] ?>" id="id_chat1">

  <?php
  $pelapor1 = $row2['id_pelapor'] == $id_pelapor;

/*  print_r($pelapor1);
  die();*/
  
/*  $pelapor = $data_pelapor->num_rows;*/
/*  if( $pelapor1 != 1 ){
       
      $sql = "SELECT max(id_chat) as id FROM chatting";
      $s = $conn->query($sql);
      $row = $s->fetch_assoc();
      $idku = $row['id'];
      $nourut = (int)$idku;
      $nourut++;
      $idBaru = $nourut;

    $sql = "INSERT INTO chatting VALUES ('$idBaru','$id_pelapor')";
    $s = $conn->query($sql);
 
  }else{*/


?>

<div class="row">

  <div class="col-md-6">


      <div class="form-group">

        <label>Komentar kamu :</label>
        <br />
        <textarea class="form-control" onclick="updatechat()" required rows="3" name="komentar" placeholder="Komentar kamu" id="textarea_komen1"></textarea>

      </div>

      <div class="form-group">

        <button type="reset" class="btn btn-default" >Reset</button>

        <input type="submit" class="btn btn-primary"  id="kirim_komen1" value="Kirim Komentar"/>

      </div>


  </div>

</div>

<div class="row isi-komentar">

  <div class="col-md-6">


    <div class="row" id="komentar_wrapper" style="background-color:#ffffff; padding:20px; border-radius:4%;">
<?php

$q = "SELECT detail_chatting.id_admin,isi,tanggal,detail_chatting.id_chat FROM detail_chatting  join chatting on detail_chatting.id_chat=chatting.id_chat

where chatting.id_pelapor='$id_pelapor' order by detail_chatting.id_detail_chat desc";
$sql = $conn->query($q);

  foreach($sql as $row) {
if($row['id_admin'] == 0){
     ?>

      <input type="hidden" id="id_chat" value="<?php echo $row['id_chat'] ?>" />
      <input type="hidden" id="tanggal" value="<?php echo $row['tanggal'] ?>" />


       <?php }

                                        }
                                        ?></div>
    </div>

</div>

<script type="text/javascript">
$(function(){
/*  load();
  setTimeout(load,1000);*/
$('#komentar_wrapper').slimScroll({
    height: '500px',
    alwaysVisible: true
});

});
$('#kirim_komen1').on('click',function(){
  var isi = $('#textarea_komen1').val();
  var nama_pelapor = $('#nama_pelapor').val();
  var tanggal = $('#tanggal').val();
  var id_chat = $('#id_chat1').val();
  var id_pelapor = $('#id_pelapor').val();


  $.ajax({
    url   :  'data/chatting_pelapor/chat_ajax.php',
    method  :  "POST",
    dataType  :   'html',
    data    :  {isi_komentar: isi, nama: nama_pelapor, tanggal_baru: tanggal,id_pelapor,id_chat, type:'insert'},
    success : function(data){
/*      console.log(data);
      $('#komentar_wrapper').prepend("<p>"+ isi +"</p>");*/
      if(data=='0'){
        alert('Anda harus login dulu');
      }else{
        $('#textarea_komen1').val('');
        $('#komentar_wrapper').prepend(data);
      }
    }
  });
  
});


</script>
<?php
/*}*/
  
?>