	

<div class="container bungkuscontent">
	<p class="judulataskecil">DETAIL ANGGOTA DPRD</p>
</div>



<?php 
	$b=$data1->row_array();/*
	$c=$data2->row_array();*/
?>

<style type="text/css">
  .card .card-content{
    padding: 10px !important;
  }
</style>
<div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo base_url().'upload/'.$b['photo'];?>" style="width: 100%; height: 310px;">
          <p style="text-align: center;"><span class="card-title" ></span></p>
          
        </div>
        <div class="card-content">
          <p style="text-align: center;"><?php echo $b['judul'];?></p>
        </div>
        <div class="card-content">
          <p style="text-align: justify;"><?php echo $b['isi'];?></p>
        </div>
        
      </div>
    </div>
  </div>


  