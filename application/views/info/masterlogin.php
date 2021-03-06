<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> <?php echo $pageTitle;?></title>
        <link href="<?php echo base_url('asset/2018/img/favicon.ico'); ?>" rel="icon" type="image/ico"/>
        <!-- Bootstrap -->
        <link href="<?php echo base_url('asset/2018/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/main.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/ilpc-navbar.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/prism.css'); ?>" rel="stylesheet">



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://use.fontawesome.com/4d5ae65b30.js"></script>
</head>

<body class="body-stripes">


<div class="container-fluid">
    
<?php echo $content; ?> 

</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('asset/2017/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/2017/js/wow.js'); ?>"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>