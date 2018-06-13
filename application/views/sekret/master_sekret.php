<?php
/**
 * User: CWR
 * Date: 18/10/2015
 * Time: 13:33
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
    <link href="<?php echo base_url(); ?>../../asset/2018/img/favicon.ico" rel="icon" type="image/png"/>
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2018/bootstrap/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2018/css/admstyle.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2018/css/magnify.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2018/font-awesome/css/font-awesome.min.css';?>">
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
                            <li><a href="<?php echo base_url(); ?>admin/sekretariat">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Registration <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <!--<li><a href="<?php echo base_url(); ?>admin/Registration/all_tim">All Registration</a></li>-->
                                    <li><a href="<?php echo base_url(); ?>admin/Registration/waiting_team_list">Waiting Payment</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/Registration/unverified_team_list">Waiting
                                            Verification</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/Registration/ready_team">Completed
                                            Registration</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url(); ?>admin/sekretariat/school_list">School</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/sekretariat/teacher_list">Teacher</a></li>
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
    <!--<script src="<?php /*echo base_url() . 'asset/2016/jquery-1.11.3.min.js'; */?>"></script>
    <script src="<?php /*echo base_url() . 'asset/2016/bootstrap/js/bootstrap.min.js'*/?>"></script>-->
    <div class="wrapper-md">
        <div class="container-fluid">
            <?php
            echo $content;
            ?>
        </div>
    </div>
</div>
</body>
</html>
