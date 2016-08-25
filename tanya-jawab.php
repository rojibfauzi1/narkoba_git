<?php
include 'header.php';
?>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<script type="text/javascript">
	$(function(){
		$('#komen_data1').slimScroll({
			height:'500px',
			alwaysVisible: true,
			
		})
	});



</script>


<div id="wrapper">
	<?php 
	include 'asset/php/proses-login.php';
	 ?>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">Call us now +62 008 65 001</p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="asset/img/logo.png" alt="" width="150" height="40" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="index.php">Berita</a></li>
				<li><a href="tanya-jawab.php">Tanya Jawab</a></li>
				
				<?php if(isset($_SESSION['login1'])){
					echo '<li><a href="#" >HAY.'.$_SESSION['nama_pelapor'].'</a></li>
					<li><a href="admin/pelapor.php">ADMINISTRATOR</a></li>
					<li><a href="admin/logout.php">LOGOUT</a></li>';
				} else{
				 echo '
				 <li><a href="index.php">Register</a></li>
				 <li><a href="" data-toggle="modal" data-target="#myModal">Login</a></li>';
				  } ?>
			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	




	
	
	<section id="callaction" class="home-section paddingtop-100" style="margin-top:20px">	
           <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="callaction bg-gray">
							<div class="row">
								<div class="col-md-8">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<h3>Tanya Jawab</h3>
									<p>Lorem ipsum dolor sit amet consectetur adipiscing elit uisque interdum ante eget faucibus. </p>
									</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
            </div>
	</section>	
	

	<!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">
		<div class="container">
		<?php
				
			 $limit = 1;
            $jumlah_record = $conn->query("SELECT * from tanya_jawab");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;
/*print_r($start);
die();*/
			$sql = $conn->query("SELECT * FROM tanya_jawab order by id_tanya desc limit $start,$limit");
			$row = $sql->fetch_assoc();
			$tanya = $row['id_tanya'];
/*			
						 $limit = 5;
            $jumlah_record = $conn->query("SELECT * from berita");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;

			$sql = $conn->query("SELECT * FROM berita order by id_berita desc limit $start,$limit");
			while($row = $sql->fetch_assoc()){*/
		?>

        <div class="row">
			<div class="col-sm-6 col-md-6">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
				<div class="well">
					<h3>Pertanyaan</h3>
					<p><?php echo $row['deskripsi'] ?></p>
				</div>
				</div>
            </div>
		

			<div class="col-sm-6 col-md-6" >
			<div  class="row" id="komen_data1" style="margin-left:10px">


			<?php
			
			
			$sql = "SELECT * FROM komentar where id_tanya=$tanya order by id_komentar desc";
			$s = $conn->query($sql);
			foreach($s as $row2){

			?>	

				<div class="wow fadeInRight" data-wow-delay="0.3s" >
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-user-md fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light"><?php echo $row2['nama']; ?></h5>
						<p><?php echo $row2['deskripsi_komen'] ?></p>
					</div>
                </div>
				</div>
			<?php  } ?>	

            </div>
			  <div class="col-md-12">


      <div class="form-group">
      <form action="komentar.php" method="POST">
      	    <?php
$sql = "SELECT * FROM tanya_jawab join pelapor on tanya_jawab.id_pelapor=pelapor.id_pelapor Where id_tanya='$page'";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
?>
      <p><strong>Silahkan <a href="#" data-toggle="modal" data-target="#myModal">Masuk</a> atau <a href="index.php" >Daftar</a> untuk memberikan komentar</strong></p>
        <label>Komentar kamu :</label>
        <br />
        
<?php if(isset($_SESSION['login1'])){
?> 
<input type="hidden" name="id_pelapor" value="<?php echo $_SESSION['id_pelapor'] ?>" />
<input type="hidden" name="hp" value="<?php echo $_SESSION['no_hp'] ?>" />
<input type="hidden" name="ktp" value="<?php echo $_SESSION['no_ktp'] ?>" />
<input type="hidden" name="nama_pelapor" value="<?php echo $_SESSION['nama_pelapor'] ?>" />
<input type="hidden" name="id" value="<?php echo $page ?>" />
<input type="hidden" name="id_tanya" value="<?php echo $row['id_tanya'] ?>" />

<textarea class="form-control"  required rows="3" name="komentar" placeholder="Komentar kamu" id="textarea_komen" ></textarea> <?php
}elseif(isset($_SESSION['login1'])){
?> 

<textarea class="form-control"  required rows="3" name="komentar" placeholder="Komentar kamu" id="textarea_komen" ></textarea> <?php 
}else{
?> <textarea class="form-control"  required rows="3" name="komentar" placeholder="Komentar kamu" id="textarea_komen" disabled="" ></textarea> <?php
}  ?>

      </div>

      <div class="form-group">
<?php

?>
      

        
<?php if(isset($_SESSION['login1'])){
?> <input type="submit" class="btn btn-primary" name="kirim"  id="kirim_komen" value="Kirim Komentar"/> <?php
}elseif(isset($_SESSION['login1'])){
?> <input type="submit" class="btn btn-primary" name="kirim"  id="kirim_komen" value="Kirim Komentar"/> <?php
}else{
?><input type="submit" class="btn btn-primary" name="kirim"  id="kirim_komen" value="Kirim Komentar"  disabled=""/> <?php
} ?>

      </div>
      </form>


  </div>

</div>
        </div>		
		</div>
		<div class="paging" style="margin-top:50px">
            <?php
            if($page > 1){

            ?>
            <a href="?page=<?php echo $page - 1 ?>"><</a>
            <?php
            for($x=1;$x<=$halaman;$x++){
            ?>
              <a href="?page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
              }
            }elseif($page==1){
              for($x=1;$x<=$halaman;$x++){
              ?>
              <a href="?page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
            }
            ?>
            <a href="?page=<?php echo $page +1 ?>">></a>
           <?php } ?> 
          </div>
          <br/>
		</div>
	</section>
	<!-- /Section: services -->
	


	
		

	
	

	


	


	<footer>
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>About Medicio</h5>
						<p>
						Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
						</p>
					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Information</h5>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Laboratory</a></li>
							<li><a href="#">Medical treatment</a></li>
							<li><a href="#">Terms & conditions</a></li>
						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Medicio center</h5>
						<p>
						Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
						</p>
						<ul>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Saturday, 8am to 10pm
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> +62 0888 904 711
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> hello@medicio.com
							</li>

						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Our location</h5>
						<p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>		
						
					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Follow us</h5>
						<ul class="company-social">
								<li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
								<li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
						</ul>
					</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInLeft" data-wow-delay="0.1s">
					<div class="text-left">
					<p>&copy;Copyright 2015 - Medicio. All rights reserved.</p>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInRight" data-wow-delay="0.1s">
					<div class="text-right">
						<p><a href="http://bootstraptaste.com/">Bootstrap Themes</a> by BootstrapTaste</p>
					</div>
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                    -->
					</div>
				</div>
			</div>	
		</div>
		</div>
	</footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->

	<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="asset/js/jquery.easing.min.js"></script>
	<script src="asset/js/wow.min.js"></script>
	<script src="asset/js/jquery.appear.js"></script>
	<script src="asset/js/stellar.js"></script>
	<script src="asset/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="asset/js/owl.carousel.min.js"></script>
	<script src="asset/js/nivo-lightbox.min.js"></script>
    <script src="asset/js/custom.js"></script>


</body>

</html>
