<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2 col-md-offset-2">
        <br>
        <a href="<?php echo base_url() .'contestant/profile'?>" class="btn btn-ilpc"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
</div>
<div class="row edit-profile">
    <div class="col-sm-12 col-md-offset-3 col-md-6 col-lg-6 ">
        <div class="contactbox">
            <form action="<?php echo base_url(); ?>contestant/update_profile" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="contestantId" value="<?php echo $profile['id']; ?>">
                <section class="mybox">
				<div class="row">
                    <h3 class="topTitle" align="center">Ubah Profil</h3>
					</div>
                    <?php ?>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right" for="kartu">Foto Kartu Pelajar</label>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <input type="file" name="fotoKartu" id="kartu" value=""> * Kosongi jika tidak ingin mengganti foto saat ini
                        </div>
                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah">
                        <?php
                        if(isset($photoErrors)) :
                            foreach($photoErrors as $message) :
                                echo $message . "<br>";
                            endforeach;
                        endif;?>
                        </span>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right" for="nama">Nama</label>
                        </div>
                        <div class="col-xs-10 col-sm-6 col-md-6">
                            <input type="text" name="nama" id="nama" value="<?php echo set_value("nama",$profile['nama']); ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right" for="kelas">Kelas</label>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <input type="text" name="kelas" id="kelas" value="<?php echo set_value("kelas",$profile['kelas']); ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right" for="hp">No HP</label>
                        </div>
                        <div class="col-xs-10 col-sm-6 col-md-6">
                            <input type="text" name="hp" id="hp" value="<?php echo set_value("hp",$profile['hp']); ?>" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                            <span class="pesanSalah"><?php echo form_error('hp');?></span>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right" for="email">Email</label>
                        </div>
                        <div class="col-xs-10 col-sm-6 col-md-6">
                            <input type="text" name="email" id="email" value="<?php echo set_value("email",$profile['email']); ?>" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                            <span class="pesanSalah"><?php echo form_error('email');?></span>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right" for="alergi">Alergi Makanan</label>
                        </div>
                        <div class="col-xs-10 col-sm-6 col-md-6">
                            <input type="text" name="alergi" id="alergi" value="<?php echo set_value("alergi",$profile['alergi']); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right">Vegetarian</label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label><input type="radio" name="vegetarian" value="TIDAK" <?php echo $profile['vegetarian'] == 'TIDAK' ? 'checked' : ''; echo set_radio('vegetarian','TIDAK'); ?>> Tidak </label>
                            <label><input type="radio" name="vegetarian" value="YA" <?php echo $profile['vegetarian'] == 'YA' ? 'checked' : ''; echo set_radio('vegetarian','YA'); ?>> Ya </label>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-3">
                            <label class="md-right">Ukuran Baju</label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label><input type="radio" name="ukuran_baju" value="REGULAR" <?php echo $profile['ukuran_baju'] == 'REGULAR' ? 'checked' : ''; echo set_radio('ukuran_baju','REGULAR'); ?>> Regular </label>
                            <label><input type="radio" name="ukuran_baju" value="BIG" <?php echo $profile['ukuran_baju'] == 'BIG' ? 'checked' : ''; echo set_radio('ukuran_baju','BIG'); ?>> Big </label>
                        
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <input class="btn btn-ilpc" type="submit" name="editProfile" value="Simpan"/>
                        </div>
                    </div>
                </section>

            </form>
        </div>
    </div>
</div>
</div>
