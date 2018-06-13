<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 12/12/2015
 * Time: 18:09
 */?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle;?></title>
<link href="<?php echo base_url(); ?>asset/2016/pics/favicon.png" rel="icon" type="image/png"/>
<meta name="author" content="ILPC UBAYA Information System" >
<meta name="keywords" content="Lomba Logika, Lomba Pemrograman, Lomba Logika dan Pemrograman, Lomba SMA, ILPC, UBAYA, ILPC 2016, ILPC UBAYA">
<meta name="description" content="ILPC UBAYA merupakan lomba logika dan pemrograman untuk pelajar SMA/sederajat seluruh Indonesia yang diselenggarakan oleh Jurusan Teknik Informatika Universitas Surabaya">
<link href='https://fonts.googleapis.com/css?family=Oswald:700|Montserrat:400,700|Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/bootstrap/css/bootstrap.min.css';?>">
<link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/css/pubstyle.css';?>">
<link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/font-awesome/css/font-awesome.min.css';?>">
</head>
<body>
<div id="wrap">
    <div class="wrapper-md">
        <div class="container-fluid">
            <?php $this->load->view('main/master_header_public'); ?>

            <?php echo $content; ?>

        </div>
    </div>

</div>
<footer class="my-footer">
    <div class="width-wrapper">
        <div class="container-fluid">
            <section class="kaki">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="sni">
                            <a href="http://www.ubaya.ac.id/2014/content/news_detail/1425/Universitas-Surabaya-Raih-SNI-Award-2014.html" target="_blank"><img src="<?php echo base_url();?>asset/2016/pics/sni.png"/></a>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="">
                            <a href="http://www.ubaya.ac.id/2013/content/news_detail/1207/Universitas-Surabaya-Terpilih-Sebagai-Salah-Satu-Universitas-Swasta-Terbaik-di-Indonesia.html" target="_blank">
                                <img src="<?php echo base_url();?>asset/2016/pics/bestcampus.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="greencampus">
                            <a href="http://www.ubaya.ac.id/2013/content/news_detail/971/EKONOMI-HIJAU--Universitas-Surabaya-Raih-Indonesia-Green-Award-2012.html" target="_blank">
                                <img src="<?php echo base_url();?>asset/2016/pics/greencampus.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="pts-fav">
                            <a href="http://www.ubaya.ac.id/2013/content/news_detail/1214/Universitas-Surabaya-Terpilih-Sebagai-PTS-Terfavorit-Surabaya-Versi-Tempo-2013.html" target="_blank">
                                <img src="<?php echo base_url();?>asset/2016/pics/ptsterfavorit.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="copyright">
                            Copyright &copy; 2015 - 2016 ILPC - Universitas Surabaya<br/>
                            All Rights Reserved<br/>
                            For the best experience, use latest browser such as : <br>
                            Edge 12, Firefox 41, Chrome 45 desktop browser, or your latest mobile browser
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</footer>

<script src="<?php echo base_url() . 'asset/2016/jquery-1.11.3.min.js'?>"></script>
<script src="<?php echo base_url() . 'asset/2016/bootstrap/js/bootstrap.min.js'?>"></script>
</body>
</html>