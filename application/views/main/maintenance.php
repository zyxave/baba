<?php
/**
 * User: CWR
 * Date: 13/10/2015
 * Time: 9:23
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url(); ?>asset/2016/pics/favicon.png" rel="icon" type="image/png"/>
    <title><?php echo $pageTitle;?></title>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700|Montserrat:400,700|Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/2016/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/css/infostyle.css';?>">
    <style type="text/css">
        h1{color: #FF006F; text-align: center;}
        .maintenance{padding: 24px 0;}
    </style>
</head>
<body class="bg-yellow">
<div class="width-wrapper">
    <div class="container-fluid">
        <?php $this->load->view('main/master_header_public'); ?>
        <section>
            <h1>Sorry for the Inconvenience</h1>
            <div class="row">
                <section class="maintenance">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
                        <div><?php echo $pesan; ?></div>
                        <div>
                            <img src="<?php echo base_url();?>asset/2016/pics/maintenance.png" alt="Maintenance" style="width:100%;">
                        </div>
                    </div>
                </section>

            </div>
        </section>
    </div>
</div>
<script src="<?php echo base_url() . 'asset/2016/jquery-1.11.3.min.js'?>"></script>
<script src="<?php echo base_url() . 'asset/2016/bootstrap/js/bootstrap.min.js'?>"></script>

</body>
</html>