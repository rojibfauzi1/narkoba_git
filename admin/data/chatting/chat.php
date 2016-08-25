<?php
$sql1 = "SELECT * FROM chatting where id_chat='$_GET[id]'";
$s1 = $conn->query($sql1);
$row1 = $s1->fetch_assoc(); 

?>
<input type="hidden" id="pelapor" value="<?php echo $row1['id_pelapor'] ?>" />
    <input id="id_admin" type="hidden" value="<?php echo $id_admin ?>" />
    <input id="nama_admin" type="hidden" value="<?php echo $nama_admin ?>"/>
    <input id="id_pelapor1" type="hidden" value="<?php echo $_GET['id'] ?>"/>
<input type="hidden" id="id" value="<?php echo $_GET['id'] ?>" />
<script type="text/javascript">
/*    var auto_refresh = setInterval(
    function () {
       $('#komentar_wrapper').load(load1()).fadeIn("slow");
    }, 1000); // refresh setiap 10000 millisecond*/

  $(function(){
  /*load1();*/
  setInterval(load1,1000);
notifchatadmin();
updatechatadmin();
$('#komentar_wrapper').slimScroll({
    height: '500px',
    alwaysVisible: true
});
});
function load1(){
  var id = $('#id').val();
  var nama_admin = $('#nama_admin').val();

  $.ajax({
    url   : 'data/chatting/load.php',
    method : "POST",
    dataType : "html",
    data  : {id,nama_admin,type:'load'},
    success : function(data){
      $('#komentar_wrapper').html(data);
    }
  })
}

  function notifchatadmin(){
      var id_pelapor = $('#id_pelapor').val();
      var id_admin = $('#id_admin').val();

      $.ajax({
        url: 'data/chattin/notif_ajax.php',
        method : "POST",
        dataType : "html",
        data : {id_pelapor,id_admin,type:'load_notif'}, 
        success: function(data){
          $('#notif_chatadmin').html(data);
          timer = setTimeout('notifchat()',4000);
        }
      });
    }

function updatechatadmin(){
  var pelapor = $('#pelapor').val();
  var id_admin = $('#id_admin').val();
  $.ajax({
    url   : 'data/chatting/update_ajax.php',
    method : "POST",
    dataType : "html",
    data : {pelapor,id_admin,type:'update'},
    success : function(data){
      $('#textarea_komen').prepend(data);
    }
  });
}
</script>

<div class="row">

  <div class="col-md-6">

<!-- <span class="badge" id="notif_chatadmin">2</span> -->
      <div class="form-group">

        <label>Komentar kamu :</label>
        <br />
        <textarea class="form-control" onclick="updatechatadmin()" required rows="3" name="komentar" placeholder="Komentar kamu" id="textarea_komen"></textarea>

      </div>

      <div class="form-group">

        <button type="reset" class="btn btn-default" >Reset</button>

        <input type="submit" class="btn btn-primary" name="kirim_komen" id="kirim_komen" value="Kirim Komentar"/>

      </div>


  </div>

</div>

<div class="row isi-komentar" >

  <div class="col-md-6">

<input type="hidden" id="id_chat" value="<?php echo $_GET['id'] ?>" />

    <div class="row" id="komentar_wrapper" style="background-color:#ffffff;padding:20px 10px 20px 50px;border-radius:4%;">
<?php
/*
$q = "SELECT * FROM detail_chatting  join chatting on detail_chatting.id_chat=chatting.id_chat
join pelapor on chatting.id_pelapor=pelapor.id_pelapor

where chatting.id_chat='$_GET[id]' order by detail_chatting.id_detail_chat desc";
$sql = $conn->query($q);

  $row = $sql->fetch_assoc(); */

     ?>
<!-- 
      <input type="hidden" id="id_pelapor" value="<?php echo $row['id_pelapor'] ?>" />
      
      <input type="text" id="tanggal" value="<?php echo $row['tanggal'] ?>" /> -->
    <?php
                                        
                                        ?></div>
    </div>
</div>

<script type="text/javascript">

$('#kirim_komen').on('click',function(){
  var isi = $('#textarea_komen').val();
  var nama_admin = $('#nama_admin').val();
  var tanggal = $('#tanggal').val();
  var id_chat = $('#id_chat').val();
  var id_admin = $('#id_admin').val();


  $.ajax({
    url   :  'data/chatting/chat_ajax.php',
    method  :  "POST",
    dataType  :   'html',
    data    :  { isi, nama_admin, id_admin,  tanggal, id_chat, type:'insert'},
    success : function(data){
/*      console.log(data);
      $('#komentar_wrapper').prepend("<p>"+ isi +"</p>");*/
      if(data=='0'){
        alert('Anda harus login dulu');
      }else{
        $('#textarea_komen').val('');
        $('#komentar_wrapper').prepend(data);
      }
    }
  });
  
});

</script>
