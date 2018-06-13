<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/1/2016
 * Time: 9:01 PM
 */?>
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
                        <a href="<?php echo base_url(). 'admin/logika/contest/' . $contest['id'] ?>">Info</a>
                    </div>
                    <!--<div class="proglink">
                        <a href="<?php /*echo base_url(). 'admin/logika/submission/' . $contest['id'] */?>">Submission</a>
                    </div>-->
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/clarification/' . $contest['id'] ?>">Clarification</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/problems/' . $contest['id'] ?>" class="cur">Soal</a>
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
        <h1 style="text-align: center">Daftar Soal</h1>
    </div>
</div>
<?php if(isset($_SESSION['problemCreated'])) : ?>
<div class="row">
    <div class="col-xs-12">
        <div class="success-box"> Soal berhasil dibuat </div><br>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-xs-6 col-sm-3 col-md-2 col-sm-offset-1">
            <a href="<?php echo base_url() . 'admin/logika/new_problem/'. $contest['id']; ?>" class="btn btn-ilpc"><i class="fa fa-plus"></i> Tambah Soal</a>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2 col-sm-offset-1">
            <a href="<?php echo base_url() . 'admin/logika/see_all_problem/'. $contest['id']; ?>" class="btn btn-ilpc" target="_blank"> See All Soal</a>
        </div>
    </div>
    <?php if(count($problemSet) > 0) : ?>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <?php /*<div class="progtbl-head">
        <div class="row no-gutter">
            <div class="col-xs-12 col-sm-8 col-md-6 progtbl-th">Nama Soal</div>
            <div class="col-xs-12 col-sm-4 col-md-3 progtbl-th">Author</div>
        </div>
    </div> */ ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Jawaban</th>
                            <th colspan="2">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($problemSet as $soal) : ?>
                            <tr>
                                <td><a href="<?php echo base_url(). 'admin/logika/see_problem/' . $soal['id']; ?>"><?php echo $soal['nomor']?></a></td>
                                <td><?php echo $soal['jawaban'];?></td>
                                <td><a href="<?php echo base_url(). 'admin/logika/edit_problem/' . $soal['id'];?>" class="btn btn-ilpc">Edit</a></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="contactbox">Belum Ada Soal Untuk Kontes Ini</div>
            </div>
        </div>
    <?php endif; ?>


    <?php //load file jquery dan js nya bootstrap
    echo $jquery . $bootstrapJs; ?>
