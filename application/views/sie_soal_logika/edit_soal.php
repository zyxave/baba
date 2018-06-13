<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/2/2016
 * Time: 12:08 AM
 */?>
 <div class="row">
    <div class="col-xs-12">
        <br>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(). 'admin/logika/contest'?>"></a></li>
            <li><a href="<?php echo base_url(). 'admin/logika/problems/' . $soal['id_kontes'];?>">List Soal<?php ?></a></li>
            <li><a href="<?php echo base_url(). 'admin/logika/see_problem/' . $soal['id'];?>">Soal <?php echo $soal['nomor']; ?></a></li>
            <li class="active">Edit Soal <?php echo $soal['nomor'];?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-xs-3 col-md-2">
        <!--<a href="<?php /*echo base_url(). 'admin/logika/see_problem/' . $soal['id'];*/?>" class="btn btn-ilpc"><i class="fa fa-arrow-left"></i>Back</a>-->
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
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url() . 'admin/logika/update_problem'?>">
                <input type="hidden" value="<?php echo $soal['id'];?>" name="problemId">
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Isi</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="soal" name="isi"><?php echo set_value("isi",$soal['soal']); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('isi');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">A</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="a" name="a"><?php echo set_value("a",$a['isi']); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('a');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">B</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="b" name="b"><?php echo set_value("b",$b['isi']); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('b');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">C</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="c" name="c"><?php echo set_value("c",$c['isi']); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('c');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">D</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="d" name="d"><?php echo set_value("d",$d['isi']); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('d');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">E</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="e" name="e"><?php echo set_value("e",$e['isi']); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <span class="pesanSalah"><?php echo form_error('e');?></span>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Jawaban :</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <select name="jawaban">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                            <option value="e">E</option>
                            <?php if($soal['jawaban'] == 'a') {
                                ?>
                                <option selected value="a">A</option>
                                <?php
                            } else if($soal['jawaban'] == 'b'){?>
                                <option selected value="b">B</option>
                                <?php
                            } else if($soal['jawaban'] == 'c'){?>
                                <option selected value="c">C</option>
                                <?php
                            } else if($soal['jawaban'] == 'd'){?>
                                <option selected value="d">D</option>
                                <?php
                            } else if($soal['jawaban'] == 'e'){?>
                                <option selected value="e">E</option>
                                <?php
                            }?>
                        </select>
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
        selector: '#soal',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect | link image',
        toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
        relative_urls : false,
        document_base_url : '<?php echo base_url() ?>',
        paste_data_images: true

    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#a',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
        toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
        relative_urls : false,
        document_base_url : '<?php echo base_url() ?>',
        paste_data_images: true

    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#b',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
        toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
        relative_urls : false,
        document_base_url : '<?php echo base_url() ?>',
        paste_data_images: true

    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#c',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
        toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
        relative_urls : false,
        document_base_url : '<?php echo base_url() ?>',
        paste_data_images: true

    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#d',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
        toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
        relative_urls : false,
        document_base_url : '<?php echo base_url() ?>',
        paste_data_images: true

    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#e',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
        toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
        relative_urls : false,
        document_base_url : '<?php echo base_url() ?>',
        paste_data_images: true

    });
</script>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>
