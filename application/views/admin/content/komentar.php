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
					<h3 class="box-title">KOMENTAR</h3>
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
										<th>KODE KOMENTAR</th>
										<th>Tanggal</th>
										<th>Nama</th>
										<th>Isi Komentar</th>
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
					"url": "<?php echo site_url('admin_controller/ajax_list2')?>",
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
					url: "<?php echo site_url('admin_controller/ajax_delete2')?>/" + id,
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
		
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

        url = "<?php echo site_url('admin_controller/ajax_update2')?>";


    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
	function edit_saran(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin_controller/ajax_edit2')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="no"]').val(data.no);
            $('[name="kd_komentar"]').val(data.kd_komentar);
            $('[name="nama"]').val(data.nama);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

	</script>


<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="no"/> 


                <div class="form-group">
                        
                            <input type="text" name="kd_komentar" >
                            <input type="text" name="nama" >

                        <div class="form-group">
                            <label>ISI KOMENTAR</label>
                            <input type="textarea" class="form-control" name="isikomentar" placeholder="Enter ...">
                        </div>


                        <!-- /.input group -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="btnSave" onclick="save()" style="margin-right: 10;" class="btn btn-success">Simpan</button>
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
