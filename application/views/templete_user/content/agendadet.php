




<style>
	.inputkomentar {
		width: 70% !important;
		float: left !important;
	}

	.btnkomentar {
		height: 43px;
		width: 30%;
	}

</style>

<?php 
	$b=$data1->row_array();/*
	$c=$data2->row_array();*/
?>

<div class="container bungkuscontent">
	<p class="judulataskecil">Agenda Detail</p>
</div>

<div class="container">
	<h6 style="overflow-wrap: break-word;"><b><?php echo $b['judul'];?></b></h6>
	<img src="<?php echo base_url().'upload/'.$b['photo'];?>" alt="" class="img-detail" />
	<p class="contentdetail" style="overflow-wrap: break-word;"><?php echo $b['isi'];?></p>

	<!-- <?php echo form_open_multipart('Welcome_user/upload_agenda', array('role'=>'form'));
if(isset($message)): 
echo "<div class='alert alert-success action='post'>".$message."</div>";
endif; ?>
		
		<div class="komentar">
			<input type="hidden" name="kd_komentar" value='<?php echo $b['no'];?>'>
		<input class="inputkomentarr" type="text" name="nama" placeholder="Masukan nama .....">
		<input class="inputkomentar" type="text" name="isi" placeholder="komentar .....">
		

		<?php form_close();
if(isset($errors)):
echo "<div class='alert alert-danger'>".$errors."</div>";
endif; ?> 

<input type="submit" value="Kirim" class="btnkomentar"/>

<?php form_close();
if(isset($errors)):
echo "<div class='alert alert-danger'>".$errors."</div>";
endif; ?>  -->

<!-- 
<?php echo $c['no']," ",$c['nama']," ",$c['isikomentar'];?>  -->


<?php /*print_r($data2)*/foreach($data2 as $v)
            {
                
            ?>

		</div>

		
</div>

<!-- <section class="listkomentar" style="margin-top: 10px;">
	<div class="container">



				<div class="contentlk">
					<div class=".img-contentkom">
						<img src="<?php echo base_url()?>assets/images/client_img1.jpg" alt="" class="imgkomentar" />
					</div>
					<div class="contentsubkomen">
						<h4 class="judulcontent"><b><?php echo $v->nama;?></b></h4>
						<p class="tanggaldesain"><?php echo $v->isikomentar; ?></p>
						<p class="tanggaldesain"><i class="fa fa-calendar" style="margin-right: 5px;"></i><?php echo $v->tanggal; ?></p>
					</div>

				</div>

		
		</div>	
		</section> -->

<?php }
            ?>