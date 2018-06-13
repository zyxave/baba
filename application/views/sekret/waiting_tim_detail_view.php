<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 10/27/2015
 * Time: 1:57 AM
 */
?>


    <div class="row">
        <div class="col-xs-12">
            <div class="adminTopNav">
                <div class="row">
                    <div class="col-xs-4 col-sm-2">
                        <a href="<?php echo base_url() ?>admin/registration/waiting_team_list/<?php echo $backPage; ?>" class="btn btn-ilpc"><span class="fa fa-arrow-left fa-lg"></span> Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
            <!--<div class="col-xs-4 col-sm-2">
                <a href="<?php /*echo base_url() . "admin/registration/confirm_waiting_team/" . $tim['id']; */?>"
                class="btn btn-ilpc">Confirm Ready</a>
            </div>-->
        <div class="col-xs-12">
            <div class="r-box">
                <div class="row">
                    <div class="col-xs-12">
                        <div>Nama Tim : <?php echo $tim['nama_tim'] ?></div>
                        <div>
                            <?php if($tim['status'] == 'waiting payment') : ?>
                                Status Pembayaran : Tim belum upload bukti transfer
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="row">
                <?php
                $x = 1;
                $jum = count($anggota);
                foreach ($anggota as $row) : ?>
                    <div class="col-xs-12 col-sm-6">
                        <div class = "i-box member-box">
                            <div class="pic-box">
                                <a class="popup" href="<?php echo base_url() . $row['kartu_pelajar'] ?>">
                                <img class="idCard" src="<?php echo base_url() . $row['kartu_pelajar'] ?>"></a>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">Nama:</div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['nama'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">Kelas: </div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['kelas'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">Email: </div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['email'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">HP: </div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['hp'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">Alergi Makanan:</div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['alergi'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">Vegetarian: </div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['vegetarian'] == 'YA' ? 'Yes' : 'No' ?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">Ukuran Baju: </div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['ukuran_baju'] ?></div>
                            </div>
                        </div>
                    </div>

                <?php $x++;
                endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class = "i-box">
                <h3>Data Sekolah</h3>
                <div class="row">
                    <div>
                        <div class="col-xs-12 col-sm-3 mylabel"> Nama : </div>
                        <div class="col-xs-12 col-sm-9"><?php echo $tim['nama_sekolah'] ?></div>
                        <div class="col-xs-12 col-sm-3 mylabel"> Kab/Kota : </div>
                        <div class="col-xs-12 col-sm-9"><?php echo $tim['kab'] ?></div>
                        <div class="col-xs-12 col-sm-3 mylabel">Alamat : </div>
                        <div class="col-xs-12 col-sm-8"><?php echo $tim['alamat'] . " , " . $tim['kota_sekolah']?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class ="col-xs-12 col-sm-6">
            <div class="i-box">
                <h3>Guru </h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 mylabel">Nama :</div>
                    <div class="col-xs-12 col-sm-8"><?php echo $tim['nama_guru'] ?></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 mylabel">Address :</div>
                    <div class="col-xs-12 col-sm-8"><?php echo $tim['alamat_guru'] ?></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 mylabel">Email : </div>
                    <div class="col-xs-12 col-sm-8"><?php echo $tim['email'] ?></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 mylabel">HP/Telp : </div>
                    <div class="col-xs-12 col-sm-8"><?php echo $tim['telp'] ?></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 mylabel">Allergy : </div>
                    <div class="col-xs-12 col-sm-8"><?php echo $tim['alergi'] ?></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 mylabel">Vegetarian : </div>
                    <div class="col-xs-12 col-sm-8"><?php echo $tim['vegetarian'] ?></div>
                </div>
            </div>
        </div>
    </div>
<?php echo $jquery . $bootstrapJs; ?>
<script src="<?php echo base_url() . 'asset/2016/js/magnify.js'; ?>"></script>
<script>
    $(function(){
        $('.popup').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }
        });
    });
</script>
