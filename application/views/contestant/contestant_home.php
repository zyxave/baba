<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="i-box">
            <h3 style="margin-top: 0; color:#E13300">Pengumuman </h3>

        <?php    /*<div>
                <strong>9 Januari 2016 22.00 WIB</strong>
                <div>
                    Terima kasih telah mengikuti penyisihan ILPC 2016. Untuk meningkatkan kualitas ILPC berikutnya, kami memohon kepada seluruh peserta ILPC untuk mengisi kuisioner di bawah ini :
                    <ul>
                        <li><a href="http://goo.gl/forms/om1tiShCyd" target="_blank">Kuisioner Pendaftaran ILPC 2016</a></li>
                        <li><a href="http://goo.gl/forms/h4bA1VfG6R" target="_blank">Kuisioner Penyisihan ILPC 2016</a></li>
                    </ul>
                </div>
            </div> */ ?>

            <div>
                <strong>8 Januari 2016 16.00 WIB</strong>
                <div>Kami mohon maaf karena ada kesalahan panduan submission dalam bahasa Pascal sehingga menyebabkan sejumlah tim mendapatkan verdict Compile Error saat Trial Programming. Saat ini panduan tersebut sudah kami ubah. </div>
                <p><strong>Setiap Tim diharapkan mendownload ulang panduan submission programming <a href="https://drive.google.com/file/d/0B-_aLNBXQLy_dFZ4TS1VTHNaTkE/view?usp=sharing" target="_blank">di sini</a></strong></p>
                <p>
                    Nilai N untuk perhitungan poin penyisihan programming adalah 50.
                </p>
                <p><strong>Update peraturan programming dapat dilihat <a href="<?php echo base_url('peraturan')?>" target="_blank">di sini</a></strong><br></p>

            </div>
            <div>
                <strong>7 Januari 2016 15:21 WIB</strong>
                <p>Halo Peserta ILPC 2017, TRIAL Programming kami perpanjang hingga pukul 17.00 WIB. Diharapkan kepada semua peserta untuk mencoba Trial Programming ini, terima kasih.</p>
            </div>
            <div>
                <strong>6 Januari 2016</strong>
                <p>Mohon maaf, Trial Programming ditunda menjadi 7 Januari 2016, mulai 14.00 - 16.00 WIB. Hari ini (6 Januari 2016) tetap ada Trial Logika hingga pukul 16.00 WIB.</p>
                <p>Jadwal Penyisihan sudah kami update pada homepage ILPC 2017.<br>Penyisihan Logika dilangsungkan pada <strong>8 Januari 2016, 14.00 - 16.30 WIB</strong>. <br>Sedangkan Penyisihan Programming dilangsungkan pada <strong>9 Januari 2016, 09.00 - 14.00 WIB</strong></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="i-box">
            <h3 style="margin-top: 0; color:#E13300">Review Trial Programming</h3>
            <div style="margin-top:6px">
                Halo peserta ILPC 2016, terima kasih telah mengikuti sesi Trial Programming. Berikut ini adalah review singkat trial programming dari tim juri :
            </div>
            <div style="margin-top:6px">
                <strong style="color:#E13300">Kesalahan yang Sering Terjadi</strong>
                <div>
                    Tim juri masih mendapatkan sejumlah tim mencetak output yang tidak diminta pada soal seperti "Masukkan input" dan sejenisnya sehingga verdict yang didapat adalah Wrong Answer, walaupun algoritmanya sudah benar. Jadi pastikan karakter yang dicetak sesuai dengan yang diminta soal. Kesalahan ini biasanya dialami oleh tim yang sekolahnya yang belum pernah mengikuti ILPC atau kompetisi programming sejenis.</div>
                <div style="margin-top:6px">
                    Khusus yang menjawab dengan bahasa Java, penggunaan access modifier public pada class Main akan menyebabkan file tidak bisa dicompile. Jadi, jangan lupa untuk menghapus <span style='font-family: "Courier New", Courier, monospace'>public</span> pada deklarasi class Main. Hal ini sudah ada di panduan submission.
                </div>
                <div style="margin-top:6px">
                    Untuk tim yang mendapat verdict Run Time Error, cek kembali penggunaan array anda. Karena sebagian besar tim yang mengalami Run Time Error karena array, contohnya seperti pengaksesan index array yang tidak ada dan ukuran array yang tidak cukup besar.
                </div>
            </div>
            <div style="margin-top:6px">


            </div>
            <div style="margin-top:12px">
                <strong style="color:#E13300">Compile Error pada Submission Pascal</strong>
                <div style="margin-top:6px">
                    Kami sudah meralat panduan submission programming khususnya bahasa Pascal dan dapat dilihat pada pengumuman di bawah REVIEW ini. Anda tidak perlu menggunakan <span style='font-family: "Courier New", Courier, monospace'>uses crt</span> maupun <span style='font-family: "Courier New", Courier, monospace'>uses wincrt</span>
                </div>
            </div>
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