<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/1/2016
 * Time: 6:26 PM
 */?>
<div class="row">
    <div class="col-xs-12">
        <br>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(). 'admin/soal'?>">Home</a></li>
            <li><a href="<?php echo base_url(). 'admin/logika'?>">Multiple Choice Contest </a></li>
        </ol>
    </div>

</div>
<div class="row">
    <div class="col-xs-12 col-md-10">
        <div class="contactbox">
            <h2 class="topTitle">Create Multiple Choice Contest</h2>
            <?php if(isset($error)) : ?>
                <div class="warn-box">
                    <?php echo $error; ?>
                </div>
                <br>
            <?php endif; ?>
            <form method="post" action="<?php echo base_url() . 'admin/logika/create_contest'?>">
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-3">
                        <label class="md-right">Nama Kontes</label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <input type="text" name="name" value="<?php echo set_value("name",''); ?>" class="cust-control">
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
                        <input type="text" name="date" value="<?php echo set_value("date",''); ?>" class="cust-control" data-field="date" readonly>
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
                        <input type="text" name="startTime" value="<?php echo set_value("startTime",''); ?>" class="cust-control" data-field="time" readonly>
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
                        <input type="text" name="endTime" value="<?php echo set_value("endTime",''); ?>" class="cust-control" data-field="time" readonly>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php echo form_error('endTime');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-7 col-sm-offset-3">
                        <input type="submit" name="createContest" value="Submit" class="btn btn-ilpc">
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
    $(function() {
        $("#dtBox").DateTimePicker({isPopup:false});
    });
</script>
