

	<!--  content -->
	<div class="content-wrapper" style="padding: 20px">
			<div class="row">						
			<?php echo form_open_multipart('admin_controller/upload4', array('role'=>'form'));
						if(isset($message)): 
						echo "<div class='alert alert-success action='post'>".$message."</div>";
						endif; ?>	
				<div class="form-group">
					<label>Date:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="date" name="tanggal" class="form-control pull-right" >
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" class="form-control" placeholder="Enter ...">
					</div>


					<div class="panel-body">

						<div class="form-group">
							
							<label for="title">File</label>
							<input type="file" name="userfile" id="image" onchange="readURL(this)"/>
						</div>
						<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div id="previewLoad" style='margin-left: 0px; display: none'>
								<img src='<?php echo base_url();?>images/loading.gif'/>
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
											<h3 class="box-title">Tulis Alat Kelengkapan
											</h3>
											<div class="pull-right box-tools">
											</div>
										</div>
										<div class="box-body pad">
											<form>
												<textarea class="textarea" name="isi" placeholder="Tulis berita disini"
													style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
											</form>
										</div>
										<!-- /.col-->
									</div>
									<!-- ./row -->
							</section>

			<input type="submit" value="Save" class="btn btn-primary"/>
			<a href="#" onclick="reset();" class="btn btn-warning">reset</a>
		
		
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
			$('.image_preview').html('<img src="'+e.target.result+'" alt="'+reader.name+'" class="img-thumbnail" width="304" height="236"/>');
		}

		reader.readAsDataURL(input.files[0]);
		$('#previewLoad').hide();
	}
	}
	
	function reset(){
	$('#image').val("");
	$('.image_preview').html("");
	}
	
	</script>
