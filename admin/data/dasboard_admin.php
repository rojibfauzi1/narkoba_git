<?php
$sql = $conn->query("select
  DATE_FORMAT(tgl,'%M %Y') as bulan, 
  count(case when jenis_kelamin='laki-laki' then 1 end) as 'laki-laki',
  count(case when jenis_kelamin='perempuan' then 1 end) as perempuan 
  
from pecandu group by DATE_FORMAT(tgl,'%M') order by tgl asc limit 0,11");

while($row = $sql->fetch_assoc()){
/*	if($row['jenis_kelamin'] == 'laki-laki'){
		$cowo = $row['jenis_kelamin'];
		$json = json_encode($cowo);
		echo $json;
	}*/
	$output[] = $row;
/*	$hasil = json_encode($output);
	echo $hasil;*/

}
/*if($row['jenis_kelamin'] == 'laki-laki' ) {
	$jml = $sql->num_rows;
/*	print_r($jml);
	die();*/
/*$output = json_encode($row);
$hasil = json_decode($output);
print_r($hasil);
die();*/

?> 
<H2><br/></H2>
<h3 align="center" style="margin-bottom:50px">SELAMAT DATANG DI HALAMAN ADMIN</h3>
<!-- <div class="gambar" align="center">
	<img  width="200px"  src="../upload/admin/<?php echo $gambar ?>" >
</div> -->
<h4 style="margin-top:20px" align="center"><?php echo strtoupper($user) ?></h4>

          <div class="col-md-offset-3 col-centered box box-primary " style="width:50%; margin-top:50px" >
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pecandu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px; "></div>
            </div>
            <!-- /.box-body -->
          </div>


