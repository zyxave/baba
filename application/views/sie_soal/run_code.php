<?php
/**
 * User: Chris
 * Date: 19/11/2015
 * Time: 20:02
 */
?>
<div class="row">
    <div class="col-sm-12 col-xs-10">
        <?php if(isset($_SESSION['uploadResult'])) : ?>
        <div class="i-box">
            <h4>Run Code Result</h4>
            <?php foreach($_SESSION['uploadResult'] as $key => $status) :
                echo $key . " : " . $status . "<br>";
            endforeach;
            echo "verdict : " . $_SESSION['result'] . "<br>";
            echo "Run Time : " . $_SESSION['runtime'] . "<br>";
            ?>
            <div>
               <!-- <a href="<?php echo base_url(); ?>admin/soal/download_run_result">Download Last Run Result File</a> -->
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <h3>Run Code</h3>
        <div>Silahkan masukkan file source code beserta file input anda</div>

    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <?php if(isset($_SESSION['errors'])) : ?>
        <div class="warn-box">
            <h4>Failed to run code</h4>
            <?php foreach($_SESSION['errors'] as $error) :
                echo $error . "<br>";
            endforeach;
            ?>
        </div>
        <?php endif; ?>
        <div class="r-box">
            <form action="<?php echo base_url(); ?>admin/soal/run_code" method="post" enctype="multipart/form-data">
                <div class="row form-row">
                    <div class="col-sm-6"><label>Input File yang mau diuji</label></div>
                    <div class="col-sm-6">
                        <input type="file" name="file_input">
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-6"><label>Source code file</label></div>
                    <div class="col-sm-6">
                        <input type="file" name="file_solusi">
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-6">
                        <input type="submit" value="Run Code" name="btnRunCode" class="btn btn-ilpc">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2">
      <a target="_blank" href="<?php echo base_url('asset/runcode_result/result.out'); ?>" class="btn btn-primary">Download Last Run Result File</a>
    </div>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>