<div class="row logika">
<div class="container jenis-kontes">
    <div class="col-sm-12">
        <h1 class="judul-contest"><?php echo $_SESSION['nama_kontes'];?></h1>
		<div class="col-sm-offset-2 col-sm-8" style="font-size: 1.2em">
        <p class="text-center"> Ini adalah halaman Klarifikasi Pertanyaan. Bila anda merasa soal yang diberikan ambigu / salah / tidak ada jawabannya, anda bisa bertanya pada kami melalui form dibawah ini. <strong>Kami tidak akan menjawab pertanyaan tentang jawaban dari soal tersebut.</strong> Terima Kasih.</p>
        <p class="text-center"><em>Harap lakukan refresh halaman secara manual agar anda bisa melihat balasan dari pertanyaan yang telah anda ajukan.</em></p>
        </div>
		<div class="col-sm-12 kolom-soal">
		</div>
   </div>
</div>
</div>
<!-- <?php if($_SESSION['tipe_kontes'] === 'programming') : ?>
<div class="row kolom-scoreboard">
	<p style="text-align:center;"> <Strong> Untuk melihat scoreboard klik tombol di bawah ini </Strong> </p>
    <div class="center-content">
        <a href="<?php echo base_url() . 'scoreboard/contest/' . $_SESSION['id_kontes'];?>" class="tombolScoreboard floatNone col-sm-5 col-sm-offset-3" target="_blank">Scoreboard</a>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="center-content col-sm-12">
        <a href="<?php echo base_url(); ?>contest/submit_solution" class="tombolSubmit2 col-sm-4">
            <h2>Submit</h2>
            <div class="garisHor2 col-sm-12"></div>
            <div class="isiTombol2 col-sm-12">Kirimkan source code jawaban disini</div>
        </a>
        <a href="<?php echo base_url(); ?>contest/clarification" class="tombolClar2 col-sm-4">
            <h2>Clarification</h2>
            <div class="garisHor2 col-sm-12"></div>
            <div class="isiTombol2 col-sm-12">Tempat bertanya ke juri</div>
        </a>
        <a href="<?php echo base_url(); ?>contest/submissions" class="tombolHistory2 col-sm-4">
            <h2> Submission History</h2>
            <div class="garisHor2 col-sm-12"></div>
            <div class="isiTombol2 col-sm-12">Lihat hasil submission disini</div>
        </a>
    </div>
</div>
</div>
<?php elseif($_SESSION['tipe_kontes'] === 'multiple_choice') : ?>
<div class="row">
    <div class="centerContent col-sm-12">
        <a href="<?php echo base_url(); ?>contest/submit_solution" class="tombolSubmit col-sm-6">
            <h2>Submit</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Tempat Mengirim Jawaban</div>
        </a>
        <a  class="tombolClarAktif col-sm-6">
            <h2>Clarification</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Tempat betanya ke juri</div>
        </a>
    </div>
</div>
<?php endif; ?> -->
<?php if(isset($_SESSION['clarSucceed'])) : ?>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <div class="alert alert-berhasil text-center">
            Pertanyaan klarifikasi telah terkirim
        </div>
    </div>
</div>
<?php endif; ?>
<div class="row" style="margin-top: 10px;">
    <div class="container">
        <div class="col-sm-12">
        <?php if(count($clarifications) > 0 ) : ?>
            <table class="table table-hover contest-table table-bordered">
                <thead>
                    <td class="col-sm-1">Send Time</td>
                    <td class="col-sm-1">Reply Time</td>
                    <td class="col-sm-1">Number</td>
                    <td class="col-sm-4">Question</td>
                    <td class="col-sm-4">Answer</td>
                </thead>
                <tbody>
                <?php foreach($clarifications as $clar) : ?>
                    <tr>
                        <td><?php echo $clar['waktu_kirim'];?></td>
                        <td><?php echo $clar['waktu_jawab'] == '00:00:00' ? '-' : $clar['waktu_jawab'];?></td>
                        <td><?php echo $clar['nomor'];
                            if($_SESSION['tipe_kontes'] === 'programming') :
                                echo " - " . $clar['judul'];
                            endif; ?>
                        </td>
                        <td style="white-space: pre-wrap; text-align: left; line-height: 1.1em;"><?php echo $clar['pertanyaan'];?></td>
                        <td style="white-space: pre-wrap; text-align: left;line-height: 1.1em;"><?php echo $clar['jawaban'];?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else :?>
                <h4 class="text-center">Tim Anda Belum Pernah Mengirimkan Pertanyaan Klarifikasi.</h4>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h2 class="text-center">Clarification</h1>
    </div>
</div>


    <div class="row form-klarifikasi">
        <form method="post" action="<?php echo $formSubmitLink;?>">
            <div class="container">
                <div class="form-clar col-sm-12">
                    <div class="col-sm-offset-2 col-sm-2 rataKanan">Soal :</div>
                    <select class="col-sm-4" name="nomor">
                        <?php foreach($problems as $problem) :
                            if($_SESSION['tipe_kontes'] === 'programming') : ?>
                            <option value="<?php echo $problem['id']?>"> <?php echo $problem['nomor'] . " - " . $problem['judul'];?> </option>
                        <?php elseif ($_SESSION['tipe_kontes'] === 'multiple_choice') : ?>
                            <option value="<?php echo $problem['id']?>"> <?php echo $problem['nomor'];?> </option>
                        <?php endif;
                        endforeach; ?>
                    </select>
                </div>
                <div class="form-clar col-sm-12">
                    <div class="col-sm-offset-2 col-sm-2 rataKanan">Pertanyaan :</div>
                    <textarea rows="8" class="col-sm-4" name="pertanyaan"></textarea>
                </div>
                <div class="form-clar col-sm-12">
                    <input class="col-sm-4 btn btn-ilpc btn-clar" type="submit" name="submitClarification" value="Submit"/>
                </div>
            </div>
        </form>
    </div>
