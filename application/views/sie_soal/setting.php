<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 16/12/2015
 * Time: 14:14
 */
?>
<div class="row">
    <div class="col-xs-12">
        <h1>Score Settings </h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8">

        <div class="i-box">
            <h3>Multiple Choice Contest</h3>

            <div class="row">
                <div class="col-xs-12 col-sm-3 mylabel"> Benar :</div>
                <div class="col-xs-12 col-sm-9"><?php echo$kompetisi['poin_benar'] ?> poin </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 mylabel"> Salah :</div>
                <div class="col-xs-12 col-sm-9"><?php echo$kompetisi['poin_salah'] ?> poin </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 mylabel"> Kosong :</div>
                <div class="col-xs-12 col-sm-9"><?php echo$kompetisi['poin_kosong'] ?> poin </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-2 col-sm-offset-3">
                    <br>
                    <a href="<?php echo base_url()?>admin/soal/setting/multiplechoice" class="btn btn-ilpc"><span class="fa fa-pencil fa-lg"></span> Edit </a>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="i-box">
            <h3>Programming Contest</h3>
            <div class="row">
                <div class="col-xs-12 col-sm-6 mylabel"> First Solver Max Point : </div>
                <div class="col-xs-12 col-sm-6"><?php echo$kompetisi['max_poin_ac'] ?> poin </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 mylabel"> Unfreeze After : </div>
                <div class="col-xs-12 col-sm-6"> <?php echo $kompetisi['time_freeze'] ?> minutes </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-2 col-sm-offset-3">
                    <br>
                    <a href="<?php echo base_url()?>admin/soal/setting/programming" class="btn btn-ilpc"><span class="fa fa-pencil fa-lg"></span> Edit </a>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
