<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/28/2015
 * Time: 7:19 PM
 */
?>
<div class="row">
    <div class="col-xs-12 col-lg-12">
        <h1>Daftar Guru</h1>
        <div class="row">
            <?php if(isset($searchKeyword)) : ?>
            <div class="col-xs-12 col-sm-8">
                <div>
                    Menampilkan guru dengan keyword <b><?php echo $searchKeyword; ?></b>
                </div>
            </div>

            <div class="col-xs-6 col-sm-2">
                <form method="get" action="<?php echo base_url(); ?>admin/sekretariat/reset_search_teacher">
                    <input type="submit" value="Reset Search" name="resetSearch" class="btn btn-ilpc">
                </form>
            </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <form action="<?php echo site_url('admin/sekretariat/teacher_list'); ?>" method="post">
                <p>
                <div class="col-xs-8 col-sm-3"><input type="search" name="cari" placeholder="Search Keyword..." class="form-control"></div>
                <div class="col-xs-4 col-sm-2"><input type="submit" name="btn" value="Search" class = "btn btn-ilpc"></div>
                </p>
            </form>
        </div>
        <div class="row">
            <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
            <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : '');?></div>
        </div>
        <div class="row mytab">
            <div class="col-xs-12 col-sm-1">No</div>
            <div class="col-xs-12 col-sm-2">Nama Guru</div>
            <div class="col-xs-12 col-sm-4">Email</div>
            <div class="col-xs-12 col-sm-2">No Telp</div>
            <div class="col-xs-12 col-sm-2">Nama Sekolah</div>
            <div class="col-xs-12 col-sm-1">Jumlah Tim</div>
        </div>
        <div class="row">
        <?php
        if(count($listteacher) > 0) :
            foreach ($listteacher as $row) { ?>
                <div class="col-xs-12 databox">

                    <div class="row">
                        <div class="col-xs-2 col-sm-1"><div class="noUrut"><?php echo $no; ?></div></div>
                        <div class="col-xs-10 col-sm-2"><?php echo $row['nama']; ?></div>
                        <div class="col-xs-12 col-sm-4"><?php echo $row['email']; ?></div>
                        <div class="col-xs-12 col-sm-2"><?php echo $row['telp']; ?></div>
                        <div class="col-xs-12 col-sm-2">
                            <?php echo $row['namasekolah'] . ' , ' . $row['kab']; ?>
                        </div>
                        <div class="col-xs-12 col-sm-1"><?php echo $row['jumlahTim']; ?></div>
                    </div>
                </div>
                <?php
                $no++;
            }
        else : ?>
            <div class="col-xs-12">
                <div> Tim Tidak Ditemukan
                </div>
            </div>
        <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div> <?php echo (!empty($pagerMessage) ? $pagerMessage : ''); ?></div>
            </div>
        </div>
        <div class="row">
            <nav>
                <div style="float:right;">
                    <ul class="pagination">
                        <?php echo $paginglinks; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<?php echo $jquery . $bootstrapJs; ?>