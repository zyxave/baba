<div class="row">
    <div class="col-sm-12">
        <h1 class="judul"><?php echo $_SESSION['nama_kontes'];?></h1>
    </div>
</div>
<div class="row">
    <div class="centerContent col-sm-12">
        <a class="tombolSubmitAktif col-sm-6">
            <h2>Submit</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Tempat Mengirim Jawaban</div>
        </a>
        <a href="<?php echo base_url(); ?>contestant/clarification" class="tombolClar col-sm-6">
            <h2>Clarification</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Tempat betanya ke juri</div>
        </a>
    </div>
</div>
<div class="row">
    <h1 class="judul">Submit Jawaban Soal Logika</h1>
</div>
<?php if(isset($_SESSION['submitSucceed'])) : ?>
    <div class="row">
        <div class="submitWarning col-sm-12">
            Jawaban telah terkirim
        </div>
    </div>
<?php elseif(isset($_SESSION['submitFailed'])) : ?>
    <div class="row">
        <div class="submitFailed col-sm-12">
            Jawaban gagal terkirim. Pesan Error :
            <p><?php echo $_SESSION['submitFailed'];?></p>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-sm-12">
        <div class="i-box">
            <h3>Petunjuk</h3>
            <p>Setiap jawaban benar akan memperoleh poin +5 dan setiap jawaban yang salah mendapat poin -2. Sedangkan jawaban kosong mendapat poin 0.</p>
            <p>Jangan lupa untuk klik tombol <strong>Submit</strong> dibagian bawah untuk mengirimkan jawaban.<br>Apabila submit jawaban lebih dari satu kali, jawaban yang dinilai adalah jawaban yang terkahir kali disubmit.</p>
        </div>

    </div>
</div>
<div class="row">
    <form method="post" action="<?php echo base_url() . 'contest/submit_multiple_choice' ?>">
    <?php foreach($problems as $problem) : ?>
        <div class="boxSoal col-sm-12">
            <div class="col-sm-1"> No.<?php echo $problem['nomor'];?></div>
            <div class="col-sm-2"><label><input type="radio" name="nomor<?php echo $problem['nomor'] ?>" value="a"/> A </label></div>
            <div class="col-sm-2"><label><input type="radio" name="nomor<?php echo $problem['nomor'] ?>" value="b"/> B </label></div>
            <div class="col-sm-2"><label><input type="radio" name="nomor<?php echo $problem['nomor'] ?>" value="c"/> C </label></div>
            <div class="col-sm-2"><label><input type="radio" name="nomor<?php echo $problem['nomor'] ?>" value="d"/> D </label></div>
            <div class="col-sm-2"><label><input type="radio" name="nomor<?php echo $problem['nomor'] ?>" value="e"/> E </label></div>
        </div>
    <?php endforeach; ?>
        <div class="col-sm-12">
            <input class="col-sm-2 tombolKontes" style="float:right" type="submit" name="submitMultipleChoice" value="Submit"/>
        </div>
    </form>
</div>