<?php
/**
 * @author: CWR, Peter Santoso
 * Date: 24/09/2015
 * Time: 15:28
 */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1>Pendaftaran ILPC 2018</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
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
    </div>
</div>
<div class="wrapper-md">
    <div class="container-fluid">
        <?php if (isset($errors)) : ?>
            <div class="warn-box">
                <p> <?php echo $errors; ?></p>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="petunjuk">
                    <h3>Petunjuk :</h3>
                    <p>Silahkan Isi Data Anggota Tim Anda</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <div class="pengisianData">
                    <form action="<?php echo base_url(); ?>index.php/registration/register" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="jum_tim" value="3">
                        <section class="mybox">
                            <h3>Data Tim</h3>
                            <div class="row form-row">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="md-right">Nama Tim</label>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <input autofocus type="text" name="team_name" id="team_name" value="<?php echo set_value('team_name', ''); ?>" class="cust-control">
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <span id="team_name_available"></span>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                    <span class="pesanSalah"><?php echo form_error('team_name');?></span>
                                </div>
                            </div>

                            <div class="row form-row">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="md-right">Username</label>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="cust-control">
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <span id="username_available"></span>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                    <span class="pesanSalah"><?php echo form_error('username');?></span>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="md-right">Password</label>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <input type="password" name="password" id="password" value="" class="cust-control">
                                </div>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                <span class="pesanSalah"><?php echo form_error('password');?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="md-right">Confirm Password</label>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <input type="password" name="conf_password" id="conf_password" value="" class="cust-control">
                                </div>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                    <span class="pesanSalah"><?php echo form_error('conf_password');?></span>
                                </div>
                            </div>

                        </section>

                        <section class="mybox">
                            <h3>Data Anggota Tim</h3>
                            <?php for ($i = 0; $i <= 3; $i++) : ?>
                                <div class="contactbox">
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

                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Nama Lengkap</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="text" name="member_name_<?php echo $i ?>" value="<?php echo set_value("member_name_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_name"' : '' ?> class="cust-control">
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                            <span class="pesanSalah"><?php echo form_error('member_name_' . $i);?></span>
                                        </div>
                                    </div>

                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Nomor HP</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="text" size="15" name="member_phone_<?php echo $i ?>" value="<?php echo set_value("member_phone_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_phone"' : '' ?> placeholder="081987654321" class="cust-control">
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                            <span class="pesanSalah"><?php echo form_error('member_phone_' . $i);?></span>
                                        </div>
                                    </div>

                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Email</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="email" name="member_email_<?php echo $i ?>" value="<?php echo set_value("member_email_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_email"' : '' ?> class="cust-control" placeholder="myemail@outlook.com">
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                            <span class="pesanSalah"><?php echo form_error('member_email_' . $i);?></span>
                                        </div>
                                    </div>

                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Alergi Makanan</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="text" size="50" name="member_allergy_<?php echo $i ?>" value="<?php echo set_value("member_allergy_" . $i . "", ''); ?>" <?php echo $i == 3 ? 'id="reserve_member_allergy"' : '' ?> class="cust-control">
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                            <span class="pesanSalah"><?php echo form_error('member_allergy_' . $i);?></span>
                                        </div>
                                    </div>

                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Vegetarian</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="radio" name="member_vegetarian_<?php echo $i ?>" value="YA" <?php echo set_radio("member_vegetarian_" . $i . "", 'YA'); ?> <?php echo $i == 3 ? 'class="reserve_member_vegetarian"' : '' ?>> Ya
                                            <input type="radio" name="member_vegetarian_<?php echo $i ?>" value="TIDAK" <?php echo set_radio("member_vegetarian_" . $i . "", 'TIDAK'); ?> <?php echo $i == 3 ? 'class="reserve_member_vegetarian"' : '' ?> checked> Tidak
                                        </div>
                                    </div>

                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Ukuran Baju</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="radio" name="member_ukuran_baju_<?php echo $i ?>" value="REGULAR" <?php echo set_radio("member_ukuran_baju_" . $i . "", 'YA'); ?> <?php echo $i == 3 ? 'class="reserve_member_ukuran_baju"' : '' ?> checked> Regular
                                            <input type="radio" name="member_ukuran_baju_<?php echo $i ?>" value="BIG" <?php echo set_radio("member_ukuran_baju_" . $i . "", 'TIDAK'); ?> <?php echo $i == 3 ? 'class="reserve_member_ukuran_baju"' : '' ?> > Big
                                        </div>
                                    </div>


                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Kelas</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                        <select name="member_grade_<?php echo $i ?>" <?php echo $i == 3 ? 'id="reserve_member_grade"' : '' ?>>
                                            <option value="X" <?php echo set_select("member_grade_" . $i . "", 'X'); ?> > X </option>
                                            <option value="XI" <?php echo set_select("member_grade_" . $i . "", 'XI'); ?> > XI </option>
                                            <option value="XII" <?php echo set_select("member_grade_" . $i . "", 'XII'); ?> > XII </option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-xs-12 col-sm-3">
                                            <label class="md-right">Foto/Scan Kartu Pelajar</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                        <input type="file" accept=".jpg,.png" name="member_student_card_<?php echo $i; ?>" <?php echo $i == 3 ? 'id="reserve_member_card"' : '' ?>>Max 500KB
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                                            <span class="pesanSalah">
                                            <?php if(isset($photoErrors[$i])) :
                                                echo $photoErrors[$i];
                                            endif;?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </section>

                        <div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                                    <input class="btn btn-ilpc" type="submit" name="btnRegister" value="Register" id="register"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php //echo $enableReserved . "<br>"; ?>
    </div>
</div>

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