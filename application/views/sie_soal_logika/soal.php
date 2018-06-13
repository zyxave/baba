<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/1/2016
 * Time: 10:36 PM
 */
?>

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
                <a href="<?php echo base_url(). 'admin/logika/problems/' . $soal['id_kontes'];?>" class="btn btn-ilpc"><i class="fa fa-arrow-left"></i>Back</a>
            </div>
            <div class="col-xs-12 col-xs-3 col-md-2">
                <a href="<?php echo base_url() . 'admin/logika/edit_problem/' . $soal['id'];?>" class="btn btn-ilpc"><i class="fa fa-pencil"></i> Edit Soal</a>
            </div>
        </div>
        <div class="r-box">
            <div class="prob-hdr">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $soal['nomor'];?></h1>
                    </div>
                </div>
            </div>
            <div>
                <h3>Soal : <?php echo $soal['soal']; ?></h3>
                <?php
                foreach ($jawaban as $row) : {
                    ?>
                        <div>
                            Jawaban <?php echo $row['urutan'] . ' : '. $row['isi']?>
                        </div>
                    <?php
                }
                endforeach;
                ?>
            </div>

            <div class="prob-foot">

            </div>
        </div>

    </div>
</div>
