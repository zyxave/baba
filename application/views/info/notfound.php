<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ILPC 2018 - Page Not Found</title>
        <link href="<?php echo base_url('asset/2018/img/favicon.ico'); ?>" rel="icon" type="image/png"/>

        <link href="<?php echo base_url('asset/2018/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/main.css'); ?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="body-stripes">
        <div class="container-fluid">
            <div class="row notfound-maskot">
                <h1 class="text-center">Page Not Found</h1>
                <div class="container">
                    <div class="col-xs-offset-2 col-xs-10 col-sm-offset-3 col-sm-8 col-md-offset-4 col-md-4">
                        <img class="img-responsive" src="<?php echo base_url('asset/2017/img/notfound.png'); ?>" alt="Page Not Found">
                    </div>
                </div>   
            </div> 
            <div class="row notfound-logo">
                 <div class="container">
                    <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-5 col-md-2">
                        <a href="<?php echo base_url('home'); ?>">
                            <img class="img-responsive" src="<?php echo base_url('asset/2018/img/ILPC-2018.png'); ?>" draggable="false">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('asset/2018/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/2018/js/wow.js'); ?>"></script>
    <script>
        new WOW().init();
    </script>

    </body>

</html>

