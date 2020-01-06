   <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

   <!--  content -->
   <div class="content-wrapper">
   	<div class="row">
   		<div class="col-xs-12">
   			<div class="box">
   				<div class="box-header">
   					<h3 class="box-title">PROGJA</h3>
   				</div>
   				<!-- /.box-header -->
   				<div class="box-body">

   					<section class="container-fluid" style="overflow-y: auto; overflow-x: scroll;">
   						<div class="dropdown">
   							<a href="<?php echo site_url() ?>/admin_controller/tambah_progja"
   								style="float: left; margin-bottom: 10px;" class=" btn btn-primary">Tambah</a>
   							<!-- 
<button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button> -->
   							<button class="btn btn-default" id="btnn2" onclick="reload_table()"><i
   									class="glyphicon glyphicon-refresh"></i> REFRESH</button>
   						</div> <br />

   						<table id="table" class="table table-striped table-bordered display nowrap" cellspacing="0"
   							width="100%">

   							<thead>
   								<tr>
   									<th>No</th>
   									<th>Tanggal Post</th>
   									<th>Gambar</th>
   									<th>Judul</th>
   									<th>Isi</th>
   									<th style="width:125px;">Action</th>
   								</tr>
   							</thead>

   							<tbody>
   							</tbody>

   							<tfoot>
   								<tr>
   									<th></th>
   									<th></th>
   									<th></th>
   									<th></th>
   									<th></th>
   									<th></th>
   								</tr>
   							</tfoot>

   						</table><br><br>



   				</div>
   				<!-- /.box-body -->
   			</div>

   		</div>
   		<!-- /.col -->
   	</div>
   </div>
   <!-- akhir content -->

   <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
   <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
   <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
   <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
   <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


   <script type="text/javascript">
   	var save_method; //for save method string
   	var table;
   	var base_url = '<?php echo base_url();?>';

   	$(document).ready(function () {

   		//datatables
   		table = $('#table').DataTable({

   			"processing": true, //Feature control the processing indicator.
   			"serverSide": true, //Feature control DataTables' server-side processing mode.
   			"order": [], //Initial no order.

   			// Load data for the table's content from an Ajax source
   			"ajax": {
   				"url": "<?php echo site_url('admin_controller/ajax_list5')?>",
   				"type": "POST"
   			},

   			//Set column definition initialisation properties.
   			"columnDefs": [{
   					"targets": [-1], //last column
   					"orderable": false, //set not orderable
   				},
   				{
   					"targets": [-2], //2 last column (photo)
   					"orderable": false, //set not orderable
   				},
   			],

   		});

   		//datepicker
   		$('.datepicker').datepicker({
   			autoclose: true,
   			format: "yyyy-mm-dd",
   			todayHighlight: true,
   			orientation: "top auto",
   			todayBtn: true,
   			todayHighlight: true,
   		});

   		//set input/textarea/select event when change value, remove class error and remove text help block 
   		$("input").change(function () {
   			$(this).parent().parent().removeClass('has-error');
   			$(this).next().empty();
   		});
   		$("textarea").change(function () {
   			$(this).parent().parent().removeClass('has-error');
   			$(this).next().empty();
   		});
   		$("select").change(function () {
   			$(this).parent().parent().removeClass('has-error');
   			$(this).next().empty();
   		});

   	});



   	function add_m_p() {
   		save_method = 'add';
   		$('#form')[0].reset(); // reset form on modals
   		$('.form-group').removeClass('has-error'); // clear error class
   		$('.help-block').empty(); // clear error string
   		$('#modal_form').modal('show'); // show bootstrap modal
   		$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title

   		$('#photo-preview').hide(); // hide photo preview modal

   		$('#label-photo').text('Upload Photo'); // label photo upload
   	}

   	function edit_m_p(id) {
   		save_method = 'update';
   		$('#form')[0].reset(); // reset form on modals
   		$('.form-group').removeClass('has-error'); // clear error class
   		$('.help-block').empty(); // clear error string


   		//Ajax Load data from ajax
   		$.ajax({
   			url: "<?php echo site_url('admin_controller/ajax_edit5')?>/" + id,
   			type: "GET",
   			dataType: "JSON",
   			success: function (data) {

   				$('[name="no"]').val(data.no);
   				$('[name="tanggal"]').datepicker('update', data.tanggal);
   				$('[name="judul"]').val(data.judul);
   				$('[name="isi"]').val(data.isi);
   				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
   				$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

   				$('#photo-preview').show(); // show photo preview modal

   				if (data.photo) {
   					$('#label-photo').text('Change Photo'); // label photo upload
   					$('#photo-preview div').html('<img src="' + base_url + 'upload/' + data.photo +
   						'" class="img-responsive">'); // show photo
   					$('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="' +
   						data.photo + '"/> Remove photo when saving'); // remove photo

   				} else {
   					$('#label-photo').text('Upload Photo'); // label photo upload
   					$('#photo-preview div').text('(No photo)');
   				}


   			},
   			error: function (jqXHR, textStatus, errorThrown) {
   				alert('Error get data from ajax');
   			}
   		});
   	}

   	function reload_table() {
   		table.ajax.reload(null, false); //reload datatable ajax 
   	}

   	function save() {
   		$('#btnSave').text('saving...'); //change button text
   		$('#btnSave').attr('disabled', true); //set button disable 
   		var url;

   		if (save_method == 'add') {
   			url = "<?php echo site_url('admin_controller/ajax_add5')?>";
   		} else {
   			url = "<?php echo site_url('admin_controller/ajax_update5')?>";
   		}

   		// ajax adding data to database

   		var formData = new FormData($('#form')[0]);
   		$.ajax({
   			url: url,
   			type: "POST",
   			data: formData,
   			contentType: false,
   			processData: false,
   			dataType: "JSON",
   			success: function (data) {

   				if (data.status) //if success close modal and reload ajax table
   				{
   					$('#modal_form').modal('hide');
   					reload_table();
   				} else {
   					for (var i = 0; i < data.inputerror.length; i++) {
   						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
   						'has-error'); //select parent twice to select div form-group class and add has-error class
   						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
   						i]); //select span help-block class set text error string
   					}
   				}
   				$('#btnSave').text('save'); //change button text
   				$('#btnSave').attr('disabled', false); //set button enable 


   			},
   			error: function (jqXHR, textStatus, errorThrown) {
   				alert('Error adding / update data');
   				$('#btnSave').text('save'); //change button text
   				$('#btnSave').attr('disabled', false); //set button enable 

   			}
   		});
   	}

   	function delete_m_p(id) {
   		if (confirm('Are you sure delete this data?')) {
   			// ajax delete data to database
   			$.ajax({
   				url: "<?php echo site_url('admin_controller/ajax_delete5')?>/" + id,
   				type: "POST",
   				dataType: "JSON",
   				success: function (data) {
   					//if success reload ajax table
   					$('#modal_form').modal('hide');
   					reload_table();
   				},
   				error: function (jqXHR, textStatus, errorThrown) {
   					alert('Error deleting data');
   				}
   			});

   		}
   	}

   </script>

   <!-- Bootstrap modal -->
   <!-- Bootstrap modal -->
   <div class="modal fade" id="modal_form" role="dialog">
   	<div class="modal-dialog">
   		<div class="modal-content">
   			<div class="modal-header">
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
   						aria-hidden="true">&times;</span></button>
   				<h3 class="modal-title"></h3>
   			</div>
   			<div class="modal-body form">
   				<form action="#" id="form" class="form-horizontal">
   					<input type="hidden" value="" name="no" />

   					<div class="form-group" style="padding: 10px;">
   						<label>Date:</label>
   						<div class="input-group date">
   							<div class="input-group-addon">
   								<i class="fa fa-calendar"></i>
   							</div>
   							<input type="text" name="tanggal" class="form-control pull-right">
   						</div>

   						<div class="input-group" style="width: 100%;">
   							<label>Judul</label>
   							<input type="text" class="form-control" name="judul" placeholder="Enter ...">
   						</div>

   						<div class="input-group" id="photo-preview" style="margin-top: 10px;">
   							<label>Photo</label>
   							<div>
   								(No photo)
   								<span class="help-block"></span>
   							</div>
   						</div>

   						<div class="input-group" style="margin-top: 10px;">
   							<label id="label-photo">Upload Photo </label>
   							<div>
   								<input name="photo" type="file">
   								<span class="help-block"></span>
   							</div>
   						</div>

   						<!-- /.input group -->
   						<div class="row">
   							<div class="col-md-12">
   								<section class="content">
   									<div class="row">
   										<div class="box">
   											<div class="box-header">
   												<label>
   													Edit Progja
   												</label>
   												<div class="pull-right box-tools">
   												</div>
   											</div>
   											<div class="box-body pad">
   												<form>
   													<textarea class="textarea" name="isi"
   														placeholder="Tulis berita disini"
   														style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
   												</form>
   											</div>
   											<!-- /.col-->
   										</div>
   										<!-- ./row -->
   								</section>
   								<button type="button" onclick="reset()" class="btn btn-danger">Batal</button>
   								<button type="button" id="btnSave" onclick="save()" style="margin-right: 10;"
   									class="btn btn-success">Simpan</button>
   							</div>
   							<!-- /.col-->
   						</div>



   				</form>
   			</div>
   		</div><!-- /.modal-content -->
   	</div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   <!-- End Bootstrap modal -->





   </section>


   </div>
