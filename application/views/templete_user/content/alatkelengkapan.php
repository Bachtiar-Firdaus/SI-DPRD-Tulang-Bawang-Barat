<div class="asdfasdf">
	<p class="judulataskecil">Alat Kelengkapan</p>
</div>





<ul>
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
	<li class="lkjh">
			<div class="container bungkuscontent">
				<div class="contentutama">
					<div class="img-content">
						<img src="<?php echo base_url().'upload/'.$image;?>" alt="" class="img-content" />
					</div>
					<div class="contentsub">
						<h4 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" class="judulcontent"><?php echo $judul;?></h4>
					
						<p><a href="<?php echo base_url().'index.php/Welcome_user/view1/'.$id;?>"> Selengkapnya ></a></p>
					</div>

				</div>
			</div>
		</li>
		<?php endforeach;?>
</ul>
