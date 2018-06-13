<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 02/01/2016
 * Time: 22:00
 */?>
<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <section class="i-box">
            <h4 style="text-align: center; color: #FACF29"><i class="fa fa-exclamation-triangle fa-3x"></i></h4>
            <?php if(isset($_SESSION['hasNotJoinContest'])) : ?>
                <div style="text-align: center">
                    Tidak Ada Kontes yang Sedang Anda Ikuti.<br>
                    Silahkan Join Kontes Terlebih Dahulu Melalui Halaman <a href="<?php echo base_url() . 'contest'?>">Contest</a>
                </div>
            <?php endif; ?>
        </section>
    </div>
</div>
