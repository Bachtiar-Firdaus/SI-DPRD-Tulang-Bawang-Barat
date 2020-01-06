  <!--  content -->
  <div class="content-wrapper" style="padding: 20px">
  	<div class="row">
  		<?php echo form_open_multipart('admin_controller/upload_tambah_profil', array('role'=>'form'));
            if(isset($message)): 
            echo "<div class='alert alert-success action='post'>".$message."</div>";
            endif; ?>
  		<div class="form-group">
  			<div class="form-group">
  				<label>NAMA ANGGOTA</label>
  				<input type="text" name="judul" class="form-control" placeholder="Enter ...">
  			</div>


  			<div class="panel-body">

  				<div class="form-group">

  					<label for="title">PHOTO</label>
  					<input type="file" name="userfile" id="image" onchange="readURL(this)" />
  				</div>
  				<div class="row">
  					<div class="col-md-6 col-sm-6 col-xs-12">
  						<div id="previewLoad" style='margin-left: 0px; display: none'>
  							<img src='<?php echo base_url();?>images/loading.gif' />
  						</div>
  						<div class="image_preview">

  						</div>
  					</div>
  				</div>

  			</div>


  		</div>


  		<!-- /.input group -->
  		<div class="row">
  			<div class="col-md-12">
  				<section class="content">
  					<div class="row">
  						<div class="box">
  							<div class="box-header">
  								<h3 class="box-title">Editors Andmin</small>
  								</h3>
  								<!-- tools box -->
  								<div class="pull-right box-tools">
  									<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
  										title="Collapse">
  										<i class="fa fa-minus"></i></button>
  									<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
  										title="Remove">
  										<i class="fa fa-times"></i></button>
  								</div>
  							</div>
  							<!-- /.box-header -->
  							<div class="box-body pad">
  								<form>
  									<textarea id="editor1" name="isi" rows="10" cols="80">
                                           Tulis Pesan
                    </textarea>
  								</form>
  							</div>
  						</div>
  						<!-- /.col-->
  					</div>
  					<!-- ./row -->
  				</section>

  				<input type="submit" value="Save" class="btn btn-primary" />
  				<a href="#" onclick="reset();" class="btn btn-warning">batal</a>


  				<?php form_close();
      if(isset($errors)):
        echo "<div class='alert alert-danger'>".$errors."</div>";
      endif; ?>

  			</div>
  			<!-- /.col-->
  		</div>
  	</div>
  </div>
  </div>
  </div>
  </div>
  <!-- akhir content -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	function readURL(input) {
  		$('#previewLoad').show();
  		if (input.files && input.files[0]) {
  			var reader = new FileReader();

  			reader.onload = function (e) {
  				$('.image_preview').html('<img src="' + e.target.result + '" alt="' + reader.name +
  					'" class="img-thumbnail" width="304" height="236"/>');
  			}

  			reader.readAsDataURL(input.files[0]);
  			$('#previewLoad').hide();
  		}
  	}

  	function reset() {
  		$('#image').val("");
  		$('.image_preview').html("");
  	}

  </script>

  <script src="<?php echo base_url();?>assets/bower_components/ckeditor/ckeditor.js"></script>
  <script>
  	$(function () {
  		// Replace the <textarea id="editor1"> with a CKEditor
  		// instance, using default configuration.
  		CKEDITOR.replace('editor1')
  		//bootstrap WYSIHTML5 - text editor
  		$('.textarea').wysihtml5()
  	})

  </script>
