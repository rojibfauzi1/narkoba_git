<?php  ob_start(); ?>
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
	$sql = "SELECT * FROM pelapor right join chatting on chatting.id_pelapor=pelapor.id_pelapor
			right join detail_chatting on chatting.id_chat=detail_chatting.id_chat
			right join admin on detail_chatting.id_admin=admin.id_admin group by admin.id_admin
";
		
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['nama'] ?></td>
	  
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusjurusan&id=<?php echo $row['id_chat'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=chat_pelapor&id=<?php echo $row['id_chat'] ?>">Chat</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

