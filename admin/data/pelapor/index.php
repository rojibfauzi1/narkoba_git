<?php  ob_start(); ?>
<div class="judul">
	<h2>Pelapor</h2>
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
	$sql = "SELECT * FROM pelapor";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>

	  <td><?php echo $row['nama_pelapor'] ?></td>
	
	  <td>
	  	<a class="btn btn-warning" href="?p=detailpelapor&id=<?php echo $row['id_pelapor'] ?>">Detail</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

