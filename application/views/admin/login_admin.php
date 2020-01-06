<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Panel Admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet"
		href="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script>
		$.widget.bridge('uibutton', $.ui.button);

	</script>


	<style>
		.sadow {
			-webkit-box-shadow: 0px 0px 8px 2px rgba(0, 0, 0, 0.24);
			-moz-box-shadow: 0px 0px 8px 2px rgba(0, 0, 0, 0.24);
			box-shadow: 0px 0px 8px 2px rgba(0, 0, 0, 0.24);
		}

		.bulet {

			border-radius: 21px 21px 21px 21px;
			-moz-border-radius: 21px 21px 21px 21px;
			-webkit-border-radius: 21px 21px 21px 21px;
			border: 0px solid #000000;
		}

	</style>

<body class="hold-transition skin-blue sidebar-mini" style="background-image: url('bg.jpg');">
	<div class="wrapper">
        <?php $this->load->view($contents); ?>
	</div>


	<!-- ./wrapper -->
	<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/morris.js/morris.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

	<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>
</head>

</body>

</html>
