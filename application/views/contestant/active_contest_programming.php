<div class="row">
    <div class="col-sm-12">
        <h1 class="judul"><?php echo $_SESSION['nama_kontes'];?></h1>
    </div>
</div>
<div class="row">
    <div class="centerContent col-sm-12">
        <?php foreach($problems as $problem) : ?>
        <a href="<?php echo base_url() . 'contest/programming_problem/' . $problem['id']; ?>" class="tombolKontes floatNone col-sm-1" target="_blank">Soal <?php echo $problem['nomor']; ?></a>
        <?php endforeach; ?>

    </div>
</div>
<div class="row">
    <div class="centerContent">
        <a href="<?php echo base_url() . 'scoreboard/contest/' . $_SESSION['id_kontes'];?>" class="tombolScore floatNone col-sm-5 col-sm-offset-3" target="_blank">Scoreboard</a>
    </div>
</div>
<div class="row">
    <div class="centerContent col-sm-12">
        <a href="<?php echo base_url(); ?>contest/submit_solution" class="tombolSubmit col-sm-4">
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
            <h2> Submission History</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Lihat hasil submission disini</div>
        </a>
    </div>
</div>