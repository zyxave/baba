<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/1/2016
 * Time: 7:24 PM
 */
?>
<div class="row normal-nogutter">
    <div class="col-xs-12">
        <div class="progNavbar">
            <div class="row no-gutter">
                <div class="col-xs-12">
                    <h2>Contest Name : <?php echo $contest['nama']; ?></h2>
                </div>
            </div>
            <div class="row no-gutter">
                <div class="col-xs-12">
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/contest/' . $contest['id'] ?>" class="cur">Info</a>
                    </div>
                    <!--<div class="proglink">
                        <a href="<?php /*echo base_url(). 'admin/logika/submission/' . $contest['id'] */?>">Submission</a>
                    </div>-->
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/clarification/' . $contest['id'] ?>">Clarification</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/problems/' . $contest['id'] ?>">Soal</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/score/' . $contest['id'] ?>">Score</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/team_list/' . $contest['id'] ?>">Team List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php if(isset($_SESSION['contestCreated'])) : ?>
            <div class="success-box">
                Kontes berhasil dibuat. Silahkan Masukkan Soal untuk Kontes Ini Agar Dapat Diikuti Oleh Peserta <i class="fa fa-info-circle red"></i>
            </div>
        <?php elseif(isset($_SESSION['contestUpdated'])): ?>
            <div class="success-box">Contest has been updated</div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-10">
        <div class="contactbox">
            <h2 class="topTitle">Contest Info</h2>
            <form method="post" action="<?php echo base_url() . 'admin/logika/edit_contest'?>">
                <input type="hidden" name="id" value="<?php echo $contest['id']; ?>">
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <a class="btn btn-ilpc" id="edit"><i class="fa fa-pencil"></i> EDIT</a>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <a class="btn btn-ilpc" id="cancel"><i class="fa fa-times-circle"></i> Cancel</a>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Nama Kontes</label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <input type="text" name="name" value="<?php echo set_value("name", $contest['nama']); ?>" class="cust-control" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('name');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Tanggal</label>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <input type="text" name="date" value="<?php echo set_value("date",date('d-m-Y', strtotime($contest['tanggal']))); ?>" class="cust-control" data-field="date" readonly disabled>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('date');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Waktu Mulai</label>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <input type="text" name="startTime" value="<?php echo set_value("startTime",$contest['jam_mulai']); ?>" class="cust-control" data-field="time" readonly disabled>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('startTime');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Waktu Selesai</label>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <input type="text" name="endTime" value="<?php echo set_value("endTime",$contest['jam_selesai']); ?>" class="cust-control" data-field="time" readonly disabled>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('endTime');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Jumlah Soal</label>
                    </div>
                    <?php if($contest['jumlah_soal'] == 0) : ?>
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="red">Belum Ada Soal untuk Kontes Ini !!</div>
                        <?php else : ?>
                        <div class="col-xs-12 col-sm-2">
                            <span class="cust-control"><?php echo $contest['jumlah_soal']; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2">
                            <a href="<?php echo base_url() . 'admin/logika/new_problem/' . $contest['id']; ?>" class="btn btn-ilpc">Tambah Soal</a>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-xs-12 col-sm-7 col-sm-offset-3">
                            <input type="submit" name="editContest" value="Save Edit" class="btn btn-ilpc" disabled>
                        </div>
                    </div>
            </form>
        </div>

    </div>
</div>
<div id="dtBox"></div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
<script>
    $(function(){
        $("#dtBox").DateTimePicker({isPopup:false});
        $('#cancel').hide();
        <?php if(validation_errors() != false) : ?>
        showCancel();
        <?php endif; ?>
        $('#edit').click(function(e){
            e.preventDefault();
            showCancel();
        });
        $('#cancel').click(function(e){
            e.preventDefault();
            showEdit();
        });

        function showCancel(){
            $('input[type="text"]').prop('disabled',false);
            $('input[type="submit"]').prop('disabled',false);
            $('#cancel').show();
            $('#edit').attr('disabled',true);
        }

        function showEdit(){
            $('input[type="text"]').prop('disabled',true);
            $('input[type="submit"]').prop('disabled',true);
            $('#cancel').hide();
            $('#edit').attr('disabled',false);
        }
        //$('#submitSchool').prop('disabled',false);
    });
</script>
