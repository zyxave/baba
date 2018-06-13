<div class="container-fluid">
	<div style="margin-left:auto; margin-right: auto;" class="konten-scoreboard">
		<h2 class="judul-contest" style="text-align:center;"> <?php echo $contest['nama'] ?> - SCOREBOARD</h2>
		<div class="row konten-scoreboard2">
			<?php if(isset($freeze)) :?>
				<div class="col-xs-12" style="text-align:center;">Scoreboard sudah dibekukan (freezed). Scoreboard berisi hasil akhir akan dibuka setelah <b><?php echo date('d-m-Y H:i', strtotime($freezeOpenAfter));?></b>.<br>
				Tiap tim masih dapat melihat status submission timnya sendiri melalui halaman History Submission.
				</div>
			<?php elseif(isset($finalScore)) : ?>
    			<div class="col-xs-12">
    				<div style="text-align: center">
    					<h2 class="judul-contest"> Hasil Akhir : </h2> 
    				</div>
    			</div>
            <?php elseif(isset($autoRefresh)) :?>
				<div>Scoreboard akan dibekukan pada <?php echo date('d-M-Y', strtotime($contest['tanggal'])) . " , " . $contest['waktu_freeze'];?> WIB. <br>Saat scoreboard dibekukan, tim hanya dapat melihat hasil jawabannya sendiri pada halaman History Submission</div>
			<?php endif; ?>
		</div>
    	<div class="table-scoreboard">
    			<table class="table table-hover table-scoreboard2 table-bordered" style="margin: 6px auto 0">
    				<thead>
    					<tr>
    						<th width="55px" class="text-center">RANK</th>
    						<th width="300px">TEAM</th>
    						<th width="60px" class="text-center">SOLVED</th>
    						<th width="60px" class="text-center">TIME</th>
    						<?php
    							foreach ($problem as $row) {
    						?>
    						<th width="60px" class="text-center"><?php echo $row['nomor'] ?></th>
    						<?php
    							}
    						?>
    						<th width="70px" class="text-center">ATT/SOLVED</th>
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
                                <td align="center" style="vertical-align: middle;"><?php echo $no ?></td>
                                <td>
                                    <span class="tim"><?php echo $row['nama_tim'] ?></span><br/>
                                    <span class="sekolah"><?php echo $row['nama_sekolah'] ?></span>
                                    <div class="kab"><?php echo $row['kabupaten']?></div>
                                </td>
                                <td align="center" style="vertical-align: middle;"><?php echo $row['jumlah_ac'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?php echo $row['time'] ?></td>
                                <?php
                                $tot = 0;
                                foreach ($row['soal'] as $soal) :
                                    $tot += $soal['att'];
                                ?>
                                    <td align="center"<?php
                                        if ($soal['att'] > 0 && $soal['time'] != -1) {
                                            echo "class='ac'";
                                        } else if ($soal['att'] > 0 && $soal['time'] == -1) {
                                            echo "class='wa'";
                                        }?> style="vertical-align: middle;">
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
                                <td align="center" style="vertical-align: middle;"><?php echo $tot . "/" . $row['jumlah_ac'] ?></td>
                                <?php
                                $ac = $row['jumlah_ac'];
                                $time = $row['time']; ?>
                            </tr>
                        <?php endforeach; ?>
    				</tbody>
    				<tfoot>
    					<tr style="background-color:#ffca09;color:#161616;">
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
    	</div>
	</div>
</div>