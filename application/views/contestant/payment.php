		<div class="row payment">
           <div class="container">
                <div class="col-lg-offset-1 col-lg-10 col-md-12">
                  <h2 class="text-centered"> Petunjuk Pembayaran </h2>
				  <br>
                  <p> <strong style="color:#ff7070;"> Transfer melalui rekening BCA: 6730 369 385 a.n George Armando Kusuma </strong> </p>
				  <p> Biaya Pendaftaran : Rp 150.000/tim </p> <br>
				  <p> <b>KHUSUS DI BATCH 1</b> : Rp 120.000/tim Apabila 1 Sekolah yang sama mendaftarkan minimal 4 tim </p>
				  <p> Tim yang mendaftar pada BATCH 2, tetap dikenakan biaya pendaftaran Rp 150.000/tim walaupun sudah ada 4 tim atau lebih dari sekolah yang sama pada pendaftaran BATCH 1. </p>
				  <br>
				  </div>
			</div>
		</div>

	<div class="row konfirmasi-pembayaran">

   <div class="col-lg-offset-2 col-lg-8 col-md-12">
        <section>
            <h2 class="text-center" style="color: #2b3990;">Konfirmasi Pembayaran</h2>
          <?php
            if(isset($_SESSION['errors'])) : ?>
                <div class="warn-box">
                    <?php echo $_SESSION['errors']; ?>
                </div>
            <?php elseif (isset($_SESSION['confirmationMessage'])) : ?>
                <div class="success-box">
                    <?php echo $_SESSION['confirmationMessage']; ?>
                </div>
            <?php endif; ?>
            <?php if($status == 'waiting payment') : ?>
            <div class="r-box">
            <form action="<?php echo base_url()?>contestant/confirm_payment" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="row">
                            <div class="bukti-transfer col-xs-offset-1 col-xs-6 col-sm-offset-2 col-sm-4 col-md-4" style="padding-top:15px;">
                                <label class="md-right">Foto Bukti Transfer</label>
                            </div>
                            <div class="bukti-transfer col-xs-5 col-sm-4 col-md-2">
                                <input type="file" accept=".jpg,.png" name="fotoTransfer"> Max 1 MB, Format .jpg/.png
                            </div>
                        </div>
                    </div>
					<br>
					
                    <div class="form-row">
                        <div class="row">
                            <div class="btn-konfirmasi col-xs-offset-4 col-xs-10 col-sm-offset-4 col-sm-4 col-md-4">
                                <input type="submit" value="Konfirmasi Pembayaran" name="confirmPayment" class="btn btn-ilpc">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          
			<?php elseif ($status == 'unverified payment') : ?>
                
                    <p class="text-center">Konfirmasi pembayaran anda sedang diproses panitia.</p>
                
            <?php elseif ($status == 'ready') : ?>
               
                    <p class="text-center">Pembayaran sudah diterima panitia</p>
                
            <?php endif; ?>

        </section>
        
    </div>
</div>

	
 