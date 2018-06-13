<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 12/31/2015
 * Time: 10:20 PM
 */?>
<div class="row">
    <div class="col-xs-12">
        <h1>Multiple Choice Contest</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="<?php echo base_url() . 'admin/logika/new_contest'?>" class="btn btn-ilpc"><i class="fa fa-plus"></i> New Contest</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h3>Running Contests</h3>
        <?php if(count($runningContests) == 0) : ?>
            <div class="contactbox">Tidak ada Kontes yang sedang berlangsung</div>
        <?php else : ?>
            <?php foreach($runningContests as $contest) : ?>
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
<div class="row">
    <div class="col-xs-12">
        <h3>Upcoming Contests</h3>
        <?php if(count($upcomingContests) == 0) : ?>
            <div class="contactbox">Tidak ada Kontes yang dijadwalkan</div>
        <?php else : ?>
            <?php foreach($upcomingContests as $contest) : ?>
                <div class="progtbl">
                    <div class="tbl-hdr">Nama Kontes : <a href="<?php echo base_url(). 'admin/logika/contest/' . $contest['id']; ?>"><?php echo $contest['nama']; ?></a></div>
                    <div class="row">
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
<div class="row">
    <div class="col-xs-12">
        <h3>Finished Contests</h3>
        <?php if(count($finishedContests) == 0) : ?>
            <div class="contactbox">Tidak ada Kontes yang Sudah Selesai</div>
        <?php else : ?>
            <?php foreach($finishedContests as $contest) : ?>
                <div class="progtbl">
                    <div class="tbl-hdr">Nama Kontes : <a href="<?php echo base_url(). 'admin/logika/contest/' . $contest['id']; ?>"><?php echo $contest['nama']; ?></a></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            Start <?php echo $contest['tanggal'] . " , " . $contest['jam_mulai'] . ' - ' . $contest['jam_selesai']; ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            Jumlah Soal = <?php echo $contest['jml_soal'];?>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;?>
    </div>
</div>

<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
<script></script>
