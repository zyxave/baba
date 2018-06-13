<div class="row">
    <div class="col-sm-12">
        <h1 class="judul"><?php echo $_SESSION['nama_kontes'];?></h1>
    </div>
</div>
<div class="row">
    <div class="centerContent">
        <a href="<?php echo base_url() . 'scoreboard/contest/' . $_SESSION['id_kontes'];?>" class="tombolScore floatNone col-sm-5 col-sm-offset-3" target="_blank">Scoreboard</a>
    </div>
</div>
<div class="row">
    <div class="centerContent col-sm-12">
        <a href="<?php echo base_url(); ?>contest/submit_solution" class="tombolSubmitAktif col-sm-4">
            <h2>Submit</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Kirimkan source code jawaban disini</div>
        </a>
        <a href="<?php echo base_url(); ?>contest/clarification" class="tombolClar col-sm-4">
            <h2>Clarification</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Tempat bertanya ke juri</div>
        </a>
        <a href="<?php echo base_url(); ?>contest/submissions" class="tombolHistory col-sm-4">
            <h2>History Submission</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Lihat hasil submission disini</div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h1 class="judul">Submit Source Code</h1>
    </div>
</div>
<div class="row">
    <div class="infoBox col-sm-12">
        Pastikan file source code jawaban anda memiliki ekstensi yang sesuai seperti di bawah ini :
        <ul>
            <li>C++ (*.cpp)</li>
            <li>JAVA (*.java) . </li>
            <li>Pascal (*.pas)</li>
        </ul>
        <p>Maksimum ukuran file adalah <strong>2MB</strong>. <br>Khusus source code Java, file harus bernama <strong>Main.java</strong></p>
    </div>
    <?php if(isset($_SESSION['submitSucceed'])) : ?>
    <div class="submitWarning col-sm-12">
        Source code jawaban telah terkirim
    </div>
    <?php elseif(isset($_SESSION['submitFailed'])) : ?>
    <div class="submitFailed col-sm-12">
        Source code jawaban gagal terkirim. Pesan Error :
        <p><?php echo $_SESSION['submitFailed'];?></p>
    </div>
    <?php endif; ?>
    <div class="col-sm-12">
        <form method="post" action="<?php echo base_url() . 'contest/submit_programming'?>" enctype="multipart/form-data">
            <div class="formKonten col-sm-12">
                <div class="alignKanan col-sm-2">Soal : </div>
                <select class="col-sm-3" name="problem">
                <?php foreach($problems as $problem) : ?>
                    <option value="<?php echo $problem['id']?>"> <?php echo $problem['nomor'] . " - " . $problem['judul'];?> </option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="formKonten col-sm-12">
                <div class="alignKanan col-sm-2">File Jawaban : </div>
                <input class="col-sm-3" type="file" name="codeFile"/>
            </div>
            <div class="col-sm-4">
                <input class="col-sm-4 tombolKontes" style="float:right" type="submit" name="submitProgramming" value="Submit"/>
            </div>
        </form>
    </div>
</div>