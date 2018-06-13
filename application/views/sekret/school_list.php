<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/28/2015
 * Time: 7:20 PM
 */
?>

    <div class="row">
        <div class="col-xs-12">
            <h1>Daftar Sekolah</h1>
            <div class="row">
                <?php if(isset($searchKeyword)) : ?>
                    <div class="col-xs-12 col-sm-8">
                        <div>
                            Menampilkan sekolah dengan keyword <b><?php echo $searchKeyword; ?></b>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-2">
                        <form method="get" action="<?php echo base_url(); ?>admin/sekretariat/reset_search_school">
                            <input type="submit" value="Reset Search" name="resetSearch" class="btn btn-ilpc">
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-xs-7 col-md-3">
                    <a href="#addSchool" data-toggle="modal" data-target="#myModal" class="btn btn-ilpc">Add New</a>
                </div>
            </div>
            <div class="row">
                    <form action="<?php echo site_url('admin/sekretariat/school_list'); ?>" method="post">
                        <div class="col-xs-8 col-sm-3"><input type="search" name="cari" placeholder="Search Keyword..." class="form-control"></div>
                        <div class="col-xs-4 col-sm-2"><input type="submit" name="btn" value="Search" class = "btn btn-ilpc"></div>
                    </form>
            </div>
            
            <?php
            if (isset($_SESSION['pesan']))
            {
                echo "<div class='success-box'>" . $_SESSION['pesan'] . "</div>";
            }
            ?>
            <div class="row">
                <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
                <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : '');?></div>
            </div>
            <div class="row mytab">
                <div class="col-xs-12 col-sm-1">No</div>
                <div class="col-xs-12 col-sm-3">Nama</div>
                <div class="col-xs-12 col-sm-2">Kab/Kota</div>
                <div class="col-xs-12 col-sm-4">Address</div>
                <div class="col-xs-12 col-sm-2">Action</div>
            </div>

            <div class="row">
            <?php
            if(count($daftar_sekolah) > 0) :
                foreach ($daftar_sekolah as $row) : ?>
                    <div class="col-xs-12 databox">
                        <div class="row">
                            <div class="col-xs-2 col-sm-1"><div class="noUrut"><?php echo $no; ?></div></div>
                            <div class="col-xs-10 col-sm-3">
                                <?php echo $row['nama']; ?>
                            </div>
                            <div class="col-xs-12 col-sm-2"><?php echo $row['kab']; ?></div>
                            <div class="col-xs-12 col-sm-4"><?php echo $row['alamat']; ?></div>
                            <div class="col-xs-4 col-sm-2">
                                <a href="<?php echo base_url() . "admin/sekretariat/edit_school/" . $row['id'] ?>" class="btn btn-ilpc">EDIT</a>
                            </div>
                        </div>
                    </div>
            <?php
                    $no++;
                endforeach;
            else : ?>
                <div class="col-xs-12">
                    <div> Tim Tidak Ditemukan
                    </div>
                </div>
            <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div> <?php echo (!empty($pagerMessage) ? $pagerMessage : ''); ?></div>
                </div>
            </div>
            <div class="row">
                <nav>
                    <div style="float:right;">
                        <ul class="pagination">
                            <?php echo $paginglinks; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ><span>&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Sekolah Baru</h4>
            </div>
            <form action="<?php echo base_url(); ?>admin/sekretariat/school_list" method="post">
                <div class="modal-body">
                    <?php if (isset($error_add_school)) : ?>
                    <div style="margin:16px 0px; color:#FF0000;">Mohon isi data sesuai kriteria !</div>
                    <?php endif; ?>
                    <div class="row form-row">
                        <div class="col-sm-2 col-md-3">
                            <label>Nama Sekolah</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="schoolname" value="<?php echo set_value("schoolname", ''); ?>" class="cust-control">
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
                            <textarea name="schooladdress" rows="3" class="cust-control"><?php echo set_value("schooladdress", ''); ?></textarea>
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
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-3">
                            <?php echo form_error('cboKabupaten');?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="add_school" value="Add School" class="btn btn-ilpc">
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $jquery . $bootstrapJs; ?>
<script>
    var blink = '<?php echo base_url(); ?>';
$(function(){
    <?php if(isset($error_add_school)) : ?>
    $('#myModal').modal('show');
    <?php endif; ?>

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

    function showKabupaten(output)
    {
        $('#kabupaten').html(output);
    }
});
</script>
