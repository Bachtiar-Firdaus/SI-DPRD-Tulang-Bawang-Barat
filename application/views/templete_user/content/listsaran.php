<div class="asdfasdf">
	<p class="judulataskecil">Aspirasi Masyarakat</p>
</div>





<ul>
	<?php
			function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
			foreach ($data->result_array() as $i) :
				$id=$i['no'];
				$nama=$i['nama'];
				$isisaran=$i['isisaran'];
				$tanggal=$i['tanggal'];
		?>
	<li class="lkjh">
			<div class="container bungkuscontent">
				<div class="contentutama">
					<div style="margin-left: 0; overflow-wrap: break-word;">
						<h4 class="judulcontent"><?php echo $nama;?></h4>
						<!-- <p class="tanggaldesain"><i style="margin-right: 5px;"></i><?php echo $isisaran;?></p> -->
						<p class="tanggaldesain"><i class="fa fa-calendar" style="margin-right: 5px;"></i><?php echo $tanggal;?></p>
						<p><a href="<?php echo base_url().'index.php/Welcome_user/view_listsaran/'.$id;?>"> Selengkapnya ></a></p>
					</div>

				</div>
			</div>
		</li>
		<?php endforeach;?>
</ul>


