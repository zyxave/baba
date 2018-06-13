		 <div class="row contestant" style="font-size: 1.1em;">
           <div class="container">
                <div class="col-lg-offset-1 col-lg-10 col-md-12">
                  <h1 class="text-centered" style="color: #2B3990;">Pengumuman</h1>
				  <br>
				  
                   <h2 class="nomor-soal">4 Januari 2018</h2>
				   <p>Halo peserta ILPC 2018! Jangan lupa yaa tanggal 5 Januari 2018 - 6 Januari 2018 kita akan ada <b>Penyisihan Online</b></p>
				   <p>Babak penyisihan akan dibagi menjadi 2 tahap :</p>
				  
				   <!--
				   <h3>TRIAL LOGIKA ONLINE</h3>
				   <p>02 Januari 2018, pukul 14.00 - 16.30 WIB</p>
				   <h3>TRIAL PROGRAMMING ONLINE</h3>
				   <p>03 Januari 2018, pukul 14.00 - 16.00 WIB</p>
				   <br>
				   -->

				   <h3>Penyisihan Logika</h3>
				   <p>05 Januari 2018, pukul 14.00 - 16.30 WIB</p>
				   <h3>Penyisihan Program</h3>
				   <p>06 Januari 2018, pukul 09.00 - 14.00 WIB</p>
				   <br>
				   <p>Terima kasih atas perhatiannya.</p>
				   <br>
				   <p><em>*Catatan: Setiap akun hanya bisa login di satu komputer. Apabila login di lebih dari satu komputer, maka akun yang login pertama akan otomatis logout.</em></p>
				</div>
            </div>  
        </div>
		
		<div class="row contestant" style="background-color:white;">
           <div class="container">
                <div class="col-lg-offset-1 col-lg-10 col-md-12">
				<section>
		            <?php if($status == 'ready') : ?>
						<h2>Status Pembayaran: Selesai</h2>
		                <div>
		                    <p>Pembayaran telah diterima oleh panitia.</p>
		                </div>
					<?php elseif($status == 'waiting payment') : ?>
						<h2 class="text-centered" style="color:#2B3990;">Status Pembayaran: <span style="color:#f40d0d;">Belum Lunas</span></h2>
						<div>
					    <p>Tim anda belum membayar biaya pendaftaran. Petunjuk pembayaran dapat dilihat pada halaman <a href="<?php echo base_url();?>contestant/payment">pembayaran</a></p>
						</div>
					<?php elseif($status == 'unverified payment') : ?>
		                <h2>Status Pembayaran: Waiting For Verification</h2>
		                <div>
		                    <p>Pembayaran Tim anda sedang diproses panitia. Silahkan tunggu hingga 7 hari sejak anda melakukan konfirmasi pembayaran. Apabila status pembayaran anda tidak berubah setelah 7 hari, segera hubungi <a target="_blank" href="<?php echo base_url(); ?>contact">contact person</a> kami.</p>
		                </div>
		            <?php endif; ?>
	        	</section>

				<section>
					<?php /*echo $status . "<br>"; */
					if($status == 'ready') : ?>
		                <h2>Status Pendaftaran: Selesai</h2>
		                <div>
		                    <p>Tim Anda telah resmi terdaftar sebagai peserta ILPC 2018. </p>
		                </div>
					<?php else : ?>
						<h2 class="text-centered" style="color:#2B3990;">Status Pendaftaran: <span style="color:#f40d0d;">Belum Selesai</span></h2>
						<div>
						    <p>Tim anda <strong style="color:#F72020;">BELUM RESMI</strong> terdaftar sebagai peserta ILPC 2018. Segera selesaikan pembayaran dan pastikan anda telah mengisi data tim dengan benar</p>
					    </div>
						<br>
				    <?php endif; ?>
				</section>

    </div>
</div>
</div>
</div>