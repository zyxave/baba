<div class="container">
<div class="row">
    <div class="col-sm-12">
        <h1 class="judul-contest">Upcoming Contests</h1>
    </div>
</div>
<?php if(count($upcomingContests) > 0) : ?>
    <div class="row">
	<div class="container-fluid">
        <div class="col-sm-12 upcoming-contest">
            <table class="table table-hover contest-table table-bordered">
                <thead>
                <tr>
                    <td style="width: 150px;">Type</td>
                    <td style="min-width: 150px;">Name</td>
                    <td>Problem(s)</td>
                    <td>Date</td>
                    <td>Start Time (WIB)</td>
                    <td>End Time (WIB)</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($upcomingContests as $contest) : ?>
                    <tr>
                        <td><?php if($contest['tipe'] == 'programming') :?>
                                Programming
                            <?php elseif($contest['tipe'] == 'multiple_choice') : ?>
                                Logika
                            <?php endif; ?></td>
                        <td><?php echo $contest['nama'];?></td>
                        <td><?php echo $contest['jml_soal'];?></td>
                        <td><?php echo date('d-M-Y', strtotime($contest['tanggal']));?></td>
                        <td><?php echo $contest['jam_mulai'];?></td>
                        <td><?php echo $contest['jam_selesai'];?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
	  </div>
    </div>
<?php else: ?>
<div class="row no-contest">
    <div class="col-sm-12">
        <h4 class="text-center">Tidak Ada Kontes yang Akan Berlangsung</h4>
    </div>
</div>
<?php endif; ?>
<div class="row">

    <div class="col-sm-12">
        <h1 class="judul-contest">Available Contests</h1>
    </div>

</div>
<?php if(count($availableContests) > 0) : ?>
<div class="row">
<div class="container-fluid">
    <div class="col-sm-12 available-contest">
        <table class="table table-hover contest-table table-bordered">
            <thead>
            <tr>
            <td style="width: 150px;">Type</td>
            <td style="width: 150px;">Name</td>
            <td>Problem(s) </td>
            <td>Date</td>
            <td>Start Time (WIB)</td>
            <td>End Time (WIB)</td>
            <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($availableContests as $contest) : ?>
                <tr>
                    <td><?php if($contest['tipe'] == 'programming') :?>
                        Programming
                        <?php elseif($contest['tipe'] == 'multiple_choice') : ?>
                        Logika
                        <?php endif; ?>
                    </td>
                    <td><?php echo $contest['nama'];?></td>
                    <td><?php echo $contest['jml_soal'];?></td>
                    <td><?php echo date('d-M-Y', strtotime($contest['tanggal']));?></td>
                    <td><?php echo $contest['jam_mulai'];?></td>
                    <td><?php echo $contest['jam_selesai'];?></td>
                    <td>
                    <?php if(isset($_SESSION['id_kontes'])) :
                        if($_SESSION['id_kontes'] === $contest['id_kontes']) : ?>
                            <a class="tombolContest disabled" disabled>Already Joined</a>
                        <?php else : ?>
                            <a class="tombolContest" href="<?php echo base_url(); ?>contest/<?php echo $contest['tipe'] === 'programming' ? 'join_programming/' : 'join_logic/'; echo $contest['id_kontes']; ?>"> Join </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a class="tombolContest" href="<?php echo base_url(); ?>contest/<?php echo $contest['tipe'] === 'programming' ? 'join_programming/' : 'join_logic/'; echo $contest['id_kontes']; ?>"> Join </a>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php else: ?>
<div class="row no-contest" style="margin-bottom: 16px;">
    <div class="col-sm-12">
        <h4 class="text-center">Tidak Ada Kontes yang Sedang Berlangsung</h4>
    </div>
</div>
<?php endif; ?>
</div>
</div>