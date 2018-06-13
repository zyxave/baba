<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $pageTitle;?></title>
        <link href="<?php echo base_url('asset/2018/img/favicon.ico'); ?>" rel="icon" type="image/ico"/>
        <!-- Bootstrap -->
        <link href="<?php echo base_url('asset/2018/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/main.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/ilpc-navbar.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/prism.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
       
        <?php 
            if (isset($galeri))
            {
                echo '<link href="' . base_url('asset/2017/lightbox/css/lightbox.css') . '" rel="stylesheet">';
            }
         ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--<script src="https://use.fontawesome.com/4d5ae65b30.js"></script>-->

    </head>

    <body>

        

    <!--navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-utama" aria-expanded="false">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('asset/2018/img/ilpc-logo-warna.png'); ?>" height="40px" style="margin-top: -10px"></a>
         </div>
         
         <div class="collapse navbar-collapse" id="menu-utama">
            <ul class="nav navbar-nav">
                <li class="dropdown <?php echo (isset($acara)) ? 'active' : '' ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ACARA <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('detail'); ?>">DETAIL LOMBA</a></li>
                        <li><a href="<?php echo base_url('peraturan'); ?>">PERATURAN LOMBA</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url('panduan'); ?>">PANDUAN</a></li>
                    </ul>
                </li>
                <li class="<?php echo (isset($akomodasi)) ? 'active' : '' ?>"><a href="<?php echo base_url('akomodasi'); ?>">AKOMODASI <span class="sr-only">(current)</span></a></li>
                <li class="<?php echo (isset($galeri)) ? 'active' : '' ?>"><a href="<?php echo base_url('galeri'); ?>">GALERI</a></li>
                <li class="<?php echo (isset($faq)) ? 'active' : '' ?>"><a href="<?php echo base_url('faq'); ?>">F.A.Q.</a></li>
                <li class="<?php echo (isset($contact)) ? 'active' : '' ?>"><a href="<?php echo base_url('contact'); ?>">KONTAK KAMI</a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
               <?php if(isset($_SESSION['login_id'])) : ?>
                <li><a href="<?php echo base_url(); ?>contestant"> Halo, <?php echo $_SESSION['login_username'];?> </a></li>
                <?php else : ?>
                    <a class="btn btn-ilpc navbar-btn" href="<?php echo base_url('registration'); ?>">DAFTAR</a>
                    <a class="btn btn-ilpc navbar-btn" href="<?php echo base_url('login'); ?>">LOGIN</a>
                <?php endif; ?>
               </a>
            </ul>
        
         </div><!--navbar-collapse-->
       </div><!--container-fluid--> 
    </nav> <!--navigation-bar-->
    
    <!--content goes here-->
    <?php echo $content; ?> 

    <footer>          
        <div class="container-fluid">

            <!--sponsor-->
            <div class="row sponsor">
                <div class="container sponsor-container">
                    <h3 class="text-center sponsor-title">Sponsored by:</h3>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img width="100px" title="Laritta" class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/sponsor/logo-laritta.png'); ?>">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img width="100px" title="Event Surabaya" class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/sponsor/logo-eventsurabaya.png'); ?>">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img width="125px" title="auxiwear" class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/sponsor/logo-auxiwear.png'); ?>">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img width="150px" title="Outstanding Rental" class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/sponsor/logo-orent.jpg'); ?>">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img width="200px" title="IJL Hosting" class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/sponsor/logo-ijlhosting.png'); ?>">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img width="200px" title="Ayam Goreng Nelongso" class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/sponsor/logo-nelongso.png'); ?>">
                    </div>
                </div> 
            </div>

           <div class="row pure-footer">
                <div class="container">
                    <a href="http://ubaya.ac.id/"><img class="center-block" src="<?php echo base_url('asset/2018/img/logo-ubaya.png'); ?>" height="60px" alt=""></a> 
                </div>
            </div>
         
            <div class="row contact-footer">
                <div class="col-xs-12">
                    <h3 align="center" style="color:#FEEF5E; font-size:1.5em; letter-spacing: 1px;">Follow us on Social Media </h3>
                </div>
                <div class="col-xs-12 col-sm-12">                    
                    <div class="sosmed text-center">      
                        <a href="https://line.me/ti/p/%40qix0011e" target="_blank"><img class="sosmed-logo" src="<?php echo base_url('asset/2017/img/logo-sosmed/lineat.png'); ?>" width="36px"></a>                        
                        <a href="https://www.facebook.com/ILPC.ubaya.page/" target="_blank"> <i class="fa fa-facebook-square" style="font-size: 40px; color:white; padding-left:10px;"></i> </a>
                        <a href="https://www.instagram.com/ilpc_ubaya/" target="_blank"> <i class="fa fa-instagram" style="font-size: 40px; color:white; padding-left:10px;"></i> </a>
                        <a href="https://www.youtube.com/channel/UCNMgSp2PUip-TsEuAYN77iQ" target="_blank"> <i class="fa fa-youtube-play" style="font-size: 40px; color:white; padding-left:10px;"></i> </a>
                             
                    </div>
                </div>
                
                <div class="container">
                    <div class="col-xs-12" style="margin-top: 0px;">
                        <p class="copyright-text text-center" align="center">Copyright &copy; Sistem Informasi ILPC 2018</p>
                    </div>  
                </div>
            </div>
        </div>   
    </footer>
    
    
    

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('asset/2018/bootstrap/js/bootstrap.min.js'); ?>"></script>
    
    <!-- Animasi saat scroll -->
    <script src="<?php echo base_url('asset/2018/js/wow.js'); ?>"></script>
    <script>
        new WOW().init();
    </script>
    <?php 
            if (isset($galeri))
            {
                echo '<script src="' . base_url('asset/2017/lightbox/js/lightbox-plus-jquery.js') . '"></script>';
            }
    ?>

    </body>
</html>
