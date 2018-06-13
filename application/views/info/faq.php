<?php
/**
 * Date: 11/10/2015
 * Time: 14:26
 */
$baseurl = base_url();
$faq = array(
    ['question' => 'Apa itu ILPC?',
        'answer' => 'ILPC adalah kompetisi logika dan pemrograman tingkat nasional yang diadakan setiap tahun oleh Jurusan Informatika Fakultas Teknik UBAYA yang diikuti oleh siswa SMA atau sederajat se-Indonesia.'],

    ['question' => 'Kapan acara ILPC diadakan?',
        'answer' => 'Babak Penyisihan: 5—6 Januari 2018 (online)<br>
        Technical Meeting: 18 Januari 2018<br>
        Babak Semifinal: 19 Januari 2018<br>
        Babak Final: 20 Januari 2018<br>
        Keterangan lebih lengkap, silahkan dilihat di <a href="'. $baseurl . 'detail">link ini</a>.'],

    ['question'=>'ILPC sudah diadakan berapa kali?',
        'answer'=>'Telah diadakan 11 kali dalam 11 tahun terakhir dan tahun ini merupakan yang ke-12.'],

    ['question'=>'Di mana Semifinal dan Final akan diadakan nantinya?' , 
    'answer'=>'Di Fakultas Teknik UBAYA Kampus Tenggilis.'],

    ['question'=>'Seperti apakah soal-soal yang ada di kompetisi ini?' ,
     'answer' => 'Untuk babak penyisihan, soal logika berupa pilihan ganda dan beberapa soal pemrograman.<br>
    Untuk babak semifinal, lomba diadakan dalam bentuk rally berupa game logika maupun pemrograman pada pos-pos yang tersebar di lokasi lomba.<br>
        Untuk babak final, soal-soal lomba berisi soal logika dan pemrograman.'],

    ['question'=>'Apa bahasa pemrograman yang digunakan dalam kompetisi ini?' , 
    'answer'=>'Bahasa pemrograman yang digunakan adalah C++, Java, dan Pascal.'],

    ['question'=>'Dalam bahasa apakah soal akan diberikan?' , 
    'answer'=>'Semua soal akan diberikan dalam bahasa Indonesia.'],

    ['question'=>'Berapa biaya pendaftaran untuk tiap timnya?' , 
    'answer'=>'Rp150.000,00 per tim (16 Oktober 2017—26 November 2017. Jika mendaftar 4 tim atau lebih akan mendapatkan harga spesial, yaitu Rp120.000,00 per tim).<br>
        Rp150.000,00 per tim (27 November 2017—22 Desember 2017).'],

    ['question'=>'Berapa banyak guru pendamping untuk tiap tim?' , 
    'answer'=>'1 sekolah hanya boleh mengirimkan 1 guru pendamping dan tiap tim tidak wajib ada guru pendamping yang hadir.'],

    ['question'=>'Bagaimana kalau kartu pelajarnya tidak ada?' , 
    'answer'=>'Kalau tidak ada kartu pelajar, maka bisa menggunakan surat pengantar dari sekolah.'],

    ['question'=>'Apa itu surat pengantar? Isinya apa?' , 
    'answer'=>'Surat keterangan dari sekolah yang menyatakan bahwa Anda adalah siswa/i aktif dari sekolah tersebut. Jangan lupa mencantumkan tanda tangan kepala sekolah.'],

    ['question'=>'Berapakah anggota tiap kelompok?' , 
    'answer'=>'1 tim berjumlah 3 orang.'],

    ['question'=>'Berapa kelompok yang akan dipilih untuk maju ke babak semifinal?' , 
    'answer'=>'40 kelompok.'],

    ['question'=>'Berapa kelompok yang akan dipilih untuk maju ke babak final?' , 
    'answer'=>'15 kelompok.'],

    ['question'=>'Apa hadiah untuk juara ILPC?' ,
     'answer'=>'Juara I: Tabungan sebesar Rp5.500.000,00<br/>
           Piala Bergilir Walikota Surabaya + piala tetap ILPC + sertifikat + potongan Uang Sumbangan Pendidikan (USP) bila masuk jurusan Teknik Informatika UBAYA sebesar 100%.<br/>
            <br/>
            Juara II: Tabungan sebesar Rp3.500.000,00<br/>
            Piala tetap ILPC + sertifikat + potongan Uang Sumbangan Pendidikan (USP) bila masuk jurusan Teknik Informatika UBAYA sebesar 50%.<br/>
            <br/>
            Juara III: Tabungan sebesar Rp2.000.000,00<br/>
            Piala tetap ILPC + sertifikat + potongan Uang Sumbangan Pendidikan (USP) bila masuk jurusan Teknik Informatika UBAYA sebesar 25%.<br/>
            <br/>'],
    
    ['question'=>'Apakah tema dari ILPC tahun ini?' ,
     'answer'=>'Tema ILPC 2018 adalah Information System (Sistem Informasi) dengan konsep <strong>Digital Startup</strong>.'],  

    ['question'=>'Untuk bertanya-tanya dan mencari informasi, di mana?' , 
    'answer'=>'Melalui Contact Person kami:<br>
        <b>Amelia</b> (0821 3293 5060)<br>
        <b>Felicia</b> (0813 3666 9317)<br>
        E-mail: ilpc.ubaya@gmail.com'],
    
    
);
?>

<div class="container-fluid">
    <div class="row"> 
        <div class="parallax">
            <img class="header-contact img-responsive center-block" src="<?php echo base_url('asset/2018/img/ILPC-2018.png'); ?>" width="1000px"> 
        </div>
    </div>


      
    <div class="row faq">
        <div class="container">
            <h1 class="text-center" style="color: #2B3990">Frequently Asked Questions</h1>
            <p></p>
            <div class="row">
                <?php for ($i = 0; $i < count($faq); $i++): ?>
                <div class="col-xs-12">
                    <div class="card-question">
                        <p class="question-title">
                            <?php echo $faq[$i]['question']; ?>
                        </p>
                        <p class="answer">
                            <?php echo $faq[$i]['answer']; ?>
                        </p>
                    </div>
                </div>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>