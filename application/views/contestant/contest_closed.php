<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 02/01/2016
 * Time: 20:36
 */
?>
<div class="row hasnot">
           <div class="container" style="padding-top:35px; padding-bottom:30px;">
        <section class="i-box">
                        <img class="img-responsive center-block" src="<?php echo base_url('asset/2017/img/warning.png'); ?>" width="250px"> 

            <?php if(isset($_SESSION['notReadyMessage'])) : ?>
            <div style="text-align: center">
                <?php echo "<h4>".$_SESSION['notReadyMessage']."</h4>"; ?>
            </div>
            <?php elseif(isset($_SESSION['contestEndedMessage'])) : ?>
            <div style="text-align: center">
                <?php echo "<h4>".$_SESSION['contestEndedMessage']."</h4>"; ?>
            </div>
            <?php else : ?>
            <div style="text-align: center">
                Kontes yang dicari tidak tersedia
            </div>
            <?php endif; ?>
        </section>
    </div>
</div>


