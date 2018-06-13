<div class="row">
    <div class="login-box col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <section class="header-ilpc">
            <a href="<?php echo base_url('home'); ?>">
                <img class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/ILPC-2018.png'); ?>" width="700px">
            </a>
        </section>
        <section class="new-password-box">
            <form action="<?php echo base_url('forgot_password/change_password'); ?>" method="post" class="form-horizontal">
            <input type="hidden" name="jum_tim" value="3">
                <h1 class="text-center" style="margin-bottom: 20px;">Reset Password</h1>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Password Baru:</label>
                    <div class="col-sm-10">
                        <input autofocus type="password" name="newPassword" id="oldpassword" value="" class="form-control" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="col-sm-10">
                        <span class="pesanSalah"><?php echo form_error('newPassword');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Konfirmasi Password:</label>
                    <div class="col-sm-10">
                        <input autofocus type="password" name="repeatNewPassword" id="password" value="" class="form-control" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="col-sm-10">
                        <span class="pesanSalah"><?php echo form_error('repeatNewPassword');?></span>
                    </div>
                </div>

                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
                    <input type="submit" name="btnChangePassword" value="SUBMIT" id="change" class="btn btn-ilpc btn-login">
                </div>
                <input type="hidden" value="<?php echo $teamId ; ?>" name="id">
                <input type="hidden" value="<?php echo $token ; ?>" name="token">
            </form>
        </section>
    </div>
</div>