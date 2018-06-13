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
    <title>ILPC 2016 - Page Not Found</title>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700|Montserrat:400,700|Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/2016/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/css/infostyle.css';?>">
</head>
<body class="bg-yellow">
<div class="width-wrapper">
    <div class="container-fluid">
        <?php $this->load->view('main/master_header_public'); ?>

        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="notfound">
                    <h2>Page Not Found</h2>
                    <div class="notfound-wrap">
                        <img src="<?php echo base_url();?>asset/2016/pics/notfound.png" alt="ILPC Logo Not Found">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . 'asset/2016/jquery-1.11.3.min.js'?>"></script>
<script src="<?php echo base_url() . 'asset/2016/bootstrap/js/bootstrap.min.js'?>"></script>

</body>
</html>

