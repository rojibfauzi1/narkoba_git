<?php  
session_start();
ob_start();

require_once ('../conf/koneksi.php');
include 'asset/custom/php/head.php'; 


$username = $_SESSION['nama_pelapor'];
$user = $_SESSION['nama_pelapor'];
$nama_pelapor = $_SESSION['nama_pelapor'];
$id_pelapor = $_SESSION['id_pelapor'];
$login = $_SESSION['login1'];
$status = $_SESSION['status'];
$ktp = $_SESSION['no_ktp'];
$hp = $_SESSION['no_hp'];


if($login != 'pelapor'){
  session_destroy();
  /*header("Refresh: 90; URL=login.php");*/
  header("location: ../index.php");
}
?>

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
          <!-- <img src="../upload/admin/<?php  $gambar ?>" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
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

      

       <li class="treeview">
          <a href="?p=tambahpecandu">
            <i class="fa fa-edit"></i> <span>Pendaftaran</span>
          </a>
       </li>
       <input type="hidden" id="id_pelapor" value="<?php echo $id_pelapor; ?>" />
       <li class="treeview">
          <a href="?p=chat_pelapor">
            <i class="fa fa-edit"></i>Chatting <span class="badge" id="notif_chatpelapor"></span>
          </a>
       </li>
       <li class="treeview">
          <a href="?p=notif_pecandu">
            <i class="fa fa-edit"></i> <span>Notifikasi</span>
          </a>
        </li>

        <li class="treeview">
          <a href="?p=tanyajawab">
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
          case 'dasboard_pelapor':
              $page = 'dasboard_pelapor.php';
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
          case 'pelapor':
              $page = 'pelapor/index.php';
            break;
          case 'tambahpecandu':
              $page = 'pecandu/tambah.php';
            break;
          case 'editpelapor';
              $page = 'pelapor/edit.php';
            break;
          case 'hapuspelapor':
              $page = 'pelapor/hapus.php';
            break;

          case 'notif_pecandu':
              $page = 'notif_pecandu/index.php';
            break;
          case 'tambahkelas':
              $page = 'kelas/tambah.php';
            break;
          case 'editkelas':
              $page = 'kelas/edit.php';
            break;
          case 'hapuskelas':
              $page = 'kelas/hapus.php';
            break;
          case 'tanyajawab':
              $page = 'tanya_jawab/index.php';
            break;
          case 'tambahtanya':
              $page = 'tanya_jawab/tambah.php';
            break;
          case 'komentar':
              $page = 'komentar/index.php';
            break;
          case 'hapusmapel':
              $page = 'mapel/hapus.php';
            break;
          case 'chat_pelapor':
              $page = 'chatting_pelapor/chat.php';
            break;
          case 'indexchat':
              $page = 'chatting_pelapor/index.php';
            break;
          case 'chat_ajax':
              $page = 'chatting_pelapor/chat_ajax.php';
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
<?php include 'asset/custom/php/footer.php'; ?>

<?php /*include 'data/sidebar_right.php';*/ ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
   $('#datepicker').datepicker({
    format: 'mm/dd/yyyy',
    formatSubmit : 'Y-m-d'
});

    $(function(){

  });
</script>
<?php include 'asset/custom/php/footer.php'; ?>





