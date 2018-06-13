<div class="row">
    <section class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="login">
            <h1>Reset Password</h1>

            <form action="<?php echo base_url() . 'forgot_password/reset'; ?>" method="post" >
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-4">
                        <label class="md-right">Username</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input autofocus type="text" name="username" class="cust-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" name="btnResetPass" value="Reset" class="btn btn-ilpc">
                    </div>
                </div>

            </form>
        </div>

    </section>
</div>
