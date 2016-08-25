
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

<?php

/*    include 'proses-login.php';*/


?>       
