<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/4/2016
 * Time: 1:09 PM
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
                        <a href="<?php /*echo base_url(). 'admin/judge/submissions/' . $contest['id'] */?>">Submission</a>
                    </div>-->
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/clarification/' . $contest['id'] ?>">Clarification</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/problems/' . $contest['id'] ?>" >Soal</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/score/' . $contest['id'] ?>">Score</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/team_list/' . $contest['id'] ?>" class="cur">Team List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h1 style="text-align: center">Tim Yang Mengikuti Kontes Ini</h1>
    </div>

</div>
<?php if(isset($_SESSION['updateTeamList'])) : ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="success-box"> Daftar Tim yang Mengikuti Kontes Berhasil Diperbarui </div><br>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">

        <form method="post" action="<?php echo base_url() . 'admin/logika/save_team_list'?>">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="checkAll">
                        </th>
                        <th>Nama Tim</th>
                        <th>Sekolah</th>
                        <th>Kab/Kota - Provinsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($teams as $team) : ?>
                        <tr>
                            <td><input type="checkbox" name="tim[]" value="<?php echo $team['id']; ?>" <?php echo $team['jumlah'] > 0 ? "checked" : '' ?> class="team_checkbox"> </td>
                            <td><?php echo $team['nama_tim']; ?></td>
                            <td><?php echo $team['nama_sekolah']; ?></td>
                            <td><?php echo $team['kabupaten'] . " - " . $team['provinsi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <input type="hidden" value="<?php echo $contest['id'];?>" name="contestId">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-2 col-md-offset-5">
                    <input type="submit" value="Simpan" name="teamList" class="btn btn-ilpc">
                </div>
            </div>
        </form>
    </div>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
<script>
    $(function(){
        $("#checkAll").click(function()
        {
            var checked_status = this.checked;
            $(".team_checkbox").each(function()
            {
                this.checked = checked_status;
            });
        });
    });
</script>

