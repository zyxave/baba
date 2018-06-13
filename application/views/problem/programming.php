<div class="clarification-button" title="Clarification : Tempat bertanya ke panitia.">
	<a target="_blank" href="<?php echo base_url('contest/clarification');?> "><img class="center-block" src="<?php echo base_url('asset/2017/img/clarification.png'); ?>" width="30px" style="transform: translateY(0px);"></a>
</div>
<div class="bagian-programming">
	<div class="container">

		<div class="card wrapper-md2" style="padding-top:20px; padding-bottom:20px;">
			<div class="container-fluid">
				<div class="judul-soal">
					<div class="col-xs-12 kolom-judul">
						<h1 style="text-align: center; margin-bottom: 0px;"> Soal <?php echo $contestName;?></h1>
					</div>
				</div>
				<div class="row">
					<br>
					<div class="col-xs-12">
						<div class="prob-hdr2">
							<div class="row">
								<div class="col-md-12">
									<h3><?php echo $soal['nomor'] . " - " . $soal['judul'];?></h1>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="tl">Time Limit : <?php echo $soal['time_limit']; echo $soal['time_limit'] == 1 ? ' second' : ' seconds';?></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="author">Author : <?php echo $soal['pembuat'];?></div>
									</div>
								</div>
							</div>
							<div class="narasi2">
								<?php echo $soal['deskripsi']; ?>
							</div>
							<div class="prob-foot">

							</div>
							<div class="konten-submit-source">
								<div class="col-sm-12">
									<h1 class="judul-contest">Submit Source Code</h1>
								</div>
								<div class="row">
									<div class="kolom-source col-sm-12">
										Pastikan file source code jawaban anda memiliki ekstensi yang sesuai seperti di bawah ini :
										<div class="kolom-program">
											<strong> C++ (*.cpp)
												<br>
												JAVA (*.java) 
												<br>
												Pascal (*.pas) </strong>
											</div>
											<p>Maksimum ukuran file adalah <strong>5MB</strong>. <br>Khusus source code Java, file harus bernama <strong>Main.java</strong></p>
										</div>

										<?php if(isset($_SESSION['submitSucceed'])) : ?>
											<div class="alert alert-berhasil col-sm-offset-3 col-sm-6 text-center">
												Source code jawaban telah terkirim
											</div>
										<?php elseif(isset($_SESSION['submitFailed'])) : ?>
											<div class="alert alert-gagal col-sm-offset-3 col-sm-6 text-center">
												Source code jawaban gagal terkirim. Pesan Error :
												<p><?php echo $_SESSION['submitFailed'];?></p>
											</div>
										<?php endif; ?>	

										<div class="col-sm-12">
											<form method="post" action="<?php echo base_url() . 'contest/submit_programming/'. $soal['id']; ?>" enctype="multipart/form-data">

												<div class="form-source col-sm-12">
													<div class="col-sm-offset-3 col-sm-2 rataKanan">Soal :</div>
													<div class="col-sm-5" style="text-align:left;"> <?php echo $soal['judul']; ?></div>							
												</div>
												<div class="form-source col-sm-12">
													<div class="col-sm-offset-1 col-sm-4 rataKanan">File Jawaban : </div>
													<input class="col-sm-5" type="file" name="codeFile"/>
												</div>
												<div class="form-source col-sm-12 center-block">
													<input class="col-sm-4 btn btn-ilpc" style="float:none;" type="submit" name="submitProgramming" value="Submit"/>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>