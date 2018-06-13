<div class="row">
	<div class="login-box col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

		<section class="header-ilpc">
			<a href="<?php echo base_url('home'); ?>">
				<img class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/ILPC-2018.png'); ?>" width="700px">
			</a>
		</section>
		<section class="input-login-box">
			<form action="<?php echo base_url('login/do_login'); ?>" method="post" class="form-horizontal">
				<h1 class="text-center" style="margin-bottom: 16px;">Team Login</h1>
				<?php if(isset($_SESSION['loginFailed'])): ?>
                        <p class="alert alert-gagal text-center">
                            <?php echo $_SESSION['loginFailed']; ?>
                        </p>
                    <?php elseif(isset($logoutMessage)): ?>
                        <p class="alert alert-berhasil text-center"> <?php echo $logoutMessage; ?> </p>

                    <?php elseif(isset($_SESSION['resetSucceed'])): ?>
                        <p class="alert alert-berhasil text-center"> <?php echo $_SESSION['resetSucceed']; ?></p>

                    <?php elseif(isset($_SESSION['resetPasswordMessage'])) : ?>
                        <p class="alert alert-berhasil text-center">
                            <?php echo $_SESSION['resetPasswordMessage']; //echo $_SESSION['email']; ?>
                        </p>
                    <?php endif; ?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="username">Username:</label>
					<div class="col-sm-10">
						<input autofocus type="text" name="username" class="form-control" placeholder="Masukkan Username">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Password:</label>
					<div class="col-sm-10">
						<input type="password" name="password" class="form-control" placeholder="Masukkan Password">
					</div>
				</div>
				<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
					<input type="submit" name="btnLogin" value="LOGIN" class="btn btn-ilpc btn-login">
				</div>
			</form>
			<div class="row">
				<div class="col-xs-12">
					<p class="lupaPass"><a href="<?php echo base_url('forgot_password'); ?>">Lupa Password ?</a></p>
				</div>
			</div>
		</section>
	</div>
</div>
<br><br><br>




	


