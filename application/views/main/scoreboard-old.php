<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/6/2016
 * Time: 2:03 PM
 */?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $contest['nama'] ?> SCOREBOARD</title>
    <link href="<?php echo base_url(); ?>asset/2016/pics/favicon.png" rel="icon" type="image/png"/>
    <meta name="author" content="ILPC UBAYA Information System" >
    <meta name="keywords" content="Lomba Logika, Lomba Pemrograman, Lomba Logika dan Pemrograman, Lomba SMA, ILPC, UBAYA, ILPC 2016, ILPC UBAYA">
    <meta name="description" content="ILPC UBAYA merupakan lomba logika dan pemrograman untuk pelajar SMA/sederajat seluruh Indonesia yang diselenggarakan oleh Jurusan Teknik Informatika Universitas Surabaya">
<?php if (isset($autoRefresh)) :?>
    <meta http-equiv="refresh" content="30;url=<?php echo base_url() ?>scoreboard/contest/<?php echo $contest['id']?>" />
<?php endif; ?>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700|Montserrat:400,700|Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/css/teamstyle_070116.css';?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'asset/2016/font-awesome/css/font-awesome.min.css';?>">
    <style>
        table{border-collapse: collapse;}
        th{text-align: center; border: 1px solid #3F3F3F; padding: 4px;}
        tbody td{border: 1px solid #3F3F3F; padding: 4px 3px;}
        tfoot td{border: 1px solid #5b1d12; padding: 4px 0px;}
        .ctr{text-align: center;} .ac{background-color: #91f271;} .wa{background-color: #E03833; color:#F0F0EE;}
        .kab,.sekolah{padding-left: 6px; line-height: 1;} .tim{font-weight: bold}
    </style>
</head>
<body>
<div id="wrap" style="background-color: #FFF">
    <header class="ilpc-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-3">
                    <div class="top-ubaya top-logo">
                        <a href="http://ubaya.ac.id" target="_blank">
                            <img src="<?php echo base_url();?>asset/2016/pics/logoUbaya.png">
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-3 col-sm-3 col-xs-4">
                    <div class="top-newilpc top-logo">
                        <a href="<?php echo base_url();?>home">
                            <img src="<?php echo base_url();?>asset/2016/pics/logoNew.png"> </a>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-5">
                    <div class="top-ilpc top-logo">
                        <img src="<?php echo base_url();?>asset/2016/pics/logoIlpc.png">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper-md">
        <div class="container-fluid">
            <div style="margin-left:auto;margin-right: auto;" id="scoreboard">
                <h2 class="ctr"><?php echo $contest['nama'] ?> - SCOREBOARD</h2>
                <div class="row">
                <?php if(isset($freeze)) :?>
                    <div class="col-xs-12">Scoreboard sudah dibekukan (freezed). Scoreboard berisi hasil akhir akan dibuka <?php echo $freezeOpenAfter;?> menit setelah kontes berakhir.
                        Tiap tim masih dapat melihat status submission timnya sendiri melalui halaman History Submission.
                    </div>
                <?php elseif(isset($finalScore)) : ?>
                    <div class="col-xs-12"><div style="text-align: center">Hasil Akhir :</div></div>
                <?php endif; ?>
                <?php if(isset($autoRefresh)) :?>
                    <div>Scoreboard akan dibekukan pada <?php echo date('d-M-Y', strtotime($contest['tanggal'])) . " , " . $contest['waktu_freeze'];?> WIB. <br>Saat scoreboard dibekukan, tim hanya dapat melihat hasil jawabannya sendiri pada halaman History Submission</div>
                <?php endif; ?>
                </div>
                <table id="scoreboard" style="margin: 6px auto 0">
                    <thead>
                        <tr style="background-color: #FFE346">
                            <th width="55px">RANK</th>
                            <th width="300px">TEAM</th>
                            <th width="60px">SOLVED</th>
                            <th width="60px">TIME</th>
                            <?php
                            foreach ($problem as $row) {
                                ?>
                                <th width="60px"><?php echo $row['nomor'] ?></th>
                                <?php
                            }
                            ?>
                            <th width="70px">ATT/SOLVED</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    $ac = -1;
                    $time = -1;
                    foreach ($scoreboard as $row) :
                        if (!(($row['jumlah_ac'] == $ac) && ($row['time'] == $time))) :
                            $no++;
                        endif; ?>
                        <tr>
                            <td align="center"><?php echo $no ?></td>
                            <td>
                                <span class="tim"><?php echo $row['nama_tim'] ?></span><br/>
                                <span class="sekolah"><?php echo $row['nama_sekolah'] ?></span>
                                <div class="kab"><?php echo $row['kabupaten']?></div>
                            </td>
                            <td align="center"><?php echo $row['jumlah_ac'] ?></td>
                            <td align="center"><?php echo $row['time'] ?></td>
                            <?php
                            $tot = 0;
                            foreach ($row['soal'] as $soal) :
                                $tot += $soal['att'];
                            ?>
                                <td  align="center"<?php
                                    if ($soal['att'] > 0 && $soal['time'] != -1) {
                                        echo "class='ac'";
                                    } else if ($soal['att'] > 0 && $soal['time'] == -1) {
                                        echo "class='wa'";
                                    }?>>
                                    <?php
                                    echo $soal['att'] . "/";
                                    if ($soal['time'] == -1) {
                                        echo "--";
                                    } else {
                                        $waktu = $soal['time'] - (20 * (($soal['att']) - 1));
                                        echo $waktu;
                                    } ?>
                                </td>
                            <?php endforeach; ?>
                            <td class="ctr"><?php echo $tot . "/" . $row['jumlah_ac'] ?></td>
                            <?php
                            $ac = $row['jumlah_ac'];
                            $time = $row['time']; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr style="background-color:#EA2E7F;color: white;">
                            <td colspan="4" align="center">Total (attempt/solved)</td>
                            <?php
                            $totAtt = 0;
                            $totAc = 0;
                            foreach ($hasil as $kolom) {
                                $totAtt+=$kolom['att'];
                                $totAc+=$kolom['ac'];
                                ?>
                                <td align='center'><?php echo $kolom['att'] . '/' . $kolom['ac'] ?></td>
                                <?php
                            }
                            echo "<td align='center'>" . $totAtt . "/" . $totAc . "</td>";
                            ?>
                        </tr>
                    </tfoot>
                </table>
                <p class="ctr" style="margin-top: 12px">
                    Copyright &copy; ILPC-Universitas Surabaya<br />
                </p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . 'asset/2016/jquery-1.11.3.min.js'?>"></script>
<script src="<?php echo base_url() . 'asset/2016/bootstrap/js/bootstrap.min.js'?>"></script>
</body>
</html>

