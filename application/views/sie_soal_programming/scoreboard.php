<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/4/2016
 * Time: 10:57 PM
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
                        <a href="<?php echo base_url(). 'admin/programming/problems/' . $contest['id'] ?>" >Soal</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/scoreboard/' . $contest['id'] ?>"class="cur">Scoreboard</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/score/' . $contest['id'] ?>" >Score</a>
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
    <div style="width: 1000px;margin-left:auto;margin-right: auto;">

        <h2 class="ctr"><?php echo $contest['nama'] ?> - SCOREBOARD</h2>
        <?php if(isset($freeze)) :?>
            <h3>Scoreboard is Freezed</h3>
        <?php elseif(isset($finalScore)) : ?>
            <h3>Final Score</h3>
        <?php endif; ?>
        <table id="scoreboard" class="tabel table-bordered table-condensed">
            <thead>
            <tr style="background-color: #FFE346">
                <th width="55px">RANK</th>
                <th width="300px">TEAM</th>
                <th width="60px">SOLVED</th>
                <th width="60px">TIME</th>
                <?php
                foreach ($problem as $row) {
                    ?>
                    <th width="60px"><?php echo $row['nomor'] ?></th>
                    <?php
                }
                ?>
                <th width="70px">ATT/SOLVED</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 0;
            $ac = -1;
            $time = -1;
            foreach ($scoreboard as $row) :
                if (!(($row['jumlah_ac'] == $ac) && ($row['time'] == $time))) :
                    $no++;
                endif; ?>
                <tr>
                    <td align="center"><?php echo $no ?></td>
                    <td>
                        <span class="tim"><?php echo $row['nama_tim'] ?></span><br/>
                        <span class="sekolah"><?php echo $row['nama_sekolah'] ?></span>
                        <div class="kab"><?php echo $row['kabupaten']?></div>
                    </td>
                    <td align="center"><?php echo $row['jumlah_ac'] ?></td>
                    <td align="center"><?php echo $row['time'] ?></td>
                    <?php
                    $tot = 0;
                    foreach ($row['soal'] as $soal) :
                        $tot += $soal['att'];
                        ?>
                        <td  align="center"<?php
                        if ($soal['att'] > 0 && $soal['time'] != -1) {
                            echo "class='ac'";
                        } else if ($soal['att'] > 0 && $soal['time'] == -1) {
                            echo "class='wa'";
                        }?>>
                            <?php
                            echo $soal['att'] . "/";
                            if ($soal['time'] == -1) {
                                echo "--";
                            } else {
                                $waktu = $soal['time'] - (20 * (($soal['att']) - 1));
                                echo $waktu;
                            } ?>
                        </td>
                    <?php endforeach; ?>
                    <td class="ctr"><?php echo $tot . "/" . $row['jumlah_ac'] ?></td>
                    <?php
                    $ac = $row['jumlah_ac'];
                    $time = $row['time']; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr style="background-color:#EA2E7F;color: white;">
                <td colspan="4" align="center">Total (attempt/solved)</td>
                <?php
                $totAtt = 0;
                $totAc = 0;
                foreach ($hasil as $kolom) {
                    $totAtt+=$kolom['att'];
                    $totAc+=$kolom['ac'];
                    ?>
                    <td align='center'><?php echo $kolom['att'] . '/' . $kolom['ac'] ?></td>
                    <?php
                }
                echo "<td align='center'>" . $totAtt . "/" . $totAc . "</td>";
                ?>
            </tr>
            </tfoot>
        </table>
        <p class="ctr" style="margin-top: 12px">
            Copyright &copy; ILPC-Universitas Surabaya<br />
        </p>
    </div>
</div>
</div>

