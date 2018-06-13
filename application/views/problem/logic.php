<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 05/01/2016
 * Time: 22:03
 */
?>
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
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/css/teamstyle_070116.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/font-awesome/css/font-awesome.min.css';?>">
</head>
<body>
<div id="wrap">
    <header class="ilpc-header">
        <div class="container-fluid">
            <div class="row">
                <div id="serverTime">

                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-3">
                    <div class="top-ubaya top-logo">
                        <a href="http://ubaya.ac.id" target="_blank">
                            <img src="<?php echo base_url();?>asset/2016/pics/logoUbaya.png">
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-3 col-sm-3 col-xs-4">
                    <div class="top-newilpc top-logo">
                        <a href="<?php echo base_url();?>home">
                            <img src="<?php echo base_url();?>asset/2016/pics/logoNew.png"> </a>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-5">
                    <div class="top-ilpc top-logo">
                        <img src="<?php echo base_url();?>asset/2016/pics/logoIlpc.png">
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="wrapper-md">
    <div class="container-fluid">
    <?php ?>
        <div class="row">
            <div class="col-xs-12">
                <h1 style="text-align: center; margin-bottom: 0px;">Soal <?php echo $contestName;?></h1>
            </div>
        </div>
        <div class="row">
            <br>
            <div class="col-xs-12">
                <div class="r-box">
                    <?php foreach($problems as $key => $problem) : ?>
                    <div class="row">
                        <div class="col-xs-1">
                        <div style="text-align: right;"><?php echo $problem['nomor']; ?> . </div>
                        </div>
                        <div class="col-xs-10">
                            <?php echo $problem['isi']; ?>
                            <div class="pilganOption">
                                <?php foreach($options[$key] as $option) : ?>
                                    <div class="row no-gutter">
                                        <div class="col-xs-1">
                                            <?php echo $option['urutan'] ?>.
                                        </div>
                                        <div class="col-xs-11">
                                            <?php echo $option['isi'] ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php endforeach; ?>
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
