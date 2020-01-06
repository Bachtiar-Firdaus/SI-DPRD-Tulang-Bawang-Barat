	<div class="slider">
    <ul class="slides">
      <li>
        <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <!-- <h3>This is our big Tagline!</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <!-- <h3>Left Aligned Caption</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <!-- <h3>Right Aligned Caption</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <!-- <h3>This is our big Tagline!</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
        </div>
      </li>
    </ul>
  </div>

  <script type="text/javascript">
  	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems);
  });
  </script>



  
<div class="header" id="home">

        <div class="header_desc">
			<div class="wrap">
						<?php echo form_open_multipart('Welcome_user/upload', array('role'=>'form'));
						if(isset($message)): 
						// echo "<div class='alert alert-success action='post'>".$message."</div>";
						endif; ?>
				<p style="font-size: 21pt !important; margin-bottom: 0;">Selamat Datang di </p>
				<p class="p1">Website DPRD Tulang Bawang Barat</p>
				<div class="kolomsaran">

					<div class="container">

					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Masukan Nama" name="nama" type="text" class="validate">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Masukan Aspirasi" name="saran" type="text" class="validate">
						</div>
					</div>		
					<input type="submit" value="Kirim" class="waves-effect waves-light btn"/>
				</div>
		
			<?php form_close();
			if(isset($errors)):
				echo "<div class='alert alert-danger'>".$errors."</div>";
			endif; ?>
				</div>
			</div>
		</div>
	
	
	</div>

