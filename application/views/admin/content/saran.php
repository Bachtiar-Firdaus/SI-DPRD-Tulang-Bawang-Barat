<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
<!--  content -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">SARAN</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					<div class="container" style="border: 1px solid #cccccc; background-color: #F5F5F5; "><br><br>


						<section class="container-fluid" style="overflow-y: auto; overflow-x: scroll;">
							<div class="dropdown">
								<button class="btn btn-default" id="btnn2" onclick="reload_table()"><i
										class="glyphicon glyphicon-refresh"></i> REFRESH</button>
								<!-- 
                            <button class="btn btn-success" id="btnn" onclick="add_stock()"><i class="glyphicon glyphicon-plus"></i> TAMBAH</button> -->
							</div> <br />

							<table id="table" class="table table-striped table-bordered display nowrap" cellspacing="0"
								width="100%">

								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Nama</th>
										<th>Isi Saran</th>
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
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
	<script type="text/javascript">
		var save_method; //for save method string
		var table;

		$(document).ready(function () {

			//datatables
			table = $('#table').DataTable({

				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				"order": [], //Initial no order.

				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('admin_controller/ajax_list')?>",
					"type": "POST"
				},

				//Set column definition initialisation properties.
				"columnDefs": [{
					"targets": [-1], //last column
					"orderable": false, //set not orderable
				}, ],

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

		});



		function reload_table() {
			table.ajax.reload(null, false); //reload datatable ajax 
		}


		function delete_saran(id) {
			if (confirm('Are you sure delete this data?')) {
				// ajax delete data to database
				$.ajax({
					url: "<?php echo site_url('admin_controller/ajax_delete')?>/" + id,
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



	</section>


</div>
