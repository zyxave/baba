<div class="row">
    <div class="col-sm-12">
        <h1 class="judul"><?php echo $_SESSION['nama_kontes'];?></h1>
    </div>
</div>
<div class="row">
    <div class="centerContent col-sm-12">
        <a href="<?php echo base_url() . 'problem/logic/' . $_SESSION['id_kontes'];?>" class="tombolKontes floatNone col-sm-1" target="_blank">Lihat Soal Disini</a>

    </div>
</div>
<div class="row">
    <div class="centerContent col-sm-12">
        <a href="<?php echo base_url(); ?>contest/submit_solution" class="tombolSubmit col-sm-6">
            <h2>Submit</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Tempat Mengirim Jawaban</div>
        </a>
        <a href="<?php echo base_url();?>contest/clarification" class="tombolClar col-sm-6">
            <h2>Clarification</h2>
            <div class="garisHor col-sm-12"></div>
            <div class="isiTombol col-sm-12">Tempat bertanya ke juri</div>
        </a>
    </div>
</div>