<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/4/2016
 * Time: 2:32 PM
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
                        <a href="<?php echo base_url(). 'admin/logika/problems/' . $contest['id'] ?>">Soal</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/score/' . $contest['id'] ?>"class="cur">Score</a>
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
        <h1 style="text-align: center">Score</h1>
    </div>
</div>
<div class="row">
    <?php if(count($score) > 0) : ?>
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
                    <table class="table table-bordered table-condensed score-tbl">
                        <thead>
                        <tr>
                            <th>RANK</th>
                            <th>TEAM</th>
                            <th>SCHOOL</th>
                            <th>SCORE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 0;
                        $tamp_score = -1;
                        foreach($score as $score) :
                            if ($score['score'] != $tamp_score) {
                                $no++;
                            }
                            ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $score['nama_tim'] ?></td>
                                <td><?php echo $score['nama_sekolah'].' - '.$score['kabupaten']?></td>
                                <td><?php echo $score['score'] ?></td>
                            </tr>
                        <?php
                            $tamp_score = $score['score'];
                        endforeach;?>
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
</div>
