<div class="row submit-notification">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card" style="background-color: #fff; box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.16), 0 0px 0px 1px rgba(0, 0, 0, 0.06); border-radius: 5px;">
			<h1 class="text-center"><?php echo $_SESSION['nama_kontes']; ?></h1>
			<?php if($_SESSION['tipe_kontes'] === 'multiple_choice') : ?>
			   <h4 class="text-center">Logika</h4>
            <?php endif; ?>	
			<?php if($_SESSION['tipe_kontes'] === 'programming') : ?>
			   <h4 class="text-center">Programming</h4>
               <p class="text-center"><?php echo $_SESSION['judulSoal']; ?></p>
            <?php endif; ?>	
			<!-- ada pengecekan waktu submit. kalau melebihi waktu yang ditentukan, tampilkan ini:  -->

		<!--	<p class="alert alert-gagal text-center" style="margin: 20px 100px;">
				Jawaban Anda gagal disubmit karena <br>
				[pesan error]
			</p> -->

				<!-- kalau berhasil -->

			<p class="alert alert-berhasil text-center" style="margin: 20px 100px;">
				Jawaban Anda berhasil disubmit.
			</p>
				
			<!-- End of pengecekan (jangan lupa hapus semua comment)-->
				

			<a href="<?php echo base_url(); ?>contest/active_contest" class="btn btn-ilpc btn-submit-logika center-block" style="width: 55%; margin-bottom: 40px; margin-top: 40px;">Kembali Ke Kontes</a>
		</div>
	</div>
</div>