<div class="judul">
  <h2>Detail Pelapor</h2>
</div>
<br/><br/>
<?php
$sql = "SELECT * FROM pelapor where id_pelapor=$_GET[id]";
$s = $conn->query($sql);
while ($row = $s->fetch_assoc()) {
?>

<div class="col-md-6">
  
  <div class="row">
    
      <div class="form-group">
      <h4><span style="color:blue">Nama</span> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: <?php echo $row['nama_pelapor'] ?></h4>
      </div>
    


    
      <div class="form-group">
        
      <h4><span style="color:blue">Email</span> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: <?php echo $row['email'] ?></h4>
      </div>    
      <div class="form-group">
 
      <h4><span style="color:blue">Phone number</span> : <?php echo $row['no_telp'] ?></h4>
      </div>
  
  
      <div class="form-group">

      <h4><span style="color:blue">No. KTP/SIM</span> &ensp;&ensp;: <?php echo $row['no_ktp/sim'] ?></h4>
      </div>
  
  </div>


<?php } ?>
</div>