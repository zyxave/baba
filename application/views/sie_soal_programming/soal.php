<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 25/12/2015
 * Time: 22:33
 */?>
<?php if(isset($_SESSION['problemUpdated'])) : ?>
<div class="row">
    <br>
    <div class="col-xs-12">
        <div class="success-box">Soal Berhasil Diubah</div>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <br>
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12 col-xs-3 col-md-2">
                <a href="<?php echo base_url(). 'admin/programming/problems/' . $soal['id_kontes'];?>" class="btn btn-ilpc"><i class="fa fa-arrow-left"></i>Back</a>
            </div>
            <div class="col-xs-12 col-xs-3 col-md-2">
                <a href="<?php echo base_url() . 'admin/programming/edit_problem/' . $soal['id'];?>" class="btn btn-ilpc"><i class="fa fa-pencil"></i> Edit Soal</a>
            </div>
        </div>
        <div class="r-box">
            <div class="prob-hdr">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $soal['nomor'] . " - " . $soal['judul'];?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                <div class="tl">Time Limit : <?php echo $soal['time_limit']; echo $soal['time_limit'] == 1 ? ' second' : ' seconds';?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                <div class="author">Author : <?php echo $soal['pembuat'];?></div>
                    </div>
                </div>
            </div>
            <div class="narasi">
                <?php echo $soal['deskripsi']; ?>
            </div>
            <div class="prob-foot">

            </div>
        </div>

    </div>
</div>
