 <div class="row">
    <section class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="login">
            <h1>Team Login</h1>
            <div class="row">
                <div class="col-xs-12">
                    <?php if(isset($_SESSION['loginFailed'])): ?>
                        <div class="warn-box">
                            <?php echo $_SESSION['loginFailed']; ?>
                        </div>
                    <?php elseif(isset($logoutMessage)): ?>
                        <div class="success-box"> <?php echo $logoutMessage; ?> </div>

                    <?php elseif(isset($_SESSION['resetSucceed'])): ?>
                        <div class="success-box"> <?php echo $_SESSION['resetSucceed']; ?> </div>

                    <?php elseif(isset($_SESSION['resetPasswordMessage'])) : ?>
                        <div class="success-box">
                            <?php echo $_SESSION['resetPasswordMessage']; //echo $_SESSION['email']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <form action="<?php echo base_url() . 'login/do_login'; ?>" method="post" >
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-4">
                        <label class="md-right">Username</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input autofocus type="text" name="username" class="cust-control">
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-4">
                        <label class="md-right">Password</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="password" name="password" class="cust-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">

                        <input type="submit" name="btnLogin" value="Login" class="btn btn-ilpc">
                    </div>
                </div>
                
                    <div class="col-xs-12">
                        <div class="lupaPass">
                            <a style="display: inline-block;" href="<?php echo base_url(); ?>forgot_password">Lupa Password ?</a>
                        </div>
                    </div>
               
            </form>
        </div>

    </section>

</div>
<div class="iklan">
 <div>
     <h3>Sponsor</h3>
     <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                <div class="sponsorpic">
                    <a href="https://www.citilink.co.id" target="_blank"><img class="citilink" src="<?php echo base_url();?>asset/2016/pics/citilink_new.png"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-lg-4 col-sm-offset-1 col-lg-offset-3">
                <div class="sponsorpic">
                    <a href="http://treq.co.id" target="_blank"> <img class="treq" src="<?php echo base_url(); ?>/asset/2016/pics/treq.png" alt="TREQ"> </a>
                </div>
            </div>
            <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-lg-2 col-sm-offset-0">
                <div class="sponsorpic">
                    <a href="http://www.cleopurewater.com/ina/index.php" target="_blank"> <img class="cleo" src="<?php echo base_url(); ?>/asset/2016/pics/cleo_new.png" alt="CLEO"> </a>
                </div>
            </div>
        </div>
 </div>
 <div class="mediapartner">
     <h3>Media Partner</h3>
     <div class="row">
         <div class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">
             <div class="sponsorpic">
                 <a href="http://eventsurabaya.net" target="_blank"> <img class="eventsby" src="<?php echo base_url(); ?>/asset/2016/pics/eventsby.png"> </a>
             </div>
         </div>
     </div>
 </div>
</div>