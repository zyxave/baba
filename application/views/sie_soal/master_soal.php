<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 19/11/2015
 * Time: 13:26
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700|Montserrat:400,700|Open+Sans' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>asset/2018/img/favicon.ico" rel="icon" type="image/png"/>
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2018/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2018/css/admstyle.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2018/font-awesome/css/font-awesome.min.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/2018/css/DateTimePicker.css'; ?>">
    <style>
        table.sc{border-collapse: collapse;}
        .sc th{text-align: center; border: 1px solid #3F3F3F; padding: 4px;}
        .sc tbody td{border: 1px solid #3F3F3F; padding: 4px 3px;}
        .sc tfoot td{border: 1px solid #5b1d12; padding: 4px 0px;}
        .ctr{text-align: center;} .ac{background-color: #91f271;} .wa{background-color: #E03833; color:#F0F0EE;}
        .kab,.sekolah{padding-left: 6px; line-height: 1;} .tim{font-weight: bold}
    </style>
</head>
<body>
<div id="wrap">
    <div>
        <header class="ilpc-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-3">
                        <div class="top-ilpc top-logo">
                            <img src="<?php echo base_url();?>asset/2018/img/ilpc-logo-warna.png" style="margin-left: -10px">
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-team" role="navigation">
                <div class="container-fluid">
                    <!-- logo -->
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ilpc-nav">
                            <span class="mobile-menu">MENU</span>
                            <span class="sr-only">Toggle navigation</span>
                        <span class="burger-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                        </button>
                    </div>
                    <!-- menu -->
                    <div class="collapse navbar-collapse" id="ilpc-nav">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo (isset($home)) ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/soal">Home</a></li>
                            <li class="<?php echo (isset($prog)) ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/programming">Programming</a></li>
                            <li class="<?php echo (isset($logic)) ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/logika">Multiple Choice</a></li>
                            <li class="<?php echo (isset($runcode)) ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>admin/soal/run_code" >Run Code</a></li>
                            <!-- <li><a href="<?php echo base_url(); ?>admin/judge">Judge</a></li> -->
                            <li><a href="<?php echo base_url(); ?>admin/soal/liattotal">Summerize Score</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/soal/setting">Settings</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['admin_nama']; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>admin/login/do_logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div class="container-fluid">
        <?php
        echo $content;
        ?>
    </div>

    <script type="text/javascript" src="<?php echo base_url() . 'asset/2016/js/DateTimePicker.js'; ?>"></script>
</div>
</body>
</html>

