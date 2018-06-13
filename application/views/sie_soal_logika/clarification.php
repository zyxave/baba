<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/4/2016
 * Time: 3:14 PM
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
                        <a href="<?php echo base_url(). 'admin/logika/clarification/' . $contest['id'] ?>"class="cur">Clarification</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/problems/' . $contest['id'] ?>">Soal</a>
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
        <h1 style="text-align: center"><?php echo $contest['nama'] ?> Clarification</h1>
    </div>
</div>
<div class="row" style="margin-left: 10px;">
     <h3> Belum Dijawab </h3>
    <?php if (count($klar_belum) > 0) : ?>
            <table border="1px" class="tabel table-bordered table-condensed">
                <thead>
                    <th style="width: 100px;">Team Name</th>
                    <th style="width: 100px;">Problem</th>
                    <th style="width: 100px;">Clar Time</th>
                    <th style="width: 200px;">Question</th>
                    <th style="width: 300px;">Answer</th>
                </thead>
                <?php
                foreach ($klar_belum as $row) {
                    ?>
                    <tbody>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['nomor']?></td>
                        <td><?php echo $row['waktu_kirim'] ?></td>
                        <td><?php echo "<p style='white-space: pre-wrap'>" . $row['pertanyaan'] . "</p>"; ?></td>
                        <td align="right">
                            <form action="<?php echo base_url() ?>admin/logika/answer_clarification/<?php echo $row['id'] ?>/<?php echo $contest['id'] ?>" method="post">
                                <textarea name="jawaban" cols="40" rows="4"></textarea><br />
                                <input type="submit" name="answer" value="Answer"/>
                            </form>
                        </td>
                    </tbody>
                    <?php
                }
                ?>
            </table>
    <?php endif; ?>
    
            <h3>Sudah Dijawab</h3>
    <?php if (count($klar_sudah) > 0) : ?>
        <table border="1px" class="tabel table-bordered table-condensed">
            <thead>
                <th width="150px">Team Name</th>
                <th width="100px">Problem</th>
                <th width="100px">Clar Time</th>
                <th width="200px">Question</th>
                <th width="200px">Answer</th>
            </thead>
           <?php foreach ($klar_sudah as $row) : ?>
                <tbody>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['nomor'] ?></td>
                    <td><?php echo $row['waktu_kirim'] ?></td>
                    <td><?php echo "<p style='white-space: pre-wrap'>" . $row['pertanyaan'] . "</p>"; ?></td>
                    <td><?php echo "<p style='white-space: pre-wrap'>" . $row['jawaban'] . "</p>"; ?></td>
                </tbody>
                <?php endforeach; ?>
        </table>
        <?php else : ?>

    <?php endif; ?>
</div>
