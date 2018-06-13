<div class="row">
    <div class="login-box col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

        <section class="header-ilpc">
            <a href="<?php echo base_url('home'); ?>">
                <img class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/ILPC-2018.png'); ?>" width="700px">
            </a>
        </section>
        <section class="forgot-password-box">
            <form action="<?php echo base_url('forgot_password/reset'); ?>" method="post" class="form-horizontal">
                <h1 class="text-center" style="margin-bottom: 16px;">Reset Password</h1>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Username:</label>
                    <div class="col-sm-10">
                        <input autofocus type="text" name="username" class="form-control" placeholder="Masukkan Username">
                    </div>
                </div>

                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
                    <input type="submit" name="btnResetPass" value="RESET" class="btn btn-ilpc btn-login">
                </div>
            </form>
        </section>
    </div>
</div>