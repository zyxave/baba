<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> <?php echo $pageTitle;?></title>
        <link href="<?php echo base_url('asset/2018/img/favicon.ico'); ?>" rel="icon" type="image/png"/>
		
		 <!-- Bootstrap -->
        <link href="<?php echo base_url('asset/2018/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/main.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/animate.css'); ?>" rel="stylesheet">

        


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://use.fontawesome.com/4d5ae65b30.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body class="body-stripes">
<script src="<?php echo base_url('asset/2018/js/bootstrap.min.js'); ?>"></script>

<div class="container-fluid">
    
<!--content goes here-->
<?php echo $content; ?> 

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('asset/2018/bootstrap/js/bootstrap.min.js'); ?>"></script>
    
    <!-- Animasi saat scroll -->
    <script src="<?php echo base_url('asset/2018/js/wow.js'); ?>"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>