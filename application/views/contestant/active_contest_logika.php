
<div class="row logika">
    <div class="container judul-logika">
        <div class="container-fluid">
            <!-- Sementara pemberitahuan ditaruh di halaman ini ??? -->
            <?php if(isset($_SESSION['submitSucceed'])) : ?>
                <div class="row">
                    <div class="col-sm-offset-4 col-sm-4">
                        <div class="alert alert-berhasil text-center">
                            Jawaban Berhasil Terkirim
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- end of pemberitahuan -->

            <h1 class="text-center"><?php echo $_SESSION['nama_kontes'];?></h1>
            <h4 class="text-center">Kontes Logika</h4>
            <p class="text-center keterangan-kontes-logika" style="font-size: 1.2em">
                Bacalah soal sebaik-baiknya. Setiap jawaban benar akan memperoleh poin <strong><?php echo $poin["poin_benar"] ?></strong> dan setiap jawaban yang salah memperoleh poin <strong><?php echo $poin["poin_salah"] ?></strong>. Sedangkan tidak menjawab memperoleh poin <strong><?php echo $poin["poin_kosong"] ?></strong>. Apabila ada soal yang kurang jelas, klik tombol (?) yang ada dibagian kiri halaman untuk bertanya pada panitia.
                Jangan lupa untuk klik tombol submit dibagian bawah utuk mengirimkan jawaban.
                Jika <b style="color: red">TIDAK klik tombol submit SEBELUM WAKTU PENGERJAAN BERAKHIR, jawaban TIDAK AKAN TERSIMPAN.</b> <strong><em>Apabila submit lebih dari satu kali, jawaban yang kami nilai adalah jawaban yang terakhir kali di-submit.</em></strong> 
            </p>
        </div>
    </div>
</div>

<div class="row bagian-soal-logika">
    <div class="container-fluid">
        <div class="clarification-button" title="Clarification : Tempat bertanya ke panitia.">
            <a href="<?php echo base_url('contest/clarification'); ?>" target="_blank"><img class="center-block" src="<?php echo base_url('asset/2017/img/clarification.png'); ?>" width="30px" style="transform: translateY(0px);"></a>
        </div>   
        <div class="container">
            <form method="post" action="<?php echo base_url() . 'contest/submit_multiple_choice' ?>">

                <!-- generate pertanyaan (FOREACH) -->

                <?php foreach($problems as $key => $problem) : ?>
                    <div class="card per-soal-logika">
                        <h2 class="nomor-soal"><?php echo $problem['nomor']; ?></h2>
                        <p class="isi-soal"><?php echo $problem['isi']; ?></p>
                        <div class="jawaban-logika" style="width: 100%;">
                            <?php foreach($options[$key] as $option) : ?>
                               <?php  
                               $jawabanTim = $problem["jawabanTim"];
                               $urutan = $option['urutan'];
                               $problemNo = $problem['nomor'];
                               $isi = $option['isi'];

                               $session_index = 'nomor' . $problemNo;
                               $jawaban_array = array();
                               if(isset($_SESSION['kontes'])){
                                $jawaban_array = $_SESSION['kontes']; 
                               }
                               

                               if(isset($jawaban_array[$session_index])){
                                  $jawabanTim = $jawaban_array[$session_index];
                               }

                               if(!empty($jawabanTim))
                               {
                                  if($jawabanTim==$urutan)
                                  {
                                      echo "<div class='radio-inline' style='width: 15.56%;'>";
                                      echo "<label>";
                                      echo "<input type='radio' class='opt' value='$urutan' name='nomor$problemNo' checked>";
                                      echo $isi;
                                      echo "</label>";
                                      echo "</div>";


                                  }else
                                  {

                                     echo "<div class='radio-inline' style='width: 15.56%;'>";
                                     echo "<label>";
                                     echo "<input type='radio' class='opt' value='$urutan' name='nomor$problemNo'>";
                                     echo $isi;
                                     echo "</label>";
                                     echo "</div>";

                                   }
                               }else
                               {
                                  echo "<div class='radio-inline' style='width: 15.56%;'>";
                                  echo "<label>";
                                  echo "<input type='radio' class='opt' value='$urutan' name='nomor$problemNo'>";
                                  echo $isi;
                                  echo "</label>";
                                  echo "</div>";
                              }
                          ?>


                           <!--    <div class="radio-inline" style="width: 15.56%;">
                           <label><input type="radio" value="<?php echo $option['urutan'] ?>" name="nomor<?php echo $problem['nomor']?>"><?php echo $option['isi'] ?></label>
                       </div> -->
                          <?php endforeach; ?>
                          <div class="radio-inline" style="width: 15.56%;">
                          <?php
                             if(empty($jawabanTim) || $jawabanTim == "-")
                             {
                              echo "<label><input type='radio' class='opt' value='-' name='nomor$problemNo' checked><p>Tidak Menjawab</p></label>";
                              }else
                              {

                                  echo "<label><input type='radio' class='opt' value='-' name='nomor$problemNo'><p>Tidak Menjawab</p></label>";
                              }
                          ?>
                  <!--  <label><input type="radio" value="-" name="nomor<?php echo $problem['nomor']?>" checked>Tidak Menjawab</label> -->
              </div>
          </div>
      </div>
      <?php endforeach; ?>
      <!-- end of generate pertanyaan (END FOREACH) -->

      <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 text-center">
          <input class="btn btn-ilpc btn-submit-logika" type="submit" name="submitMultipleChoice" value="Submit Jawaban"/>
      </div>
      </form>
      <script type="text/javascript">
          $(document).ready(function(){
            $('.opt').click(function() {
              var urls ="<?php echo base_url()."contest/save_temp_answer"; ?>"; 
              var jawaban = $(this).val();
              var nomor = this.name;
                $.ajax({
                  method: "get",
                  url: urls,
                  data : {'nomor': nomor, 'jawaban': jawaban}
                })
            });
          });        
      </script>
</div>
</div>
</div>
