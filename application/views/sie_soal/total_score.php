<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/7/2016
 * Time: 10:05 AM
 */
?>
<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-10">
        <h3>Lihat Total Score</h3>

        <div class="r-box" id="form_login">
            <div id="report_4" title="Report 4">
                <form action="<?php echo base_url() ?>admin/soal/hasiltotal" method="post">
                    <div class="row form-row">
                        <div class="col-sm-6"><label>Competition :</label></div>
                        <div class="col-sm-6">
                            <select name="kompetisi" id="report4_kompetisi">
                                <option value="id">--Select Competition--</option>
                                <?php
                                foreach ($kompetisi as $row) {
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['tahun'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-sm-6"><label>Logic Contest :</label></div>
                        <div class="col-sm-6">
                            <select name="kontesx" id="report4_kontes">
                                <option value="id">--Select Contest--</option>
                            </select>
                        </div>
                    </div>

                    <div id="report_5" title="Report 5">
                        <div class="row form-row">
                            <div class="col-sm-6"><label>Programming Contest :</label></div>
                            <div class="col-sm-6">
                                <select name="kontesy" id="report5_kontes">
                                    <option value="id">--Select Contest--</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-sm-6">
                                <input type="submit" name="report5" value="See Report" class="btn btn-ilpc" id="report5_submit"/>
                            </div>
                        </div>
                    </div>

                    <!-- ini aneh tampilan webnya
                    <table>
                        <tr>
                            <td align="right">Competition : &nbsp</td>
                            <td>
                                <select name="kompetisi" id="report4_kompetisi">
                                    <option value="id">--Select Competition--</option>
                                    <?php
                                    foreach ($kompetisi as $row) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['tahun'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Logic Contest : &nbsp</td>
                            <td>
                                <select name="kontesx" id="report4_kontes">
                                    <option value="id">--Select Contest--</option>
                                </select>
                            </td>
                        </tr>
                        <div id="report_5" title="Report 5">
                            <tr>
                                <td align="right">Programming Contest : &nbsp</td>
                                <td>
                                    <select name="kontesy" id="report5_kontes">
                                        <option value="id">--Select Contest--</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">
                                    <input type="submit" name="report5" value="See Report" class="btn btn-ilpc" id="report5_submit"/></td>
                            </tr>
                    </table>
                    -->
                </form>
            </div>
        </div>
    </div>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
<script>
    $(document).ready(function() {
        $("#report4").click(function(e) {
            e.preventDefault();
            $("#report4_kompetisi").val("-1");
            $("#report4_kontes").load("<?php echo base_url() ?>admin/soal/getKontesPilgan", {
                "kompetisi": -1
            });
            $("#report_4").dialog({
                resizable: false,
                draggable: false,
                modal: true,
                width: 360
            });
        });
        $("#report5").click(function(e) {
            e.preventDefault();
            $("#report5_kontes").load("<?php echo base_url() ?>admin/soal/getKontesPemrograman", {
                "kompetisi": -1
            });
            $("#report_5").dialog({
                resizable: false,
                draggable: false,
                modal: true,
                width: 360
            });
        });
        $("#report4_kompetisi").click(function() {
            var kompetisi = $("#report4_kompetisi").val();
            if (kompetisi == -1) {
                $("#report4_submit").attr('disabled', 'disable');
            }
            $("#report4_kontes").load("<?php echo base_url() ?>admin/soal/getKontesPilgan", {
                "kompetisi": kompetisi
            });
            $("#report5_kontes").load("<?php echo base_url() ?>admin/soal/getKontesPemrograman", {
                "kompetisi": kompetisi
            });
        });
        $("#report4_kontes").click(function() {
            var kontesx = $("#report4_kontes").val();
            if (kontesx != -1) {
                $("#report4_submit").removeAttr('disabled');
            } else {
                $("#report4_submit").attr('disabled', 'disabled');
            }
        });
        $("#report5_kontes").click(function() {
            var kontesy = $("#report5_kontes").val();
            if (kontesy != -1) {
                $("#report5_submit").removeAttr('disabled');
            } else {
                $("#report5_submit").attr('disabled', 'disabled');
            }
        });
    });
</script>

