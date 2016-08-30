<?php  ob_start(); ?>
<script type="text/javascript">
	$(function(){
		statusnotif();
	})

	function statusnotif(){
      $.ajax({
        url: 'data/pecandu/status_ajax.php', 
        success: function(data){
          $('#status').html(data);
          timer = setTimeout('statusnotif()',4000);
        }
      });
</script>
<div class="judul">
	<h2>Pecandu</h2>
</div>

<br/><br/>
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
	$sql = "SELECT * FROM pecandu";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>

	  <td><?php echo $row['nama'] ?></td>
	
	  <td>
	  	<a id="status" <?php if($row['status']==2 || $row['status']==1){echo 'class="btn btn-danger disabled"';}else{echo 'class="btn btn-danger"';} ?> href="?p=ubahpecandu2&id=<?php echo $row['id_pecandu'] ?>">Tidak Diterima</a>
	  	<a id="status" <?php if($row['status']==2 || $row['status']==1){echo 'class="btn btn-primary disabled"';}else{echo 'class="btn btn-primary"';} ?> href="?p=ubahpecandu&id=<?php echo $row['id_pecandu'] ?>">Terima</a>
	  	
	  	<a class="btn btn-default" href="?p=detailpecandu&id=<?php echo $row['id_pecandu'] ?>">Detail</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

