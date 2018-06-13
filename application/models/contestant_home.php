<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="i-box">
            <h3 style="margin-top: 0; color:#E13300">Pengumuman <i class="fa fa-exclamation-triangle fa-lg"></i></h3>
            <div>
                <strong>7 Januari 2016 15:21</strong>
                <p>Halo Peserta ILPC 2016, TRIAL Programming kami perpanjang hingga pukul 17.00 WIB. Diharapkan kepada semua peserta untuk mencoba Trial Programming ini, terima kasih.</p>
            </div>
            <div>
                <strong>6 Januari 2016</strong>
            <p>Mohon maaf, Trial Programming ditunda menjadi 7 Januari 2016, mulai 14.00 - 16.00 WIB. Hari ini (6 Januari 2016) tetap ada Trial Logika hingga pukul 16.00 WIB.</p>
            <p>Jadwal Penyisihan sudah kami update pada homepage ILPC 2016.<br>Penyisihan Logika dilangsungkan pada <strong>8 Januari 2016, 14.00 - 16.30 WIB</strong>. <br>Sedangkan Penyisihan Programming dilangsungkan pada <strong>9 Januari 2016, 09.00 - 14.00 WIB</strong></p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="i-box">
            <h3 style="margin-top: 0">Petunjuk Trial Penyisihan ILPC</h3>
            <p>Klik Menu <strong>Contest</strong>, lalu klik <strong>Join</strong> pada kontes yang tersedia. Setelah itu anda akan otomatis diarahkan menuju ke menu <strong>Active Contest</strong></p>
            <p>Soal untuk tiap kontes dapat dilihat pada menu Join Contest. </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-8">
        <section>
            <?php /*echo $status . "<br>"; */
            if($status == 'ready') : ?>
                <h3>Status Pendaftaran: Selesai</h3>
                <div>
                    <p>Tim Anda telah resmi terdaftar sebagai peserta ILPC 2016. </p>
                </div>
            <?php else : ?>
                <h3>Status Pendaftaran: Belum Selesai</h3>
                <div>
                    <p>Tim anda <strong class="penting">BELUM RESMI</strong> terdaftar sebagai peserta ILPC 2016. Segera selesaikan pembayaran dan pastikan anda telah mengisi data tim dengan benar</p>
                </div>
            <?php endif; ?>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-8">
        <section>
            <?php if($status == 'ready') : ?>
                <h3>Status Pembayaran: Selesai</h3>
                <div>
                    <p>Pembayaran telah diterima oleh panitia.</p>
                </div>
            <?php elseif($status == 'waiting payment') : ?>
                <h3>Status Pembayaran: Belum Bayar </h3>
                <div>
                    <p>Tim anda belum membayar biaya pendaftaran. Petunjuk pembayaran dapat dilihat pada halaman <a href="<?php echo base_url();?>contestant/payment">Pembayaran</a>
                    </p>
                </div>
            <?php elseif($status == 'unverified payment') : ?>
                <h3>Status Pembayaran: Waiting For Verification</h3>
                <div>
                    <p>Pembayaran Tim anda sedang diproses panitia. Silahkan tunggu hingga 7 hari sejak anda melakukan konfirmasi pembayaran. Apabila status pembayaran anda tidak berubah setelah 7 hari, segera hubungi <a target="_blank" href="<?php echo base_url(); ?>contact">Contact Person</a> kami.</p>
                </div>
            <?php endif; ?>
        </section>
    </div>
</div>