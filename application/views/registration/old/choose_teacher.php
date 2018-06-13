<?php
/**
 * @author: CWR
 * Date: 24/09/2015
 * Time: 14:26
 */
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1>Pendaftaran ILPC 2016</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
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
    </div>
</div>
<div class="wrapper-md">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="petunjuk">
                    <h3>Petunjuk :</h3>
                    <?php if(empty($teachers)):?>
                        <p>Tidak ada guru sekolah anda yang terdaftar sebelumnya. Daftarkan guru anda <a href="#registerTeacher" data-toggle="modal" data-target="#myModal">disini</a></p>
                    <?php else: ?>
                        <p>Pilih salah satu guru pendamping anda pada daftar guru dibawah ini.</p>
                        <p> Apabila nama guru anda tidak ada, daftarkan guru anda <a href="#registerTeacher" data-toggle="modal" data-target="#myModal">disini</a> . Apabila ada kesalahan penulisan nama, email, ataupun nomor handphone guru anda, silahkan hubungi panitia ILPC 2016. </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-md-6 col-md-offset-3">
            <?php if(!empty($teachers)): ?>
                <div class="pengisianData">
                <script>
                    var teachers = <?php echo json_encode($teachers);?>;
                </script>
                <form action="<?php echo base_url() . 'registration'?>" method="post" class="rgstr-box">
                    <h3>Guru Pendamping</h3>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Nama Guru</label>
                            </div>
                            <div class="col-sm-12">
                                <div>
                                    <select autofocus id="guru" name="cboGuru" class="cbo-full cust-control">
                                        <option value="" disabled selected> Pilih Guru </option>
                                        <?php foreach($teachers as $teacher) : ?>
                                            <option value="<?php echo $teacher['kode'];?>">
                                                <?php echo $teacher['nama'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Email</label>
                            </div>
                            <div class="col-sm-12">
                                <p id="email"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Nomor Handphone</label>
                            </div>
                            <div class="col-sm-12">
                                <p id="handphone"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit" value="Next" name="chooseTeacher" id="submitTeacher" class="btn btn-ilpc">
                        </div>
                    </div>
                </form>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ><span>&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pendaftaran Guru Pendamping</h4>
            </div>
            <form action="<?php echo base_url() ?>/registration/register_teacher" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="container-fluid">
                    <?php //if(isset($_SESSION['errors'])) : ?>
                    <?php //var_dump($_SESSION['errors']); endif;?>
                    <div class="row form-row">
                        <div class="col-sm-2 col-md-3">
                            <label>Nama</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="teachername" value="<?php echo set_value("teachername", ''); ?>" class="cust-control">
                        </div>
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                            <?php echo form_error('teachername');?>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-sm-2 col-md-3">
                            <label>No. Handphone</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="teachertelp" value="<?php echo set_value("teachertelp", ""); ?>" class="cust-control" placeholder="081987654321">
                        </div>
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                            <?php echo form_error('teachertelp');?>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-sm-2 col-md-3">
                            <label>Email</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="teacheremail" value="<?php echo set_value("teacheremail", ''); ?>" class="cust-control" placeholder="emailguru@outlook.com">
                        </div>
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                            <?php echo form_error('teacheremail');?>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-sm-2 col-md-3">
                            <label>Alamat</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="teacheraddress" rows="3" class="cust-control"><?php echo set_value("teacheraddress", ''); ?></textarea>
                        </div>
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                            <?php echo form_error('teacheraddress');?>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-sm-2 col-md-3">
                            <label>Alergi Makanan</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="teacherallergy" value="<?php echo set_value("teacherallergy", ''); ?>" class="cust-control">
                        </div>
                        <div class="col-sm-12 col-md-8 col-md-offset-3">
                            Kosongi bila tidak ada alergi makanan
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-md-3">
                            <label>Vegetarian</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="radio" name="vegetarian" value="YA" <?php echo set_radio('vegetarian', 'YA'); ?>> Ya
                            <input type="radio" name="vegetarian" value="TIDAK" <?php echo set_radio('vegetarian', 'TIDAK'); ?> checked> Tidak
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-md-3">
                            <label>Captcha</label>
                        </div>
                        <div class="col-sm-8">

                        <div class="g-recaptcha" data-sitekey="6Lci3gcUAAAAAI1dRid0es4GIf7q4FWSQd0KVvXB"></div>  
                                       <p ></p>

                        </div>
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                            <?php echo form_error('captchaerror');?>
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