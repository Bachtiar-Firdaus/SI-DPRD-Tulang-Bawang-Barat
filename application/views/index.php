<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>DPRD Tulangbawang Barat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700' rel='stylesheet' type='text/css'>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

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
	<div class="header" id="home">
		<div class="header_top">
			<div class="wrap">
				<div class="logo">
					<a href="index.html"><img src="" alt="" /></a>
				</div>
				<div class="menu">
					<a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
					<ul class="nav" id="nav">
						<li class="current"><a href="#home">Home</a></li>
						<li><a href="#services">Services</a></li>
						<li><a href="#team">Our Team</a></li>
						<li><a href="#skills">Skills</a></li>
						<li><a href="#works">Works</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
						<div class="clear"></div>
					</ul>
					<script type="text/javascript" src="<?php echo base_url()?>assets/js/responsive-nav.js"></script>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="header_desc">
			<div class="wrap">
				<p>Selamat Datang di </p>
				<p class="p1">Website DPRD Tulang Bawang Barat</p>
				<div class="kolomsaran">

					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Masukan Nama" id="first_name2" type="text" class="validate">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Ketik saran anda .." id="first_name2" type="text" class="validate">
						</div>
					</div>
					<a class="waves-effect waves-light btn">button</a>
				</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="content">
			<!---- Services ------>
			<div class="services" id="services">
				<div class="wrap">



					<script src="<?php echo base_url()?>assets/js/jquery.scrollTo.js"></script>
					<script src="<?php echo base_url()?>assets/js/jquery.nav.js"></script>
					<script>
						$(document).ready(function () {
							$('#nav').onePageNav({
								begin: function () {
									console.log('start')
								},
								end: function () {
									console.log('stop')
								}
							});
						});
					</script>
</body>

</html>