<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 12/12/2015
 * Time: 20:24
 */?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <div class="login">
            <h1>Reset Password</h1>
            <form action="<?php echo base_url(); ?>forgot_password/change_password" method="post">
                <input type="hidden" name="jum_tim" value="3">
                <section class="mybox">
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right"> Password Baru</label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input type="password" name="newPassword" id="oldpassword" value="" class="cust-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <span class="pesanSalah"><?php echo form_error('newPassword');?></span>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right">Ulangi Password Baru </label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input type="password" name="repeatNewPassword" id="password" value="" class="cust-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <span class="pesanSalah"><?php echo form_error('repeatNewPassword');?></span>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <input class="btn btn-ilpc" type="submit" name="btnChangePassword" value="Submit" id="change"/>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $teamId ; ?>" name="id">
                    <input type="hidden" value="<?php echo $token ; ?>" name="token">
                </section>

            </form>
        </div>

    </div>
</div>
