<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 10/27/2015
 * Time: 7:55 PM
 */
?>
<h3>Edit School</h3>
<div class="row">
    <div class="col-xs-12">
        <div class="adminTopNav">
            <div class="row">
                <div class="col-xs-4 col-sm-2">
                    <a href="<?php echo base_url() ?>admin/sekretariat/school_list/" class="btn btn-ilpc"><span class="fa fa-arrow-left fa-lg"></span> Back</a>
                </div>
            </div>
        </div>
        <?php if(isset($error_edit_school)) : ?>
            <div class="warn-box">
                Gagal ubah data sekolah. Pastikan Data Diisi dengan benar.
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="r-box">
            <form action="<?php echo base_url() ?>admin/sekretariat/edit_school/<?php echo $sekolah['id'] ?>"
                  method="post">
                <div class="row form-row">
                    <div class="col-sm-2 col-md-3">
                        <label>Nama Sekolah</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="schoolname" value="<?php echo set_value("schoolname", $sekolah['nama']); ?>" class="cust-control">
                    </div>
                    <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                        <?php echo form_error('schoolname');?>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-2 col-md-3">
                        <label>Alamat</label>
                    </div>
                    <div class="col-sm-8">
                        <textarea name="schooladdress" rows="3" class="cust-control"><?php echo set_value("schooladdress", $sekolah['alamat']); ?></textarea>
                    </div>
                    <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                        <?php echo form_error('schooladdress');?>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-2 col-md-3">
                        <label>Provinsi</label>
                    </div>
                    <div class="col-sm-8">
                        <div>
                            <select autofocus id="provinsi" name="cboProvinsi" class="cbo-full cust-control">
                                <option value="" disabled selected> Pilih Provinsi </option>
                                <?php foreach($daftarProvinsi as $provinsi) : ?>
                                    <option value="<?php echo $provinsi['id'];?>">
                                        <?php echo $provinsi['nama'];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                        <?php echo form_error('cboProvinsi');?>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-2 col-md-3">
                        <label> Kota / Kabupaten </label>
                    </div>
                    <div class="col-sm-8">
                        <div>
                            <select id="kabupaten" name="cboKabupaten" class="cbo-full cust-control">
                                <option value="" disabled selected> Pilih Kabupaten/Kota</option>
                                <?php foreach($daftarKabupaten as $kabupaten) : ?>
                                    <option value="<?php echo $kabupaten['id'];?>">
                                        <?php echo $kabupaten['nama'];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                        <?php echo form_error('cboKabupaten');?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-md-8 col-md-offset-3"><input class="btn btn-ilpc"type="submit" name="edit_school" value="Edit"/></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $jquery . $bootstrapJs; ?>
<script>
    var blink = '<?php echo base_url(); ?>';
    var prov = '<?php echo $sekolah['id_prov']; ?>';
    var kab = '<?php echo $sekolah['id_kab'];?>';
    $(function(){
        $('#provinsi').val(prov);
        $('#kabupaten').val(kab);

        $('#provinsi').change(function() {
            var selectedProvince = $(this).val();
            $.ajax({
                url: blink + 'registration/kabupaten/' + selectedProvince ,
                success: showKabupaten,
                error: function() {
                    $('#kabupaten option').text("Can't retrieve data");
                }
            });
        });
        function showKabupaten($output)
        {
            $('#kabupaten').html($output);
        }
    });
</script>


