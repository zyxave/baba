<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/7/2016
 * Time: 10:38 AM
 */?>
<div class="table-responsive" style="width:700px; margin-left:auto;margin-right: auto;">
        <h2>TOTAL - SCORE</h2>
        <table class="table table-bordered table-condensed" id="scoreboard">
            <tr>
                <th width="50px">RANK</th>
                <th width="100px">TEAM</th>
                <th width="50px">SCORE</th>
            </tr>
            <?php
            $no = 0;
            $ac = -1;
            $time = -1;
            $tamp_ac = 0;
            $tamp_rank = 0;
            $datatim = array();
            $index = 0;
            foreach ($scorex as $rowx) :
                if (!(($rowx['jumlah_ac'] == $ac) && ($rowx['time'] == $time))) {
                    $no++;
                }
                if ($rowx['jumlah_ac'] != $tamp_ac) {
                    $tamp_rank = $no - 1;
                }
                $pjb = $no - $tamp_rank;
                ?>
                <?php
                foreach ($scorey as $rowy) {
                    if ($rowx['nama_tim'] == $rowy['nama_tim']) {
                        $datatim[$index]['nama_tim'] = $rowx['nama_tim'];
                        $datatim[$index]['nama_sekolah'] = $rowx['nama_sekolah'];
                        $datatim[$index]['kabupaten'] = $rowx['kabupaten'];
                        $total = $rowy['score'] + (($rowx['jumlah_ac'] * $max_poin_ac) - (($pjb - 1) / $rowx['jjb']) * $max_poin_ac);
                        $datatim[$index]['score'] = $total;
                        break;
                    }
                }
                $index++;
                $ac = $rowx['jumlah_ac'];
                $time = $rowx['time'];
                $tamp_ac = $rowx['jumlah_ac'];
            endforeach;
            ?>
            <?php
            $tamp = 0;
            $rank = array();
            for ($a = 0; $a < $index; $a++) :
                $tamp = $datatim[$a];
                for ($b = $a + 1; $b < $index; $b++) :
                    if ($datatim[$b]['score'] > $tamp['score']) {
                        $tampscore = $datatim[$b];
                        $datatim[$b] = $tamp;
                        $datatim[$a] = $tampscore;
                        $tamp = $tampscore;
                    }
                endfor;
            endfor;
            $tamp_score = -1;
            $no = 0;
            for ($a = 0; $a < $index; $a++) :
                $no++; ?>
                <tr <?php
                if ($no <= 40) {
                    ?>
                        style="background-color: #f3f3f3;"
                        <?php
                    }
                    ?>>
                    <td align="center"><?php echo $no ?></td>
                    <td>
                        <span class="tim"><?php echo $datatim[$a]['nama_tim'] ?></span><br/>
                        <div class="sekolah"><?php echo $datatim[$a]['nama_sekolah'] . "<br>" . $datatim[$a]['kabupaten']?></div>

                    </td>
                    <td align="center"><?php echo $datatim[$a]['score']; ?></td>
                </tr>
                <?php
                $tamp_score = $datatim[$a]['score'];
            endfor; ?>
        </table>
    <div>List Tanpa Score</div>
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th width="50px">RANK</th>
                <th width="100px">TEAM</th>

            </tr>
            </thead>
            <?php
            $no = 0;
            for ($a = 0; $a < $index; $a++) :
            $no++; ?>
            <tr>
                <td style="text-align: center"><?php echo $no ?></td>
                <td>
                    <span class="tim"><?php echo $datatim[$a]['nama_tim'] ?></span>
                    <span class="sekolah">- <?php echo $datatim[$a]['nama_sekolah'] . " , " . $datatim[$a]['kabupaten']?></span>
                </td>
            </tr>
            <?php $tamp_score = $datatim[$a]['score'];
            endfor; ?>
        </table>
        <p>
            Copyright &copy; ILPC-Universitas Surabaya
        </p>
    <?php //load file jquery dan js nya bootstrap
    echo $jquery . $bootstrapJs; ?>
