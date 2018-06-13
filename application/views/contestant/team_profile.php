<?php
$jmlhAnggota = count($anggota);
?>
<div class="row profil">
    <div class="col-xs-12">
            <h2 align="center">Info Tim</h2>
            <div class="team-box">
                <h3 class="">Nama Tim : <?php echo $tim['nama_tim'] ?> </h3>
                <?php /*<div> <a class="custom-btn" href="<?php echo base_url() ?>index.php/team/change_team_data/<?php echo $this->session->userdata('login_id') ?>">
                        <span class="fa fa-pencil"></span> Ubah Data Tim</a>
                </div>*/?>
            </div>
            <div class="row">
                <?php $counter = 1;
                foreach($anggota as $row) : ?>
                    <div class="col-xs-12" align="center">
                        <section class="contactbox">

                            <h4> Anggota <?php echo $counter; echo $row['status'] == 'cadangan' ? ' (Cadangan)' : ($counter == 1 ? ' (Ketua)' : '') ; ?> </h4>
                            <div class="row">
                                <div class="col-xs-12" align="center">

                                    <a href="<?php echo base_url() . 'contestant/edit_profile/' . $row['id'];?>" class="btn btn-ilpc"><i class="fa fa-pencil"></i> Ubah Profil</a> <br><br>
                                </div>
                            </div>


                            <div class="student-id">
                                <a href="<?php //echo base_url() . $row['kartu_pelajar'] ?>"><img class="img-responsive" src="<?php echo base_url() . $row['kartu_pelajar'] ?>"></a>
                            </div>
                            <div class="col-xs-12 col-sm-6 team-container" align="left">
                            <div class="row no-gutter" style="padding-top:10px;">
                                <div class="col-xs-4 col-sm-5 mylabel"> Nama : </div>
                                <div class="col-xs-3 col-sm-7"><div class="mylabeldata"><?php echo $row['nama'] ?> </div></div>
                            </div>
                            <div class="row no-gutter">
                                <div class="col-xs-4 col-sm-5 mylabel"> Kelas : </div>
                                <div class="col-xs-3 col-sm-7"><div class="mylabeldata"><?php echo $row['kelas'] ?> </div></div>
                            </div>
                            <div class="row no-gutter">
                                <div class="col-xs-4 col-sm-5 mylabel"> No. HP : </div>
                                <div class="col-xs-3 col-sm-7"><div class="mylabeldata"><?php echo $row['hp'] ?> </div></div>
                            </div>
                            <div class="row no-gutter">
                                <div class="col-xs-4 col-sm-5 mylabel"> Email : </div>
                                <div class="col-xs-3 col-sm-7"><div class="mylabeldata"><?php echo $row['email'] ?> </div></div>
                            </div>
                            <div class="row no-gutter">
                                <div class="col-xs-4 col-sm-5 mylabel"> Alergi Makanan : </div>
                                <div class="col-xs-3 col-sm-7"><div class="mylabeldata"><?php echo $row['alergi'] ?> </div></div>
                            </div>
                            <div class="row no-gutter">
                                <div class="col-xs-4 col-sm-5 mylabel"> Vegetarian : </div>
                                <div class="col-xs-3 col-sm-7"><div class="mylabeldata"><?php echo $row['vegetarian'] == 'YA' ? 'Ya' : 'Tidak' ?> </div></div>
                            </div>
                            <div class="row no-gutter">
                                <div class="col-xs-4 col-sm-5 mylabel"> Ukuran Baju : </div>
                                <div class="col-xs-3 col-sm-7"><div class="mylabeldata"><?php echo $row['ukuran_baju'] == 'BIG' ? 'Big' : 'Regular' ?> </div></div>
                            </div>
                            </div>
                            <br>
                            <br>
                        
                        
                        </section>
                    </div>
                    <?php
                    $counter++;
                endforeach; ?>

            </div>

            <?php /*<div class="row">
                <div class="small-12 column">
                    <div class="i-box transfer">
                        <h4>Bukti Transfer</h4>
                        <a href="<?php echo base_url() . $tim['bukti_transfer'] ?>"><img src="<?php echo base_url() . $tim['bukti_transfer'] ?>" alt="Bukti Transfer"></a>

                    </div>
                </div>
            </div> */ ?>
    </div>
</div>

<div class="row profil-guru">
    <div class="col-xs-offset-1 col-xs-10 col-sm-12 col-md-offset-1 col-md-10">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h2 class="text-center">Info Sekolah</h2>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> Nama Sekolah :</div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6">
                        <div class="mylabeldata"><?php echo $tim['nama_sekolah'] ?> </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> Kota/Kabupaten :</div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6"> 
                        <div class="mylabeldata"><?php echo $tim['kab'] ?> </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> Alamat : </div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6"> 
                        <div class="mylabeldata"><?php echo $tim['alamat'] ?> </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">  
                <h2 class="text-center">Info Guru</h2>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> Nama Guru : </div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6">
                        <div class="mylabeldata"><?php echo $tim['nama_guru'] ?></div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> Email : </div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6">
                        <div class="mylabeldata"><?php echo $tim['email'] ?> </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> No. Telp :</div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6">
                        <div class="mylabeldata"><?php echo $tim['telp'] ?> </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> Alergi :</div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6">
                    <?php if($tim['alergi'] === '') : ?>
                        <div class="mylabeldata">Tidak ada</div> 
                    <?php elseif($tim['alergi'] !== '') : ?>
                        <div class="mylabeldata"><?php echo $tim['alergi'] ?></div> 
                    <?php endif; ?>                           
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-4 mylabel text-right"> Vegetarian :</div>
                    <div class="col-xs-6 col-sm-offset-1 col-sm-6">
                        <div class="mylabeldata"><?php echo $tim['vegetarian'] == 'YA' ? 'Ya' : 'Tidak' ?> </div> 
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['addReserveSucceed']))
        {
                    echo '<script language="javascript">';
                    echo 'alert(" Anggota cadangan telah berhasil ditambahkan")';
                    echo '</script>';
        }
        else if(isset($_SESSION['editProfileSucceed']))
                    {

                    echo '<script language="javascript">';
                    echo 'alert("Profil Anggota Tim Berhasil Diubah")';
                    echo '</script>';
                    }


        ?>
      