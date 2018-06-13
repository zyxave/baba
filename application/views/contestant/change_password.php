
<div class="row submit-notification">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card" style="min-height: 370px;">		
			<div class="col-xs-12"><center><font color="red">
                <?php if(isset($_SESSION['passwordFailed'])): ?>
                    <div class="warn-box">
                        <?php echo "<h5>".$_SESSION['passwordFailed']."</h5>"; ?>
                    </div>
                <?php elseif(isset($_SESSION['succeed'])) : ?>
                    <div class="success-box">
                        <?php //echo "<h5>".$_SESSION['succeed']."</h5>"; ?>
                        <?php 
                        $_SESSION['berhasildiganti'] = "Password berhasil diganti";
                    	$this->session->mark_as_flash('berhasildiganti');
                        redirect(base_url("contestant"));

                        ?>
                    </div>
                <?php elseif(isset($_SESSION['error'])) : ?>
                    <div class="warn-box">
                        <?php echo "<h5>".$_SESSION['error']."</h5>"; ?>
                    </div>
                <?php endif; ?></font></center>
			</div>

			<section class="input-login-box" style="background-color:white;">
				 <form action="<?php echo base_url(); ?>contestant/change_password" method="post" enctype="multipart/form-data" class="form-horizontal">
					<h1 class="text-center" style="margin-bottom: 16px;">Ganti Password</h1>
					<input type="hidden" name="jum_tim" value="3">
	                
					<div class="form-group">
						<label class="control-label col-sm-4" for="username">Password Lama:</label>
						<div class="col-sm-8">
							<input type="password" name="oldpassword" id="oldpassword" value="" class="form-control" placeholder="Masukkan Password Lama">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Password Baru:</label>
						<div class="col-sm-8">
							<input type="password" name="password" id="password" value="" class="form-control" placeholder="Masukkan Password Baru">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Ulang Password Baru:</label>
						<div class="col-sm-8">
							<input type="password" name="repeatPassword" id="repeatPassword" value="" class="form-control" placeholder="Ulangi Password Baru">
						</div>
					</div>
					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
						<input type="submit" name="btnChange" id="change" value="GANTI" class="btn btn-ilpc btn-login">
					</div>
				</form>
			</section>
		</div>
	</div>
</div>
<?php //echo $enableReserved . "<br>"; ?>