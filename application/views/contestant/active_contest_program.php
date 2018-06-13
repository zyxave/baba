<div class="container">
<div class="row">
    <div class="col-sm-12">
        <h1 class="judul-contest"><?php echo $_SESSION['nama_kontes'];?></h1>
		<div class="col-sm-offset-3 col-sm-6">
		<p style="text-align:center; font-size: 1.2em"> Selamat datang dalam kontes programming. Anda harus mengerjakan sesuai dengan ketentuan yang berlaku. Apabila ada soal yang <b>kurang jelas</b>>, klik <b>tombol (?)</b> yang ada dibagian kiri halaman soal untuk bertanya pada panitia. </p>
		</div>
		<div class="col-sm-12 kolom-soal">
		<p style="text-align:center;"> <Strong> Berikut adalah soal yang tersedia </Strong> </p>
		</div>
   </div>
</div>
<div class="row">
    <div class="center-content col-sm-12">
        <?php foreach($problems as $problem) : ?>
        <a href="<?php echo base_url() . 'contest/programming_problem/' . $problem['id']; ?>" class="tombolContest floatNone col-sm-1" target="_blank">Soal <?php echo $problem['nomor']; ?></a>
        <?php endforeach; ?>

    </div>
</div>
</div>
<div class="row kolom-scoreboard">
	<p> </p>
    <div class="center-content">
        <a href="<?php echo base_url() . 'scoreboard/contest/' . $_SESSION['kontes_url'];?>" class="tombolScoreboard floatNone col-sm-5 col-sm-offset-3" target="_blank">Scoreboard</a>
		 <a href="<?php echo base_url() . 'contest/submissions/' . $_SESSION['id_kontes'];?>" class="tombolSubmissions floatNone col-sm-5 col-sm-offset-3" target="_blank">Submission History</a>
    </div>
</div>
<!-- <div class="container">
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
</div> -->
