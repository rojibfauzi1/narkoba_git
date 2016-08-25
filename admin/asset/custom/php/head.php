<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/custom/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
 <link rel="stylesheet" type="text/css" href="asset/plugins/morris/morris.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="asset/bootstrap/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="asset/plugins/datatables/jquery.dataTables.css">
 
  <script src="asset/custom/js/jquery-2.1.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="asset/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="asset/bootstrap/js/bootstrap-datepicker.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script src="asset/plugins/ckeditor/ckeditor.js"></script>
<script src="asset/custom/js/highcharts.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
      ambilnotif();
      /*notifchat1();*/
      notifchat();
      /*notifchatadmin1();*/
      /*setTimeout(ambilnotif,4000);*/
    $('table').DataTable();
    });
/*    $('#datepicker2').datepicker({
      formatSubmit: 'Y-m-d',
      hiddenName: true,
      format: 'yyyy-mm-dd'
    });*/
    function ambilnotif(){
      $.ajax({
        url: 'data/pecandu/data_ajax.php', 
        success: function(data){
          $('#notif').html(data);
          timer = setTimeout('ambilnotif()',4000);
        }
      });
    }
    function notifchat(){
      var id_pelapor = $('#id_pelapor').val();

      $.ajax({
        url: 'data/chatting_pelapor/notif_ajax.php',
        method : "POST",
        dataType : "html",
        data : {id_pelapor,type:'load_notif'}, 
        success: function(data){
          $('#notif_chatpelapor').html(data);
          timer = setTimeout('notifchat()',4000);
        }
      });
    }

    

</script>
</head>

