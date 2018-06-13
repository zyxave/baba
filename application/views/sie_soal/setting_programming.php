<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 16/12/2015
 * Time: 15:00
 */?>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="i-box">
            <h3>Programming Contest</h3>
            <form method="post" action="<?php echo base_url();?>admin/soal/setting_programming">

                <div class="row">
                    <div class="col-xs-12 col-sm-6 mylabel"> First Solver Max Point : </div>
                    <div class="col-xs-12 col-sm-6"><?php echo$kompetisi['max_poin_ac'] ?> poin </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 mylabel"> Scoreboard Freeze Before Contest Ends : </div>
                    <div class="col-xs-12 col-sm-6"> <?php echo $kompetisi['time_freeze'] ?> minutes </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
