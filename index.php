<?php
ob_start();
session_start();

include 'header.php';
/*include 'register.php';*/

?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
					<?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['nama_pelapor']; }?>
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
                <li class="active"><a href="#intro">Home</a></li>
                <li><a href="#service">Berita</a></li>
                <li><a href="tanya-jawab.php">Tanya Jawab</a></li>
                <?php if(isset($_SESSION['login1'])){
                    echo '
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
	
<?php
    include 'asset/php/proses-login.php';
?>

	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
					<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
					<h2 class="h-ultra">Sistem Informasi Rehabilitasi Narkoba</h2>
					</div>
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					<h4 class="h-light">Untuk <span class="color">Pelaporan</span> pada BNNP DIY</h4>
					</div>
						<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">

						<ul class="lead-list">
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Affordable monthly premium packages</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choose your favourite doctor</strong><br />Sit zril sanctus scaevola ei, ea usu movet graeco</span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Only use friendly environment</strong><br />Wisi lobortis eos ex, per at movet delectus, qui no vocent deleniti</span></li>
						</ul>

						</div>
						</div>


					</div>
					<div class="col-lg-6">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Register Pelapor <small>(It's free!)</small></h3>
									</div>
									<div class="panel-body">
									<?php
									$sql = "SELECT max(id_pelapor) as id FROM pelapor";
										$s = $conn->query($sql);
										$row = $s->fetch_assoc();
										$idku = $row['id'];
										$nourut = (int)$idku;
										$nourut++;
										$idBaru = $nourut; 
									
									$sql1 = "SELECT max(id_chat) as id FROM chatting";
										$s1 = $conn->query($sql1);
										$row1 = $s1->fetch_assoc();
										$idku1 = $row1['id'];
										$nourut1 = (int)$idku1;
										$nourut1++;
										$idBaru1 = $nourut1; 
									?>
									<form class="lead"  method="POST" action="register.php">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
											<input type="hidden" name="id_chat" value="<?php echo $idBaru1; ?>" />
											<input type="hidden" name="id" value="<?php echo $idBaru; ?>" />
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama" id="first_name" class="form-control input-md">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" id="last_name" class="form-control input-md">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" id="email" class="form-control input-md">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Phone number</label>
													<input type="number" name="telp" id="phone" class="form-control input-md">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 sol-md-12">
												<label>No.KTP/SIM</label>
												<input type="number" name="ktp" id="ktp" class="form-control input-md" />
											</div>
										</div>
										<br/>
										<input type="submit" value="Buat Baru" class="btn btn-skin btn-block btn-lg" name="kirim">
										
										<p class="lead-footer">* We'll contact you by phone & email later</p>
									
									</form>
								</div>
							</div>				
						
						</div>
						</div>
					</div>					
				</div>		
			</div>
		</div>		
    </section>
<!-- Button trigger modal -->


<!-- Modal -->

	<!-- /Section: intro -->

	<!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">
	
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							
							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Make an appoinment</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							
							<i class="fa fa-list-alt fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Choose your package</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							<i class="fa fa-user-md fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Help by specialist</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							
							<i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Get diagnostic report</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- /Section: boxes -->
	
	
	

	<!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-100" >

		<div class="container">

        <div class="row">

			<div class="col-lg-8 col-lg-offset-2" style="margin-bottom:50px;padding-top:20px">
					<div class="wow lightSpeedIn" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Berita</h2>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
		<?php
				
			 $limit = 5;
            $jumlah_record = $conn->query("SELECT * from berita");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;

			$sql = $conn->query("SELECT * FROM berita order by id_berita desc limit $start,$limit");
			while($row = $sql->fetch_assoc()){
			
			
		?>
			<div class="col-sm-12 col-md-12">
				
				<div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-stethoscope fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light"><?php echo $row['judul'] ?></h5>
						<p><?php echo substr($row['isi'], 0,200)  ?></p>
					</div>
                </div>
				</div>
				



            </div>

			<?php } ?>
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
		</div>
	</section>
	<!-- /Section: services -->
	

	<!-- Section: team -->
    

	
		
	
	
	
	
	

	
	
	<section id="partner" class="home-section paddingbot-60">	
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow lightSpeedIn" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Our partner</h2>
					<p>Take charge of your health today with our specially designed health packages</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>
		
           <div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="partner">
						<a href="#"><img src="asset/img/dummy/partner-1.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="partner">
						<a href="#"><img src="asset/img/dummy/partner-2.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="partner">
						<a href="#"><img src="asset/img/dummy/partner-3.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="partner">
						<a href="#"><img src="asset/img/dummy/partner-4.jpg" alt="" /></a>
						</div>
					</div>
				</div>
            </div>
	</section>	

<?php
include 'asset/php/footer.php';

?>