<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="row">
    <div class="login-box col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
    <section class="header-ilpc">
        <a href="<?php echo base_url('home'); ?>">
            <img class="img-responsive center-block" src="<?php echo base_url('asset/2018/img/ILPC-2018.png'); ?>" width="700px">
        </a>
    </section>

    <div class="col-sm-12">
        <h1 class="text-center">Pendaftaran ILPC 2018</h1>
    </div>

    <div class="proses col-sm-12">
        <div class="pgsbox pgs-finish">
            <div class="pgs-text"><span class="title">Step 1: </span> <span class="ket">Pilih Sekolah <i class="fa fa-check-square finish-icon"></i></span></div>
            <div class="pgs-bar"></div>
        </div>
        <div class="pgsbox pgs-current">
            <div class="pgs-text"><span class="title">Step 2: </span> <span class="ket">Pilih Guru</span></div>
            <div class="pgs-bar"></div>
        </div>
        <div class="pgsbox">
            <div class="pgs-text"><span class="title">Step 3: </span> <span class="ket">Isi Data Tim</span></div>
            <div class="pgs-bar"></div>
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="petunjuk">
            <h3>Petunjuk :</h3>
            <?php if(empty($teachers)):?>
                <p>Tidak ada guru sekolah anda yang terdaftar sebelumnya. Daftarkan guru anda <a href="#registerTeacher" data-toggle="modal" data-target="#myModal">disini</a></p>
            <?php else: ?>
                <p>Pilih salah satu guru pendamping anda pada daftar guru dibawah ini.</p>
                <p> Apabila nama guru anda tidak ada, <b>daftarkan guru anda</b> <a href="#registerTeacher" data-toggle="modal" data-target="#myModal">disini</a> . Apabila ada kesalahan penulisan nama, email, ataupun nomor handphone guru anda, silahkan hubungi panitia ILPC 2018. </p>
            <?php endif; ?>
        </div>
    </div>

    <section class="input-login-box">
        <?php if(!empty($teachers)): ?>
            <script>
                var teachers = <?php echo json_encode($teachers);?>;
            </script>
            <form action="<?php echo base_url('registration'); ?>" method="post" class="form-horizontal">
                <h2 class="text-center" style="margin-bottom: 24px;">Guru Pendamping</h2>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="username">Guru:</label>
                    <div class="col-sm-8">
                        <select autofocus id="guru" name="cboGuru" class="form-control">
                            <option value="" disabled selected> Pilih Guru </option>
                                <?php foreach($teachers as $teacher) : ?>
                                    <option value="<?php echo $teacher['kode'];?>">
                                        <?php echo $teacher['nama'];?>
                                    </option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="username">Email:</label>
                    <div class="col-sm-8">
                        <p id="email"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="username">Nomor Handphone:</label>
                    <div class="col-sm-8">
                        <p id="handphone"></p>
                    </div>
                </div>

                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
                    <input id="submitTeacher" type="submit" value="NEXT" name="chooseTeacher" class="btn btn-ilpc btn-login">
                </div>
            </form>
            
            <?php endif; ?>
            <br><br><br>
        </section> 
    </div>
</div>
<br><br><br>

    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ><span>&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pendaftaran Guru Pendamping</h4>
            </div>
            <form action="<?php echo base_url() ?>/registration/register_teacher" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
                <div class="container-fluid">
                    <?php //if(isset($_SESSION['errors'])) : ?>
                    <?php //var_dump($_SESSION['errors']); endif;?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Nama">Nama:</label>
                        <div class="col-sm-10">
                            <input type="text" name="teachername" value="<?php echo set_value("teachername", ''); ?>" class="form-control">
                        </div>
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo form_error('teachername');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="HP">Nomor Handphone:</label>
                        <div class="col-sm-10">
                            <input type="text" name="teachertelp" value="<?php echo set_value("teachertelp", ""); ?>" class="form-control" placeholder="081987654321">
                        </div>
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo form_error('teachertelp');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="teacheremail" value="<?php echo set_value("teacheremail", ''); ?>" class="form-control" placeholder="emailguru@outlook.com">
                        </div>
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo form_error('teacheremail');?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="alamat">Alamat:</label>
                        <div class="col-sm-10">
                            <textarea name="teacheraddress" rows="3" class="form-control"><?php echo set_value("teacheraddress", ''); ?></textarea>
                        </div>
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo form_error('teacheraddress');?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="alergi">Alergi Makanan:</label>
                        <div class="col-sm-10">
                            <input type="text" name="teacherallergy" value="<?php echo set_value("teacherallergy", ''); ?>" class="form-control">
                        </div>
                        <div class="col-sm-10">
                            <span style="color: #8e8e8e; text-decoration: italic;">Kosongi bila tidak ada alergi makanan</span>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="vegetarian">Vegetarian:</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="vegetarian" value="YA" <?php echo set_radio('vegetarian', 'YA'); ?>> Ya
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="vegetarian" value="TIDAK" <?php echo set_radio('vegetarian', 'TIDAK'); ?> checked> Tidak
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="captcha">Captcha:</label>
                        <div class="col-sm-10">
                            <div class="g-recaptcha" data-sitekey="6LdySAkUAAAAAMvGzKkO1SXFKDKjmunzp-w1UQig" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div> 
                        </div>
                        <div class="col-sm-10">
                            <span class="pesanSalah"><?php echo form_error('captchaerror');?></span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="add_teacher" value="Daftar" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>

<script>

$(function(){
    $('#submitTeacher').prop('disabled',true);
    $('#guru').change(function() {
        $('#submitTeacher').prop('disabled',false);
        var selectedTeacher = $(this).val();
        var idx = $(this).prop('selectedIndex')-1;
        $('#email').html( teachers[idx].email);
        $('#handphone').html( teachers[idx].telp);
    });
    <?php //if(isset($_SESSION['addTeacherError'])) : ?>
    <?php if(isset($error)) : ?>
        $('#myModal').modal('show');
    <?php endif;
        unset($_SESSION['errors']);
        unset($_SESSION['addTeacherError']);
    ?>
});
</script>