<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/1/2016
 * Time: 6:41 PM
 */
?>
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
                        <a href="<?php /*echo base_url(). 'admin/logika/submission/' . $contest['id'] */?>">Submission</a>
                    </div>-->
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/clarification/'. $contest['id'] ?>">Clarification</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/problems/' . $contest['id'] ?>" class="cur">Soal</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/score/' . $contest['id']?>">Score</a>
                    </div>
                    <div class="proglink">
                        <a href="<?php echo base_url(). 'admin/logika/team_list/'. $contest['id'] ?>">Team List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h1>Buat Soal</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="r-box">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url() . 'admin/logika/create_problem'?>">
                <input type="hidden" value="<?php echo $contest['id'];?>" name="contestId">
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-2">
                        <label class="md-right">Isi</label>
                    </div>
                    <div class="col-xs-12 col-sm-10">
                        <textarea id="soal" name="isi"><?php echo set_value("isi",''); ?></textarea>
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
                        <textarea id="a" name="a"><?php echo set_value("a",''); ?></textarea>
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
                        <textarea id="b" name="b"><?php echo set_value("b",''); ?></textarea>
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
                        <textarea id="c" name="c"><?php echo set_value("c",''); ?></textarea>
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
                        <textarea id="d" name="d"><?php echo set_value("d",''); ?></textarea>
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
                        <textarea id="e" name="e"><?php echo set_value("e",''); ?></textarea>
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
                        </select>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-xs-12 col-sm-7 col-sm-offset-3">
                        <input type="submit" name="createProblem" value="Submit" class="btn btn-ilpc">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . 'asset/2016/js/tinymce/tinymce.min.js';?>"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#soal',
        toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
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
