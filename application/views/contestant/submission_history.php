
<div class="row">
    <div class="col-sm-12">
        <h1 class="judul-contest">History Submission</h1>
    </div>
</div>
<div class="row">
<div class="container">
    <div class="col-sm-12">
        <table class="table table-submission table-bordered">
            <thead>
            <tr>
            <td>No</td>
            <td>Time</td>
            <td>Soal</td>
            <td>Language</td>
            <td>Verdict</td>
            </tr>
            </thead>
            <?php for($i=0; $i < count($submissions); $i++) : ?>
            <tbody>
            <tr>
                <td><?php echo ($i + 1);?></td>
                <td><?php echo $submissions[$i]['jam']?></td>
                <td><?php echo $submissions[$i]['nomor_soal'] . ' - ' . $submissions[$i]['judul']?></td>
                <td><?php echo $submissions[$i]['bahasa']?></td>
                <td><?php if($submissions[$i]['hasil'] == 'Pending') : ?>
                        <span class="pendingAnswer">
                    <?php elseif($submissions[$i]['hasil'] == 'Accepted') : ?>
                        <span class="correctAnswer">
                    <?php elseif($submissions[$i]['hasil'] == 'Solved') : ?>
                        <span class="solvedAnswer">
                    <?php else : ?>
                        <span class="wrongAnswer">
                    <?php endif; ?>
                    <?php echo $submissions[$i]['hasil'];?></span>
                </td>
            </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    </div>
	</div>
</div>