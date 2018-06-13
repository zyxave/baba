<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <?php if (isset($autoRefresh)) :?>
            <meta http-equiv="refresh" content="30;url=<?php echo base_url() ?>scoreboard/contest/<?php echo $contest['id']?>" />
        <?php endif; ?>

        <title><?php echo $pageTitle;?></title>
        <link href="<?php echo base_url('asset/2018/img/favicon.ico'); ?>" rel="icon" type="image/png"/>
        <!-- Bootstrap -->
        <link href="<?php echo base_url('asset/2018/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/main.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/ilpc-navbar.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/prism.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'asset/2018/css/teamstyle_070116.css';?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/2018/css/peserta.css'); ?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body style="background-color:#2f5d8c;">
    <div style="background-color:#ffffff;">
    <!--navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <img class="logo-navbar-tengah" src="<?php echo base_url();?>asset/2018/img/ilpc-logo-warna.png" width="125px">
            <ul class="nav navbar-nav navbar-right">
                <li class="jam-server">Jam Server : <span id="serverTime"></span></li>
            </ul>
        </div>
    </nav>
	
    <div class="container-fluid" style="margin-top: 60px;">
    <?php echo $content; ?> 
    </div>

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
                <a href="http://ubaya.ac.id/" target="_blank"><img class="center-block" src="<?php echo base_url('asset/2018/img/logo-ubaya.png'); ?>" height="60px" alt=""></a> 
            </div>
        </div>
         
        <div class="row contact-footer"> 
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
    <script src="<?php echo base_url('asset/2017/js/bootstrap.min.js'); ?>"></script>
    
    <!-- Animasi saat scroll -->
    <script src="<?php echo base_url('asset/2017/js/wow.js'); ?>"></script>
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
    $(function() {
        var bUrl = "<?php echo base_url();?>";
        var counter = 1;
        function refreshTime(interval){
            setTimeout(function(){
                var original = (new Date()).getTime();
                $.ajax({
                    method: 'GET',
                    url: bUrl + 'clock/getclock',
                    data: {'original': original},
                    success: setCurrentTime
                });
            }, interval);
        }
        refreshTime(0);
         var serverTime = new Date(<?php echo time() * 1000 ?>);
         function setCurrentTime(output) {
             //alert(output);
             var returnedTime = (new Date()).getTime();
             var result = $.parseJSON(output);
             var original = result.originalTime;
             var receive = new Date(result.receiveTime).getTime();
             var transmit = new Date(result.transmitTime).getTime();
             var sendingTime = receive - original;
             var receivingTime = returnedTime - transmit;
             var difference = sendingTime - ((sendingTime + receivingTime)/2);
             var currentTime = (new Date()).getTime() + difference;
             serverTime = new Date(currentTime);
             refreshTime(60000);
             if(counter === 1) {
                 setInterval(displayTime,1000);
                 counter++;       
             }
         }

         function displayTime() {
             serverTime.setSeconds(serverTime.getSeconds()+1);
             var timeText = ('0' + serverTime.getHours()).slice(-2) + ":" + ('0'+serverTime.getMinutes()).slice(-2) + ":" + ('0' + serverTime.getSeconds()).slice(-2);
             $('#serverTime').html(timeText);
         }

     });
    </script>
</body>
</html>

