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
        <div class="pgsbox pgs-finish">
            <div class="pgs-text"><span class="title">Step 2: </span> <span class="ket">Pilih Guru <i class="fa fa-check-square finish-icon"></i></span></div>
            <div class="pgs-bar"></div>
        </div>
        <div class="pgsbox pgs-current">
            <div class="pgs-text"><span class="title">Step 3: </span> <span class="ket">Isi Data Tim</span></div>
            <div class="pgs-bar"></div> 
        </div>
    </div>
    
    <?php if (isset($errors)) : ?>
    <div class="col-sm-12" style="padding: 30px 50px 0px 50px;">
        <div class="alert alert-gagal" style="margin-bottom: -20px;">
            <p> <?php echo $errors; ?></p>
        </div>
    </div>
     <?php endif; ?>

    <div class="col-sm-12">
        <div class="petunjuk">
            <h3>Petunjuk :</h3>
            <p>Silahkan Isi Data Anggota Tim Anda</p>
        </div>
    </div>

    <section class="input-login-box">
        <form action="<?php echo base_url(); ?>index.php/registration/register" method="post" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="jum_tim" value="3">
            <h3 style="margin-bottom: 24px;">Data Tim</h3>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="team_name">Nama Tim: </label>
                    <div class="col-sm-6">
                        <input autofocus type="text" name="team_name" id="team_name" value="<?php echo set_value('team_name', ''); ?>" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <span id="team_name_available"></span>
                    </div>
                    <div class="col-sm-8">
                        <span class="pesanSalah"><?php echo form_error('team_name');?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="username">Username:</label>
                    <div class="col-sm-6">
                        <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <span id="username_available"></span>
                    </div>
                    <div class="col-sm-8">
                        <span class="pesanSalah"><?php echo form_error('username');?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password:</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" id="password" value="" class="form-control">
                    </div>
                    <div class="col-sm-8">
                        <span class="pesanSalah"><?php echo form_error('password');?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="confirm">Confirm Password:</label>
                    <div class="col-sm-6">
                        <input type="password" name="conf_password" id="conf_password" value="" class="form-control">
                    </div>
                    <div class="col-sm-8">
                        <span class="pesanSalah"><?php echo form_error('conf_password');?></span>
                    </div>
                </div>


                <h3>Data Anggota Tim</h3>
                <?php for ($i = 0; $i <= 3; $i++) : ?>
                    <div class="data-peserta">
                        <h4>
                        <?php   if($i === 3) : ?>
                            Anggota Cadangan (Opsional)
                        <?php else: ?>
                            Anggota <?php echo $i + 1 ?>
                            <?php if($i === 0) :?>
                                (Ketua Tim)
                            <?php endif; ?>
                        <?php endif; ?>
                        </h4>

                        <?php if ($i == 3) :?>
                            <div>
                                <span align="right">Beri tanda centang bila ingin mendaftarkan anggota cadangan</span>
                                <span><input type="checkbox" name="enable" id="enable"/></span>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Nama Lengkap:</label>
                            <div class="col-sm-6">
                                <input type="text" name="member_name_<?php echo $i ?>" value="<?php echo set_value("member_name_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_name"' : '' ?> class="form-control">
                            </div>
                            <div class="col-sm-8">
                                <span class="pesanSalah"><?php echo form_error('member_name_' . $i);?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Nomor HP:</label>
                            <div class="col-sm-6">
                                <input type="text" size="15" name="member_phone_<?php echo $i ?>" value="<?php echo set_value("member_phone_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_phone"' : '' ?> placeholder="081987654321" class="form-control">
                            </div>
                            <div class="col-sm-8">
                                <span class="pesanSalah"><?php echo form_error('member_phone_' . $i);?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Email:</label>
                            <div class="col-sm-6">
                                <input type="email" name="member_email_<?php echo $i ?>" value="<?php echo set_value("member_email_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_email"' : '' ?> class="form-control" placeholder="myemail@outlook.com">
                            </div>
                            <div class="col-sm-8">
                                <span class="pesanSalah"><?php echo form_error('member_email_' . $i);?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Alergi Makanan:</label>
                            <div class="col-sm-6">
                                <input type="text" size="50" name="member_allergy_<?php echo $i ?>" value="<?php echo set_value("member_allergy_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_allergy"' : '' ?> class="form-control">
                            </div>
                            <div class="col-sm-8">
                                <span class="pesanSalah"><?php echo form_error('member_allergy_' . $i);?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Vegetarian:</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    <input type="radio" name="member_vegetarian_<?php echo $i ?>" value="YA" <?php echo set_radio("member_vegetarian_" . $i . "", 'YA'); ?> <?php echo $i == 3 ? 'class="reserve_member_vegetarian"' : '' ?>> Ya
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="member_vegetarian_<?php echo $i ?>" value="TIDAK" <?php echo set_radio("member_vegetarian_" . $i . "", 'TIDAK'); ?> <?php echo $i == 3 ? 'class="reserve_member_vegetarian"' : '' ?> checked> Tidak
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Ukuran Baju:</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    <input type="radio" name="member_ukuran_baju_<?php echo $i ?>" value="REGULAR" <?php echo set_radio("member_ukuran_baju_" . $i . "", 'YA'); ?> <?php echo $i == 3 ? 'class="reserve_member_ukuran_baju"' : '' ?> checked> Regular
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="member_ukuran_baju_<?php echo $i ?>" value="BIG" <?php echo set_radio("member_ukuran_baju_" . $i . "", 'TIDAK'); ?> <?php echo $i == 3 ? 'class="reserve_member_ukuran_baju"' : '' ?>> Big
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Kelas:</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="member_grade_<?php echo $i ?>" <?php echo $i == 3 ? 'id="reserve_member_grade"' : '' ?>>
                                    <option value="X" <?php echo set_select("member_grade_" . $i . "", 'X'); ?> > X </option>
                                    <option value="XI" <?php echo set_select("member_grade_" . $i . "", 'XI'); ?> > XI </option>
                                    <option value="XII" <?php echo set_select("member_grade_" . $i . "", 'XII'); ?> > XII </option>
                                </select>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-sm-3">Foto/Scan Kartu Pelajar:</label>
                            <div class="col-sm-6">
                                <input type="file" style="margin-top:8px;" accept=".jpg,.png" name="member_student_card_<?php echo $i; ?>" <?php echo $i == 3 ? 'id="reserve_member_card"' : '' ?>>Max 500KB
                            </div>
                            <div class="col-sm-8">
                                <span class="pesanSalah">
                                    <?php if(isset($photoErrors[$i])) :
                                        echo $photoErrors[$i];
                                    endif;?>
                                </span>
                            </div>
                        </div>
                    </div><!-- End of Data peserta -->
                <?php endfor; ?>
                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
                    <input type="submit" name="btnRegister" value="REGISTER" id="register" class="btn btn-ilpc btn-login">
                </div>
            </form>
            <br><br><br>
        </section> 
    </div>
</div>
<br><br><br>

<script>
    var blink = '<?php echo base_url(); ?>';

    var enableReserved = <?php echo $enableReserved; ?>;

$(function(){
    $('#team_name').focusout(function() {
        var teamName = $(this).val();
       $.ajax({
            url: blink + 'registration/get_team_name' ,
            type: 'post',
            data:{"teamName" : teamName},
            success: notifyTeamName,
            error: function() {
                $('#team_name_available').text("Can't retrieve data");
            }
        });
    });
    $('#username').focusout(function() {
        var username = $(this).val();
        $.ajax({
            url: blink + 'registration/get_username' ,
            type: 'post',
            data:{"username" : username},
            success: notifyUsername,
            error: function() {
                $('#username_available').text("Can't retrieve data");
            }
        });
    });
    function notifyTeamName($res){
        $('#team_name_available').html($res);
    }
    function notifyUsername($res) {
        $('#username_available').html($res);
    }

    if(enableReserved) {
        $('#enable').prop('checked', true);
    }
    else {
        disableMemberReserve();
    }

    $("#enable").click(function() {
        var checked_status = this.checked;
        if(checked_status == true){
            enableMemberReserve();
        } else {
            disableMemberReserve();
        }
    });

    function enableMemberReserve(){
        $("#reserve_member_name").removeAttr('disabled');
        $("#reserve_member_phone").removeAttr('disabled');
        $("#reserve_member_email").removeAttr('disabled');
        $("#reserve_member_allergy").removeAttr('disabled');
        $(".reserve_member_vegetarian").removeAttr('disabled');
        $("#reserve_member_grade").removeAttr('disabled');
        $("#reserve_member_card").removeAttr('disabled');
    }
    function disableMemberReserve(){
        $("#reserve_member_name").attr('disabled', 'disable');
        $("#reserve_member_phone").attr('disabled', 'disable');
        $("#reserve_member_email").attr('disabled', 'disable');
        $("#reserve_member_allergy").attr('disabled', 'disable');
        $(".reserve_member_vegetarian").attr('disabled', 'disable');
        $("#reserve_member_grade").attr('disabled', 'disable');
        $("#reserve_member_card").attr('disabled', 'disable');
    }
});

</script>
