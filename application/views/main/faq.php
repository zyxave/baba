<?php
/**
 * Date: 11/10/2015
 * Time: 14:26
 */
$baseurl = base_url();
$faq = array(
    ['question' => 'Apa itu ILPC ?',
        'answer' => 'ILPC adalah kompetisi logika dan pemrograman yang diadakan oleh Jurusan Informatika Fakultas Teknik UBAYA setiap tahun. Kompetisi ini dapat diikuti oleh pelajar SMA atau sederajat se-Indonesia.'],
    ['question' => 'Kapan Pendaftaran ILPC 2016 dibuka?',
        'answer' => 'Pendaftaran batch I dibuka pada 5 Oktober 2015 - 29 November 2015 dan batch II dibuka pada 30 November 2015 - 31 Desember 2015.'],
    ['question'=>'Kapan ILPC diadakan?',
        'answer'=>'Babak penyisihan : 8-9 Januari 2016 (online).<br>
            Pengumuman peserta yang lolos ke babak semifinal : 10 Januari 2016 (online). <br>
            Technical Meeting : 14 Januari 2016. <br>
            Babak Semifinal : 15 Januari 2016. <br>
            Babak Final : 16 Januari 2016. <br>
            Keterangan lebih lengkap, silahkan dilihat di <a href="'. $baseurl . 'about">Link ini</a>'],
    ['question'=>'Berapa biaya pendaftaran untuk tiap timnya?' , 'answer'=>'Rp 150.000 per tim <br>
            <strong>PROMO</strong> : Apabila 1 sekolah mendaftarkan 3 tim atau lebih pada batch 1 (5 Oktober 2015 - 29 November 2015), cukup membayar <strong>Rp 135.000</strong> per tim'],
    ['question'=>'Bagaimana melakukan pembayaran registrasi ILPC?' , 'answer' => 'Pembayaran melalui transfer ke <strong> rekening BCA : 389 046 7210 atas nama Hendry Salim.</strong> <br>Pembayaran registrasi ILPC dilakukan paling lambat tanggal 30 November 2015 untuk pendaftaran pada batch I, dan 4 Januari 2016 untuk pendaftaran pada batch II.<br> <span class="term-cond"><strong>Setelah Melakukan Transfer, Harap Segera Melakukan Konfirmasi dengan Login ke Web ILPC 2016</strong></span>'],
    ['question'=>'ILPC sudah diadakan berapa kali?' , 'answer'=>'Sudah 9 kali dalam 9 tahun terakhir. ILPC 2016 adalah penyelenggaraan ke-10.'],
    ['question'=>'Di mana Semifinal dan Final akan diadakan nantinya?' , 'answer'=>'Di Fakultas Teknik Universitas Surabaya Tenggilis.<br>Jln. Raya Kalirungkut, Surabaya'],
    ['question'=>'Berapa jumlah anggota tiap tim?' , 'answer'=>'3 orang. Anggota tim harus terdiri dari satu sekolah yang sama.'],

    ['question'=>'Seperti apakah soal-soal yang ada di kompetisi ini?' , 'answer'=>'Silahkan kunjungi <a href="'. $baseurl .'panduan">Link Berikut</a>'],

    ['question'=>'Apa bahasa pemrograman yang boleh digunakan dalam kompetisi ini?' , 'answer'=>'Peserta bebas menggunakan bahasa pemrograman berikut ini : C++, Java, dan Pascal.'],
    ['question'=>'Dalam bahasa apakah soal akan diberikan?' , 'answer'=>' Semua soal akan diberikan dalam bahasa Indonesia.'],

    ['question'=>'Berapa banyak guru pendamping untuk tiap tim?' , 'answer'=>'1 sekolah hanya boleh mengirimkan 1 guru pendamping, dan tiap tim tidak wajib ada 1 guru pendamping yang hadir.'],
    ['question'=>'Bagaimana kalau kartu pelajarnya tidak ada?' , 'answer'=>'Kalau tidak ada kartu pelajar, bisa menggunakan surat pengantar dari sekolah. Surat tersebut menyatakan bahwa anda adalah pelajar aktif di sekolah tersebut. Jangan lupa mencantumkan tanda tangan kepala sekolah.'],
    ['question'=>'Berapa tim yang akan dipilih untuk maju ke babak semifinal?' , 'answer'=>'40 Tim'],
    ['question'=>'Berapa tim yang akan dipilih untuk maju ke babak final?' , 'answer'=>'15 Tim'],
    ['question'=>'Apa hadiah buat juara ILPC?' , 'answer'=>'Juara I : Tabungan sebesar Rp. 5.000.000,-<br/>
            Piala Bergilir Walikota Surabaya + Piala Tetap ILPC + sertifikat + diskon 100% *)<br/>
            <br/>
            Juara II : Tabungan sebesar Rp. 3.500.000,-<br/>
            Piala Tetap ILPC + sertifikat + diskon 75%*)<br/>
            <br/>
            Juara III : Tabungan sebesar Rp. 2.000.000,-<br/>
            Piala Tetap ILPC + sertifikat + diskon 50%*)<br/>
            <br/>
            *) Diskon Uang Sumbangan Pendidikan (USP) jika masuk Jurusan Teknik Informatika Universitas Surabaya.'],
    ['question'=>'Apakah hadiah beasiswa dan barang dapat ditukarkan dengan uang tunai?' , 'answer'=>'Untuk hadiah beasiswa dan barang tidak dapat ditukarkan dengan uang tunai'],
    /*['question'=>'Apakah tema dari ILPC tahun ini?' , 'answer'=>'Game Programming'],*/
    ['question'=>'Bagaimana mengontak panitia untuk mencari tau informasi tambahan?' , 'answer'=>'Hubungi kontak yang tertera pada halaman <a href="' . $baseurl . 'contact"> Contact </a>']
);
?>
<section class="faq">
    <h1>Frequently Asked Question</h1>
    <p></p>
    <div class="row">
        <?php for($idx=0; $idx < count($faq); $idx++): ?>
        <div class="col-xs-12">
            <?php if($idx % 2 == 0): ?>
            <div class="question even-data">
                <?php else :?>
                <div class="question odd-data">
                    <?php endif; ?>
                    <p>
                        <b><?php echo $faq[$idx]['question']; ?></b>
                    </p>
                    <p>
                        <?php echo $faq[$idx]['answer']; ?>
                    </p>
                </div>
            </div>
            <?php endfor; ?>
    </div>
</section>
