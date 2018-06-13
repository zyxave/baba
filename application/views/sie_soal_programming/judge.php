<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 26/12/2015
 * Time: 21:41
 */?>
<div class="row">
    <div class="col-xs-12">
        <h1 style="text-align: center">Pending Submission</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php foreach($submissions as $row) : ?>
        <div class="progtbl">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="tbl-hdr">Team : <?php echo $row['nama_tim'] ?> , <?php echo $row['nama_sekolah'] . " - " . $row['kabupaten']?></div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <b>Submit Time</b> : <?php echo $row['jam']?>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5"><b>Soal</b> <?php echo $row['urutan_soal'] ?> - <?php echo $row['nama_soal'] ?></div>
                <div class="col-xs-12 col-sm-6 col-md-2"><b><?php echo $row['bahasa'] ?></b></div>
                <div class="col-xs-6 col-sm-6 col-md-2"><a href="<?php echo base_url(). $row['file'] ?>" target="_blank" class="btn btn-ilpc">Source Code</a></div>
                <?php if($row['bahasa'] == 'pascal') : ?>
                    <div class="col-xs-12 col-md-6">
                        Perintah Compile: <input type="text" class="cust-control" value="fpc <?php echo $row['file']?>">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2"><a href="<?php echo base_url() . 'admin/judge/do_judge_pascal/' . $row['id']; ?>" class="btn btn-ilpc">Judge Pascal</a></div>
                    <div class="col-xs-6 col-sm-6 col-md-2"><a href="<?php echo base_url() . 'admin/judge/pascal_compile_error/' . $row['id']; ?>" class="btn btn-ilpc">Set Compile Error</a></div>
                    <div class="col-xs-6 col-sm-6 col-md-2"><a href="<?php echo base_url() . 'admin/judge/do_judge/' . $row['id']; ?>" class="btn btn-ilpc">Judge (Normal)</a></div>
                <?php else : ?>
                    <div class="col-xs-6 col-sm-6 col-md-2"><a href="<?php echo base_url() . 'admin/judge/do_judge/' . $row['id']; ?>" class="btn btn-ilpc">Judge</a></div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>

