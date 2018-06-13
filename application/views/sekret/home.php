<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 12/09/2015
 * Time: 21:25
 */

?>
<div class="row mt">
    <div class="col-xs-12 col-sm-3 mb">
        <div class="panelbox">
            <h4>Jumlah Pendaftar</h4>
            <div class="num-big"><?php echo $allContestants['jumlah']; ?></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 mb">
        <div class="panelbox">
            <h4>Sudah Bayar</h4>
            <div class="num-big"><?php echo $readyContestants['jumlah']; ?></div>
        </div>
    </div>
</div>
<?php echo $jquery . $bootstrapJs; ?>
