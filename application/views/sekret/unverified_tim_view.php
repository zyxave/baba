<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 10/12/2015
 * Time: 3:55 PM
 */
?>

<h1>Tim yang Menunggu Verifikasi Pembayaran</h1>
<div class="row">
    <div class="col-xs-12 col-lg-10">
        <div class="row">
            <?php if(isset($searchKeyword)) : ?>
                <div class="col-xs-12 col-sm-8">
                    <div>
                        Menampilkan tim dengan keyword <b><?php echo $searchKeyword; ?></b>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-2">
                    <form method="get" action="<?php echo base_url(); ?>admin/registration/reset_search_unverified">
                        <input type="submit" value="Reset Search" name="resetSearch" class="btn btn-ilpc">
                    </form>
                </div>

            <?php else : ?>
                <!--<div class="col-xs-12">
                    <div>
                        Menampilkan semua tim
                    </div>
                </div>-->
            <?php endif; ?>
        </div>
        <div class="row">
            <form action="<?php echo site_url('admin/Registration/unverified_team_list'); ?>" method="post">
                <p>
                    <div class="col-xs-8 col-sm-3"><input type="search" name="cari" placeholder="Search Keyword..." class="form-control"></div>
                    <div class="col-xs-4 col-sm-2"><input type="submit" name="btn" value="Search" class = "btn btn-ilpc"></div>
                </p>
            </form>
        </div>
            <?php
            if (isset($_SESSION['pesan']))
            {
                echo "<p class='info'>" . $_SESSION['pesan'] . "</p>";
            }

            if(isset($_SESSION['pesanSukses'])) : ?>
                <div class="success-box">
                    <?php echo $_SESSION['pesanSukses']; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="pagination" style="float:left;"> <?php echo (!empty($pagerMessage) ? $pagerMessage : '');?></div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
                </div>
            </div>
            <div class="row mytab">
                <div class="col-xs-12 col-sm-1">No</div>
                <div class="col-xs-12 col-sm-2">Nama</div>
                <div class="col-xs-12 col-sm-3">Sekolah</div>
                <div class="col-xs-12 col-sm-2">Tanggal Pendaftaran</div>
                <div class="col-xs-12 col-sm-2">Status</div>
                <div class="col-xs-12 col-sm-2">Action</div>
            </div>
            <div class="row">
            <?php
            if(count($listunverifiedtim) > 0) {
                foreach ($listunverifiedtim as $row) {
                    ?>
                    <div class="col-xs-12">
                        <div class="databox">
                            <div class="row">
                                <div class="col-xs-2 col-sm-1"><div class="noUrut"><?php echo $no; ?></div></div>
                                <div class="col-xs-10 col-sm-2"><?php echo $row['nama']; ?></div>
                                <div class="col-xs-12 col-sm-3"><?php echo $row['sekolah']. '<br>' .$row['kabupaten']; ?></div>
                                <div class="col-xs-12 col-sm-2"><?php echo $row['tgl_daftar']; ?></div>
                                <div class="col-xs-12 col-sm-2"><?php echo $row['status'];  ?></div>
                                <div class="col-xs-4 col-sm-2">
                                    <a href="<?php echo base_url() . "admin/registration/unverified_team_list_detail/" . $row['id'] ?>" class="btn btn-ilpc">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $no++;
                }
            }
            else{ ?>
                <div class="col-xs-12">
                    <div>
                        Tim tidak ditemukan
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div style="float:left;"> <?php echo (!empty($pagerMessage) ? $pagerMessage : ''); ?></div>
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