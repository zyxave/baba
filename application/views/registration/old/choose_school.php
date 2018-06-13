<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 24/09/2015
 * Time: 12:58
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1>Pendaftaran ILPC 2016</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="pgsbox pgs-current">
                <div class="pgs-text"><span class="title">Step 1: </span> <span class="ket">Pilih Sekolah</span></div>
                <div class="pgs-bar"></div>
            </div>
            <div class="pgsbox">
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
                    <p>Silahkan pilih sekolah anda. Apabila sekolah anda tidak ada, atau ada kesalahan data, mohon kirimkan data sekolah ( nama sekolah, alamat, kota/kabupaten, dan provinsi) ke ilpc.ubaya@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-md-6 col-md-offset-3">
                <div class="pengisianData">
                <form action="<?php echo base_url() . 'registration'?>" method="post" class="rgstr-box">
                    <h3>Sekolah</h3>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Provinsi</label>
                            </div>
                            <div class="col-sm-12">
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
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-sm-12">
                                <label> Kota / Kabupaten </label>
                                <div>
                                    <select id="kabupaten" name="cboKabupaten" class="cbo-full cust-control">
                                        <option value="" disabled selected> Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Nama Sekolah</label>
                            </div>
                            <div class="col-sm-12">
                                <div>
                                    <select id="sekolah" name="cboSekolah" class="cbo-full cust-control">
                                        <option value="" disabled selected> Pilih Sekolah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Alamat Sekolah</label>
                            </div>
                            <div class="col-sm-12">
                                <p id="alamatSekolah">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-xs-12">
                                <input id="submitSchool" type="submit" value="Next" name="chooseSchool" class="btn btn-ilpc">

                            </div>
                        </div>
                    </div>
                    <?php
                    /* for csrf protection. pending dulu
                     * <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" >*/
                    ?>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var blink = '<?php echo base_url(); ?>';
    $(function(){
        $('#submitSchool').prop('disabled',true);
        $('#provinsi').change(function() {
            var selectedProvince = $(this).val();
            $.ajax({
                url: blink + 'registration/kabupaten/' + selectedProvince ,
                success: showKabupaten,
                error: function() {
                    $('#kabupaten option').text("Can't retrieve data");
                }
            });
            $('#sekolah').html('<option value="" disabled selected> Pilih Sekolah</option>');
            clearAlamat();
        });
        $('#kabupaten').change(function() {
            var selectedKab = $(this).val();
            $.ajax({
                url: blink + 'registration/sekolah/' + selectedKab ,
                success: showSekolah,
                error: function() {
                    $('#sekolah option').text("Can't retrieve data");
                }
            });
            clearAlamat();
        });
        $('#sekolah').change(function() {
            $('#submitSchool').prop('disabled',false);
            var selectedSchool = $(this).val();
            var idx = $(this).prop('selectedIndex')-1;
            $('#alamatSekolah').html( schools[idx].alamat);
        });
        function showKabupaten($output)
        {
            /*var result = $.parseJSON($output);
             for(x in result.daftarKab) {
             alert((x).id);
             }*/
            $('#kabupaten').html($output);
        }

        function showSekolah($output)
        {
            $('#sekolah').html($output);
        }
        function clearAlamat() {
            $('#alamatSekolah').html("");
        }

    });
</script>
<script src="<?php //echo base_url() . 'asset/2016/js/teamregistration.js'?>"></script>

