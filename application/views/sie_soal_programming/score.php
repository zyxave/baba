<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 02/01/2016
 * Time: 14:16
 */
?>
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
                        <a href="<?php echo base_url(). 'admin/programming/problems/' . $contest['id'] ?>" >Soal</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/scoreboard/' . $contest['id'] ?>">Scoreboard</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/score/' . $contest['id'] ?>" class="cur">Score</a>
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
        <h1 style="text-align: center">Score Pemrograman</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <table class="table table-bordered table-condensed score-tbl">
            <thead>
            <tr>
                <th width="70px">RANK</th>
                <th width="450px">TEAM</th>
                <th width="100px">SOLVED</th>
                <th width="70px">TIME</th>
                <th width="70px">SCORE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 0;
            $ac = -1;
            $time = -1;
            $tamp_ac = 0;
            $tamp_rank = 0;
            foreach ($score as $row) {
                if (!(($row['jumlah_ac'] == $ac) && ($row['time'] == $time))) {
                    $no++;
                }
                if ($row['jumlah_ac'] != $tamp_ac) {
                    $tamp_rank = $no - 1;
                }
                $pjb = $no - $tamp_rank;
                ?>
                <tr>
                    <td align="center"><?php echo $no ?></td>
                    <td>
                        <strong><?php echo $row['nama_tim'] ?></strong><br/>
                        <div class="school"><?php echo $row['nama_sekolah'] . " - " . $row['kabupaten']; ?></div>
                    </td>
                    <td align="center"><?php echo $row['jumlah_ac'] ?></td>
                    <td align="center"><?php echo $row['time'] ?></td>
                    <td  align="center"><?php echo ($row['jumlah_ac']* $max_poin_ac) - (($pjb-1)/$row['jjb'])*$max_poin_ac ?></td>
                </tr>
                <?php
                $ac = $row['jumlah_ac'];
                $time = $row['time'];
                $tamp_ac = $row['jumlah_ac'];
            }
            ?>
            </tbody>
        </table>
        <p style="text-align: center; margin-top: 12px;">
            Copyright &copy; ILPC-Universitas Surabaya<br />
        </p>
    </div>
</div>