<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 26/12/2015
 * Time: 15:02
 */?>
 <div class="row">
    <div class="col-xs-12">
        <br>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(). 'admin/programming/contest'?>"></a></li>
            <li><a href="<?php echo base_url(). 'admin/programming/problems/' . $soal['id_kontes'];?>">List Soal<?php ?></a></li>
            <li><a href="<?php echo base_url(). 'admin/programming/see_problem/' . $soal['id'];?>">Soal <?php echo $soal['nomor'] . " - " . $soal['judul']; ?></a></li>
            <li class="active">Edit Soal <?php echo $soal['nomor'] .' - ' . $soal['judul'];?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-xs-3 col-md-2">
        <!--<a href="<?php /*echo base_url(). 'admin/programming/see_problem/' . $soal['id'];*/?>" class="btn btn-ilpc"><i class="fa fa-arrow-left"></i>Back</a>-->
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h1>Edit Soal</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="r-box">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url() . 'admin/programming/update_problem'?>">
                <input type="hidden" value="<?php echo $soal['id'];?>" name="problemId">
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Judul Soal</label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <input type="text" name="judul" value="<?php echo set_value("judul",$soal['judul']); ?>" class="cust-control">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('judul');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Pembuat Soal</label>
                    </div>
                    <div class="col-xs-12 col-sm-5">
                        <input type="text" name="pembuat" value="<?php echo set_value("pembuat",$soal['pembuat']); ?>" class="cust-control">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('pembuat');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Time Limit (detik)</label>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <input type="text" name="timeLimit" value="<?php echo set_value("timeLimit",$soal['time_limit']); ?>" class="cust-control">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('timeLimit');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Deskripsi</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="description" name="deskripsi"><?php echo set_value("deskripsi",$soal['deskripsi']); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('deskripsi');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Input File (.in)</label>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <input type="file" name="inputFile">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php if(isset($_SESSION['inputFileError'])) : echo $_SESSION['inputFileError']; endif; ?>
                        </span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Output File (.out)</label>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <input type="file" name="outputFile">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-3">
                        <span class="pesanSalah"><?php if(isset($_SESSION['outputFileError'])) : echo $_SESSION['outputFileError']; endif; ?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-7 col-sm-offset-3">
                        <input type="submit" name="editSoal" value="Submit" class="btn btn-ilpc">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . 'asset/2016/js/tinymce/tinymce.min.js';?>"></script>
<script type="text/javascript">
    tinymce.init({
        plugins: [ 
        'advlist autolink lists link image charmap print preview hr anchor pagebreak', 
        'searchreplace wordcount visualblocks visualchars code fullscreen', 
        'insertdatetime media nonbreaking save table contextmenu directionality', 
        'emoticons template paste textcolor colorpicker textpattern imagetools' 
        ],
        selector: '#description',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
        toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
        paste_data_images: true


    });
</script>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
