<?php  
session_start();
ob_start();

require_once ('../conf/koneksi.php');
include 'asset/custom/php/head.php'; 


$username = $_SESSION['nama'];
$user = $_SESSION['nama'];
$nama_admin = $_SESSION['nama'];
$id_admin = $_SESSION['id_admin'];
$login = $_SESSION['login'];
$status = $_SESSION['status'];


if($login != '1'){
  session_destroy();
  /*header("Refresh: 90; URL=login.php");*/
  header("location: ../index.php");
}

?>
<script type="text/javascript">
  $(function(){
 
    notifchatadmin1();
  });



      function notifchatadmin1(){

      var id_admin = $('#id_admin').val();

      $.ajax({
        url: 'data/chatting/notif_ajax2.php',
        method : "POST",
        dataType : "html",
        data : {id_admin,type:'load_notif'}, 
        success: function(data){
          $('#notif_chatadmin1').html(data);
          timer = setTimeout('notifchatadmin1()',4000);
        }
      });
    }
/*
    $('#contoh').highcharts({
    chart: {
      type: 'column'
    },
    title: {
      text: 'PECANDU BERDASARKAN JENIS KELAMIN'
    },
    subtitle: {
      text: '<?php echo $year ?>'
    },
    xAxis: {
      categories: <?php echo json_encode($categories); ?>,
      labels: {
        rotation: 0,
        align: 'center'
      }
    },
    series: <?php echo json_encode($series); ?>
  });*/
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'asset/custom/php/header.php'; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="../upload/admin/<?php echo $gambar ?>" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info" >
          <p><?php echo $username ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?p=dasboard_admin"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="?p=admin"><i class="fa fa-circle-o"></i> Admin</a></li>

          </ul>
        </li>
      
<!--         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            
            
            
            <li><a href="?p=siswa"><i class="fa fa-circle-o"></i>Siswa</a></li>
            <li><a href="?p=kelas"><i class="fa fa-circle-o"></i>Kelas</a></li>
            <li><a href="?p=mapel"><i class="fa fa-circle-o"></i>Mata Pelajaran</a></li>
            <li><a href="?p=jurusan"><i class="fa fa-circle-o"></i>Jurusan</a></li>
            <li><a href="?p=tahun"><i class="fa fa-circle-o"></i>Tahun</a></li>
            <li><a href="?p=wali"><i class="fa fa-circle-o"></i>Wali</a></li>
            <li><a href="?p=guru"><i class="fa fa-circle-o"></i>Guru</a></li>
            <li><a href="?p=gurumapel"><i class="fa fa-circle-o"></i>Guru Mapel</a></li>
            <li><a href="?p=siswakelas"><i class="fa fa-circle-o"></i>Siswa Kelas</a></li>
            <li><a href="?p=kategorinilai"><i class="fa fa-circle-o"></i>Kategori Nilai</a></li>
            
          </ul>
        </li> -->
<!--         <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Konten</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=kategori"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
            
            <li><a href="?p=profil"><i class="fa fa-circle-o"></i>Profil</a></li>
            <li><a href="?p=berita"><i class="fa fa-circle-o"></i>Berita</a></li>
            <li><a href="?p=kategoriberita"><i class="fa fa-circle-o"></i>Kategori Berita</a></li>
          </ul>
        </li> -->

       <li class="treeview">
          <a href="?p=pelapor">
            <i class="fa fa-edit"></i> <span>Pelapor</span>
          </a>
       </li>
       <li class="treeview">
          <a href="?p=berita">
            <i class="fa fa-edit"></i> <span>Berita</span>
          </a>
       </li>
       <li class="treeview">
          <a href="?p=pecandu">
            <i class="fa fa-edit"></i> Pecandu (Notifikasi)  <span class="badge " id="notif" ></span>
          </a>
        </li>
        <input type="hidden" id="id_admin" value="<?php echo $id_admin; ?>" />
        <li class="treeview">
          <a href="?p=chat">
            <i class="fa fa-edit"></i>Chatting    <span class="badge" id="notif_chatadmin1"></span>
          </a>
        </li>
        <li class="treeview">
          <a href="?p=laporan">
            <i class="fa fa-edit"></i> <span>Laporan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="?p=tanyajawabadmin">
            <i class="fa fa-edit"></i> <span>Tanya Jawab</span>
          </a>
        </li> 
        
        
     
        </li>
        
       
<!--         <li class="header">LABELS</li>
        
        <li><a href="logout.php"><i class="fa fa-circle-o text-yellow"></i> <span>Logout</span></a></li> -->
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 <?php  
/*include 'data/sidebar.php';*/

 ?>
   <div class="content-wrapper">
       <section class="content">
 <?php
      if(isset($_GET['p'])){
        switch ($_GET['p']) {
          case 'dasboard_admin':
              $page = 'dasboard_admin.php';
            break;
          case 'admin':
              $page = 'administrator/index.php';
            break;
          case 'tambahadmin':
              $page = 'administrator/tambah.php';
            break;
          case 'editadmin':
              $page = 'administrator/edit.php';
            break;
          case 'hapusadmin':
              $page = 'administrator/hapus.php';
            break;
          case 'tanyajawab':
              $page = 'tanya_jawab/index.php';
            break;
          case 'tanyajawabadmin':
              $page = 'tanya_jawab/index_admin.php';
            break;
          case 'laporan':
              $page = 'laporan/index.php';
            break;
          case 'cetak':
              $page = 'laporan/cetak.php';
            break;
          case 'cetak_pecandu':
              $page = 'laporan_pecandu/cetak.php';
            break;
         
          case 'pecandu':
              $page = 'pecandu/index.php';
            break;
          case 'ubahpecandu':
              $page = 'pecandu/edit.php';
            break;
          case 'ubahpecandu2':
              $page = 'pecandu/edit2.php';
            break;
          case 'detailpecandu':
              $page = 'pecandu/detail.php';
            break;
          case 'notifpecandu':
              $page = 'pecandu/data_ajax.php';
            break;
          case 'hapuskelas':
              $page = 'kelas/hapus.php';
            break;
          case 'pelapor':
              $page = 'pelapor/index.php';
            break;
          case 'detailpelapor':
              $page = 'pelapor/detail.php';
            break;
          case 'editmapel':
              $page = 'mapel/edit.php';
            break;
          case 'hapusmapel':
              $page = 'mapel/hapus.php';
            break;
          case 'chat':
              $page = 'chatting/index.php';
            break;
          case 'tambahchat':
              $page = 'chatting/chat.php';
            break;
          case 'editjurusan':
              $page = 'jurusan/edit.php';
            break;
          case 'hapuschat':
              $page = 'chatting/hapus.php';
            break;
          case 'hapuschat2':
              $page = 'chatting/hapusChat.php';
            break;
          case 'komentar':
              $page = 'komentar/index.php';
            break;
          case 'komentaradmin':
              $page = 'komentar/index_admin.php';
            break;

          case 'berita':
              $page = 'berita/index.php';
            break;
          case 'tambahberita':
              $page = 'berita/tambah.php';
            break;
          case 'editberita':
              $page = 'berita/edit.php';
            break;
          case 'hapusberita':
              $page = 'berita/hapus.php';
            break;
          default:
            # code...
            break;
        }
        require('data/'.$page);
      }
      ?>   </section>
   </div>
  <!-- /.content-wrapper -->


<?php /*include 'data/sidebar_right.php';*/ ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  $(function(){
/*        $( "#datepicker2" ).datepicker({
      formatSubmit: 'Y-m-d',
      hiddenName: true,
      format: 'yyyy-mm-dd'
    });*/
  });
</script>
<?php include 'asset/custom/php/footer.php'; ?>





