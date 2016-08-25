<!-- jQuery 2.2.0 -->

<!-- Morris.js charts -->

<script src="asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
<script src="asset/plugins/datatables/jquery.dataTables.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<script type="text/javascript" src="asset/plugins/morris/morris.min.js"></script>
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script type="text/javascript">
$(function(){

"use strict";
	
var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data:  <?php echo json_encode($output); ?>,
      
      barColors: ['#3C8DBC', '#FF4081'],
      xkey: 'bulan',
      ykeys: ['laki-laki','perempuan'],
      labels: ['laki-laki','perempuan'],
      hideHover: 'auto'
    });
});


</script>

</body>
</html>