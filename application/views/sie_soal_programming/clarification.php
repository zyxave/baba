<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/4/2016
 * Time: 4:10 PM
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
                        <a href="<?php echo base_url(). 'admin/programming/clarification/' . $contest['id'] ?>" class="cur">Clarification</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/problems/' . $contest['id'] ?>">Soal</a>
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
        <h1 style="text-align: center"><?php echo $contest['nama'] ?> Clarification</h1>
    </div>
</div>
<div class="row">
    <?php
    if (count($klar_belum) > 0) {
        ?>
        <h4>Not Answered</h4>
        <table border="1px" class="tabel">
            <tr>
                <th style="width: 100px;">Team Name</th>
                <th style="width: 100px;">Problem</th>
                <th style="width: 100px;">Clar Time</th>
                <th style="width: 200px;">Question</th>
                <th style="width: 300px;">Answer</th>
            </tr>
            <?php
            foreach ($klar_belum as $row) {
                ?>
                <tr>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['nomor']?></td>
                    <td><?php echo $row['waktu_kirim'] ?></td>
                    <td><?php echo "<p style='white-space: pre-wrap'>" . $row['pertanyaan'] . "</p>"; ?></td>
                    <td align="right">
                        <form action="<?php echo base_url() ?>admin/programming/answer_clarification/<?php echo $row['id'] ?>/<?php echo $contest['id'] ?>" method="post">
                            <textarea name="jawaban" cols="40" rows="4"></textarea><br />
                            <input type="submit" name="answer" value="Answer"/>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <?php
    }
    if (count($klar_sudah) > 0) {
        ?>
        <h4>Answered</h4>
        <table border="1px" class="tabel">
            <tr>
                <th width="150px">Team Name</th>
                <th width="100px">Problem</th>
                <th width="100px">Clar Time</th>
                <th width="200px">Question</th>
                <th width="200px">Answer</th>
            </tr>
            <?php
            foreach ($klar_sudah as $row) {
                ?>
                <tr>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['nomor'] ?></td>
                    <td><?php echo $row['waktu_kirim'] ?></td>
                    <td><?php echo "<p style='white-space: pre-wrap'>" . $row['pertanyaan'] . "</p>"; ?></td>
                    <td><?php echo "<p style='white-space: pre-wrap'>" . $row['jawaban'] . "</p>"; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
</div>

