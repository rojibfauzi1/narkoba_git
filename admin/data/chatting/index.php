<?php  ob_start(); ?>
<script type="text/javascript">
	$(function(){

		setTimeout(notifchat1,4000);
	})
    function notifchat1(){
      var pelapor = $('.pelapor').val();

      $.ajax({
        url: 'data/chatting/notif_ajax.php',
        method : "POST",
        dataType : "html",
        data : {pelapor,type:'load_notif'}, 
        success: function(data){
          $('.notif').html(data);
         
        }
      });
    }

</script>
<div class="judul">
	<h2>Chatting</h2>
</div>

<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Nama</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM pelapor join chatting on chatting.id_pelapor=pelapor.id_pelapor
	 group by chatting.id_pelapor";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['nama_pelapor'] ?></td>
	  
	  <input type="hidden" id="id_pelapor" value="<?php echo $row['id_pelapor'] ?>" />
	  <input type="hidden" id="id_admin" value="<?php echo $row['id_admin'] ?>" />
	  <td>
	  	
	  	<a class="btn btn-warning" href="?p=tambahchat&id=<?php echo $row['id_chat'] ?>">Chat        <span class="badge notif" ></span></a>
	  </td>
	  <input type="hidden" class="pelapor" value="<?php echo $row['id_pelapor'] ?>" />
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

