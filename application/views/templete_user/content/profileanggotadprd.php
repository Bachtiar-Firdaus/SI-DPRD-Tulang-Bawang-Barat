<style type="text/css">
  .card .card-content{
    padding: 10px !important;
  }
</style>

<div class="container bungkuscontent">
  <p class="judulataskecil">ANGGOTA DPRD</p>
</div>







<div class="row">


  <?php
      function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
      foreach ($data->result_array() as $i) :
        $id=$i['no'];
        $judul=$i['judul'];
        $image=$i['photo'];
    ?>
<div class="gg" style="width: 48%; float: left; margin-left: 4px;"><div class="card">
        <div class="card-image">
          <img src="<?php echo base_url().'upload/'.$image;?>" style="width: 100%; height: 150px;">
          <p style="text-align: center;"><span class="card-title"></span></p>
          
        </div>
        <div class="card-content">
          <p style="text-align: center;"><?php echo $judul;?></p>
        </div>
        <div class="card-action">
          <p style="text-align: center;">
            <a style="color: #0081ba;" href="<?php echo base_url().'index.php/Welcome_user/view_anggota/'.$id;?>">Selengkapnya</a>
          </p>
        </div>
      </div>
    </div>




    <?php endforeach;?>
</div>