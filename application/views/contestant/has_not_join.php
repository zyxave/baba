<div class="row hasnot">
           <div class="container" style="padding-top:35px; padding-bottom:30px;">
		    <?php if(isset($_SESSION['hasNotJoinContest'])) : ?>
			<img class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/warning.png'); ?>" width="250px"> 
			<h4> Tidak Ada Kontes yang Sedang Anda Ikuti. </h4>
			<h4> Silahkan Join Kontes Terlebih Dahulu Melalui Halaman <a href="<?php echo base_url() . 'contest'?>">Contest</a></h4>
			<?php endif; ?>
		   </div>
</div>