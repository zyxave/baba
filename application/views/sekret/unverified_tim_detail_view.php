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
                    <a href="<?php echo base_url() ?>admin/registration/unverified_team_list/<?php echo $backPage; ?>" class="btn btn-ilpc"><span class="fa fa-arrow-left fa-lg"></span> Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <!--<div class="col-xs-4 col-sm-2">
                <a href="<?php /*echo base_url() . "admin/registration/confirm_waiting_tim/" . $tim['id']; */?>"
                class="btn btn-ilpc">Confirm Ready</a>
            </div>-->
    <div class="col-xs-12">
        <div class="r-box">
            <div class="row">
                <div class="col-xs-12">
                    <div><b>Nama Tim</b> : <?php echo $tim['nama_tim'] ?></div>
                    <div>
                    <?php if($tim['status'] == 'unverified payment') : ?>
                        <b>Status Pembayaran </b>: Menunggu verifikasi bukti transfer oleh panitia
                    <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Bukti Transfer</h3>
                            <div class="pic-box">
                                <a class="popup" href="<?php echo base_url() . $tim['bukti_transfer']; ?>">
                                <img class="buktiTransfer" src="<?php echo base_url() . $tim['bukti_transfer']; ?>"> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <a href="" data-toggle="modal" data-target="#acceptPaymentDialog" class="btn btn-ilpc">Terima Pembayaran</a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="" data-toggle="modal" data-target="#declinePaymentDialog" class="btn btn-ilpc">Tolak Pembayaran</a>
                        </div>
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
                                <a class="popup" href="<?php echo base_url() . $row['kartu_pelajar']; ?>">
                                <img class="idCard" src="<?php echo base_url() . $row['kartu_pelajar']; ?>"></a>
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
                                <div class="col-xs-12 col-sm-3 mylabel">Food Allergy:</div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['alergi'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 mylabel">Vegetarian: </div>
                                <div class="col-xs-12 col-sm-9"><?php echo $row['vegetarian'] == 'YA' ? 'Yes' : 'No' ?></div>
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
<div class="modal fade" id="acceptPaymentDialog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ><span>&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Terima Pembayaran</h4>
            </div>
            <form action="<?php echo base_url(); ?>admin/registration/accept_payment" method="post">
                <div class="modal-body">
                    <div>
                        Apakah anda yakin ingin menerima pembayaran? <br>Status pembayaran tim <b><?php echo $tim['nama_tim']; ?></b> akan diubah menjadi <b>lunas</b>.
                    </div>
                </div>
                <input type="hidden" name="teamId" value="<?php echo $tim['id'];?>">
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-6"><input type="submit" name="terimaPembayaran" value="Ya" class="btn btn-ilpc"></div>
                        <div class="col-sm-3"><button type="button" class="btn btn-block" data-dismiss="modal">Tidak</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="declinePaymentDialog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ><span>&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Tolak Pembayaran</h4>
            </div>
            <form action="<?php echo base_url(); ?>admin/registration/decline_payment" method="post">
                <div class="modal-body">
                    <div>
                        Apakah anda yakin ingin menolak pembayaran? <br>Status pembayaran tim <b><?php echo $tim['nama_tim']; ?></b> akan diubah menjadi <b>Menunggu Pembayaran</b>.
                    </div>
                </div>
                <input type="hidden" name="teamId" value="<?php echo $tim['id'];?>">
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-6"><input type="submit" name="tolakPembayaran" value="Ya" class="btn btn-ilpc"></div>
                        <div class="col-sm-3"><button type="button" class="btn btn-block" data-dismiss="modal">Tidak</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $jquery . $bootstrapJs; ?>
<script src="<?php echo base_url() . 'asset/2016/js/magnify.js'; ?>"></script>
<script>
$(function(){
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });
});
</script>
