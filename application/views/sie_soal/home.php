
<div class="row">
    <div class="col-sm-12">
        <div class="main-dash">
            <h3>Running Contest</h3>
             <div>
                <h3>Programming</h3>
                <?php if(count($progRunningContests) == 0) : ?>
                    <div class="contactbox">Tidak ada Kontes yang sedang berlangsung</div>
                <?php else : ?>
                    <?php foreach($progRunningContests as $contest) : ?>
                        <div class="progtbl">
                            <div class="tbl-hdr">Nama Kontes : <a href="<?php echo base_url(). 'admin/programming/contest/' . $contest['id']; ?>"><?php echo $contest['nama']; ?></a></div>
                            <div class="row no-gutter">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    Start <?php echo date('d-m-Y', strtotime($contest['tanggal'])) . " , " . $contest['jam_mulai'] . ' - ' . $contest['jam_selesai']; ?>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    Freeze Time : <?php echo $contest['waktu_freeze']; ?>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <?php if($contest['jumlah_soal'] == 0) : ?>
                                        <div class="red">Kontes Ini Belum Memiliki Soal</div>
                                    <?php else : ?>
                                        Jumlah Soal = <?php echo $contest['jumlah_soal'];?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-1">
                                    <a href="<?php echo base_url(). 'admin/programming/contest/' . $contest['id']; ?>" class="btn btn-ilpc">Detail</a>
                                </div>
                            </div>

                        </div>
                    <?php endforeach;
                endif;?>
                <h3>Logika</h3>
                <?php if(count($logikaRunningContests) == 0) : ?>
                    <div class="contactbox">Tidak ada Kontes yang sedang berlangsung</div>
                <?php else : ?>
                    <?php foreach($logikaRunningContests as $contest) : ?>
                        <div class="progtbl">
                            <div class="tbl-hdr">Nama Kontes : <a href="<?php echo base_url(). 'admin/logika/contest/' . $contest['id']; ?>"><?php echo $contest['nama']; ?></a></div>
                            <div class="row no-gutter">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    Start <?php echo date('d-m-Y', strtotime($contest['tanggal'])) . " , " . $contest['jam_mulai'] . ' - ' . $contest['jam_selesai']; ?>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <?php if($contest['jml_soal'] == 0) : ?>
                                        <div class="red">Kontes Ini Belum Memiliki Soal</div>
                                    <?php else : ?>
                                        Jumlah Soal = <?php echo $contest['jml_soal'];?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-1">
                                    <a href="<?php echo base_url(). 'admin/logika/contest/' . $contest['id']; ?>" class="btn btn-ilpc">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                endif;?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="main-dash">
            <h3>Upcoming Contest</h3>
            <div>

            </div>
        </div>
    </div>
</div>
<div id="dtBox"></div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
<script>
$(function(){

});
</script>
