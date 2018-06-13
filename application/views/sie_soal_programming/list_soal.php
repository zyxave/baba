<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 25/12/2015
 * Time: 21:58
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
                        <a href="<?php echo base_url(). 'admin/programming/contest/' . $contest['id'] ?>">Info</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/judge/submissions/' . $contest['id'] ?>">Submission</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/clarification/' . $contest['id'] ?>">Clarification</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/problems/' . $contest['id'] ?>" class="cur">Soal</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/scoreboard/' . $contest['id'] ?>">Scoreboard</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/score/' . $contest['id'] ?>">Score</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/team_list/' . $contest['id'] ?>">Team List</a>
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
</div>
<?php endif; ?>
<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2 col-sm-offset-1">
        <a href="<?php echo base_url() . 'admin/programming/new_problem/'. $contest['id']; ?>" class="btn btn-ilpc"><i class="fa fa-plus"></i> Tambah Soal</a>
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
                <th>Nomor - Nama Soal</th>
                <th>Author</th>
                <th colspan="2">Option</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($problemSet as $soal) : ?>
                <tr>
                    <td><a href="<?php echo base_url(). 'admin/programming/see_problem/' . $soal['id']; ?>"><?php echo $soal['nomor'] . " - " . $soal['judul'] ?></a></td>
                    <td><?php echo $soal['pembuat'];?></td>
                    <td><a href="<?php echo base_url(). 'admin/programming/edit_problem/' . $soal['id'];?>" class="btn btn-ilpc">Edit</a></td>
                    <td><a href="<?php echo base_url(). 'admin/judge/rejudge/' . $soal['id'];?>" class="btn btn-ilpc">Rejudge</a></td>
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
