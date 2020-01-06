<!DOCTYPE HTML>
<html>

<head>
	<title>DPRD Tulangbawang Barat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url()?>assets/css/style2.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700' rel='stylesheet' type='text/css'>
	<!-- Compiled and minified CSS -->
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.fancybox-media.js"></script>
	<script type="text/javascript">
		/******** Fancy Light Box*********/
		$(document).ready(function () {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			 */
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect: 'none',
					closeEffect: 'none',
					prevEffect: 'none',
					nextEffect: 'none',

					arrows: false,
					helpers: {
						media: {},
						buttons: {}
					}
				});
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
		$(function () {

			var filterList = {

				init: function () {

					// MixItUp plugin
					// http://mixitup.io
					$('#portfoliolist').mixitup({
						targetSelector: '.portfolio',
						filterSelector: '.filter',
						effects: ['fade'],
						easing: 'snap',
						// call the hover effect
						onMixEnd: filterList.hoverEffect()
					});

				},

				hoverEffect: function () {

				}

			};

			// Run the show!
			filterList.init();

		});
	</script>
</head>

<body>
		<!-- header -->
	<?php $this->load->view('templete_user/header'); ?>
	<!-- akhir header -->
	
	<div class="main">
		<div class="contents">
		<?php $this->load->view($contents) ?>
		</div>
	</div>
</body>

</html>