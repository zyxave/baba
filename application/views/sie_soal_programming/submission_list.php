<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 02/01/2016
 * Time: 12:12
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
                        <a href="<?php echo base_url(). 'admin/judge/submissions/' . $contest['id'] ?>" class="cur">Submission</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/programming/clarification/'. $contest['id'] ?>">Clarification</a>
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
        <h1 style="text-align: center">Submissions</h1>
        <p>Submissions are automatically refreshed every 30 seconds</p>
    </div>
</div>
<div id="refreshMsg"></div>
<div class="row">
    <div class="col-xs-12">
        <div id="submissionList">

        <?php foreach($submissions as $row) : ?>
            <div class="progtbl">
                <div class="row">
                    <div class="col-xs-12 col-md-9">
                        <div class="tbl-hdr">Team : <?php echo $row['nama_tim'] ?> , <?php echo $row['nama_sekolah'] . " - " . $row['kabupaten']?></div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <b>Submit Time</b> : <?php echo $row['jam']?>

                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5"><b>Soal</b> <?php echo $row['urutan_soal'] ?> - <?php echo $row['nama_soal'] ?></div>
                    <div class="col-xs-12 col-sm-6 col-md-1"><b><?php echo $row['bahasa'] ?></b></div>
                    <div class="col-xs-12 col-sm-6 col-md-2"><b>Verdict : <?php echo $row['hasil'] ?></b></div>
                    <div class="col-xs-6 col-sm-6 col-md-2"><a href="<?php echo base_url(). $row['file'] ?>" target="_blank" class="btn btn-ilpc">Source Code</a></div>
                    <div class="col-xs-6 col-sm-6 col-md-2">
                    <?php if($row['hasil'] === 'Pending') : ?>
                        <a href="<?php echo base_url() . 'admin/judge/do_judge/' . $row['id']; ?>" class="btn btn-ilpc">Judge</a>
                    <?php else : ?>

                    <?php endif; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

        </div>
    </div>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
<script>
$(function(){
    var bUrl = "<?php echo base_url();?>";
    var id = "<?php echo $contest['id'];?>";
    var totalErr = 0;
    function refreshSubmission(interval){
        setTimeout(function(){
            $('#refreshMsg').html('');
            $.ajax({
                url: bUrl + "admin/judge/submissions/" + id,
                success: refreshSucceed,
                error: refreshFailed
            });
        }, interval);

    }
    function refreshSucceed(data){
        $('#submissionList').html(data);
        refreshSubmission(30000);
        totalErr = 0;
    }
    function refreshFailed(){
        totalErr++;
        if(totalErr > 5){
            var msgHtml = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Auto Refresh Failed Many Times !!</strong> Please refresh this page manually</div>';
        } else {
            var msgHtml = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Refresh Failed!</strong> we\'ll attempt to refresh again automatically in 5 seconds</div>';
            refreshSubmission(5000);
        }
        $('#refreshMsg').html(msgHtml);
    }
    refreshSubmission(30000);
});
</script>
