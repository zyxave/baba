<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 22/12/2015
 * Time: 15:29
 */?>
 <div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <section class="contactbox memberbox">
            <h4> Tambah Member Cadangan </h4>

            <form method="post" action="" enctype="multipart/form-data">
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Nama</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="text" name="name" value="<?php echo set_value("name",''); ?>" class="cust-control">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('name');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Nomor HP</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="text" size="15" name="phone" value="<?php echo set_value("phone",''); ?>"  placeholder="081987654321" class="cust-control">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('phone');?></span>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Email</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="email" name="email" value="<?php echo set_value("email", ''); ?>" class="cust-control" placeholder="myemail@outlook.com">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('email');?></span>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Alergi Makanan</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="text" size="50" name="allergy" value="<?php echo set_value("allergy", ''); ?>" class="cust-control" >
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('allergy');?></span>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Vegetarian</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="radio" name="vegetarian" value="YA" <?php echo set_radio("vegetarian" , 'YA'); ?>> Ya
                        <input type="radio" name="vegetarian" value="TIDAK" <?php echo set_radio("vegetarian", 'TIDAK'); ?> checked> Tidak
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                    <label class="md-right">Ukurab Baju</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="radio" name="ukuran_baju" value="REGULAR" <?php echo set_radio("ukuran_baju" , 'REGULAR'); ?> checked> REGULAR
                        <input type="radio" name="ukuran_baju" value="BIG" <?php echo set_radio("ukuran_baju", 'BIG'); ?>> BIG
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Kelas</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <select name="grade">
                            <option value="X" <?php echo set_select("grade", 'X'); ?> > X </option>
                            <option value="XI" <?php echo set_select("grade" , 'XI'); ?> > XI </option>
                            <option value="XII" <?php echo set_select("grade" , 'XII'); ?> > XII </option>
                        </select>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Foto/Scan Kartu Pelajar</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="file" accept=".jpg,.png" name="student_card">Max 500KB (format jpg/png)
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
                        <div class="col-xs-12 col-sm-3 col-sm-offset-6">
                            <input type="submit" name="addReserve" value="Simpan" class="btn btn-ilpc">
                        </div>
                    </div>
                </form>

            </section>
        </div>
    </div>
    <?php echo $jquery . $bootstrapJs; ?>
