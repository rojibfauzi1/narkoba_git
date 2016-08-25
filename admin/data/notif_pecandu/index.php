<?php  ob_start(); ?>
<div class="judul">
	<h2>Daftar Pecandu</h2>
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
	$sql = "SELECT * FROM pecandu ";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['nama'] ?></td>

	  
	  <td>
	  <?php
	  if($row['status']==1){
	  	echo '<button class="btn btn-danger">Tidak Diterima</button>';
	  }elseif($row['status']==2){
	  	echo '<button class="btn btn-primary">Diterima</button>';
	  }else{
	  	echo '<button class="btn btn-warning">Menunggu</button>';
	  }
	  ?>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

