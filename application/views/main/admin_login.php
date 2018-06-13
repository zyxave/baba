<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700|Montserrat:400,700|Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/css/pubstyle.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/font-awesome/css/font-awesome.min.css';?>">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <div id="wrap">
        <div class="wrapper-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="login-topheader">
                            <a href="<?php echo base_url();?>">
                                Web Homepage
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <section class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="login">
                            <h1>Admin Login</h1>
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php if(isset($_SESSION['loginFailed'])): ?>
                                        <div class="warn-box">
                                            <?php echo $_SESSION['loginFailed']; ?>
                                        </div>
                                    <?php elseif(isset($logoutMessage)): ?>
                                        <div class="success-box"> <?php echo $logoutMessage; ?> </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <form action="<?php echo base_url() . 'admin/login/do_login'; ?>" method="post" >
                                <div class="row form-row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <input autofocus type="text" name="username" class="cust-control">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <input type="password" name="password" class="cust-control">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <label></label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <div class="g-recaptcha" data-sitekey="6LdySAkUAAAAAMvGzKkO1SXFKDKjmunzp-w1UQig" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>                                
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                            <input type="submit" name="btnLogin" value="Login" class="btn btn-ilpc">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
