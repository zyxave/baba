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
    
    <div class="col-sm-12">
        <div class="petunjuk">
            <h3>Petunjuk :</h3>
            <p>Silahkan pilih sekolah anda. Apabila sekolah anda tidak ada, atau ada kesalahan data, mohon kirimkan data sekolah (nama sekolah, alamat, kota/kabupaten, dan provinsi) ke ilpc.ubaya@gmail.com dengan subjek 'Pendaftaran Sekolah'</p>
        </div>
    </div>

    <section class="input-login-box">
            <form action="<?php echo base_url('registration'); ?>" method="post" class="form-horizontal">
                <h2 class="text-center" style="margin-bottom: 24px;">Pilih Sekolah</h2>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="username">Provinsi:</label>
                    <div class="col-sm-8">
                        <select autofocus id="provinsi" name="cboProvinsi" class="form-control">
                            <option value="" disabled selected> Pilih Provinsi </option>
                                <?php foreach($daftarProvinsi as $provinsi) : ?>
                                <option value="<?php echo $provinsi['id'];?>">
                                    <?php echo $provinsi['nama'];?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="username">Kota / Kabupaten:</label>
                    <div class="col-sm-8">
                        <select id="kabupaten" name="cboKabupaten" class="form-control">
                            <option value="" disabled selected> Pilih Kota / Kabupaten </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="username">Nama Sekolah:</label>
                    <div class="col-sm-8">
                        <select id="sekolah" name="cboSekolah" class="form-control">
                            <option value="" disabled selected> Pilih Sekolah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="pwd">Alamat Sekolah:</label>
                    <div class="col-sm-8">
                        <p id="alamatSekolah"></p>
                    </div>
                </div>
                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
                    <input id="submitSchool" type="submit" value="NEXT" name="chooseSchool" class="btn btn-ilpc btn-login">
                </div>
            </form>
            <br><br><br>
            
        </section>

    </div>
</div>
<br><br><br>
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