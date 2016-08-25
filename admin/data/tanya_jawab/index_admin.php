<?php  ob_start(); ?>
<div class="judul">
	<h2>Tanya Jawab</h2>
</div>
<?php
	$sql = "SELECT * FROM tanya_jawab ";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
if($login=='pelapor')
	{
		echo "<input class='btn btn-primary' type='button' value='Mulai Bertanya' onclick='window.location.href=\"?p=tambahtanya\"'> ";
	}
}
?>
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Pertanyaan</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM tanya_jawab ";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo substr($row['deskripsi'], 0,20);  ?></td>
	  
	  
	  <td>
	  	<a class="btn btn-primary" href="?p=komentaradmin&id=<?php echo $row['id_tanya'] ?>">Komentar</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

