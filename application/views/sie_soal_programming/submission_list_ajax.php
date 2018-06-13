<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 02/01/2016
 * Time: 12:52
 */?>

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
            <div class="col-xs-12 col-sm-6 col-md-1"><b><?php echo $row['bahasa'] ?></b></div>
            <div class="col-xs-12 col-sm-6 col-md-2"><b>Verdict : <?php echo $row['hasil'] ?></b></div>
            <div class="col-xs-6 col-sm-6 col-md-2"><a href="<?php echo base_url(). $row['file'] ?>" target="_blank" class="btn btn-ilpc">Source Code</a></div>
            <div class="col-xs-6 col-sm-6 col-md-2">
                <?php if($row['hasil'] === 'Pending') : ?>
                    <a href="<?php echo base_url() . 'admin/judge/do_judge/' . $row['id']; ?>" class="btn btn-ilpc">Judge</a>
                <?php else : ?>

                <?php endif; ?>
            </div>

        </div>
    </div>
<?php endforeach; ?>
