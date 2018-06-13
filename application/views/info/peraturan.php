<?php
$aturanUmum = ['Peserta harus terdaftar sebagai siswa SMA / sederajat yang masih aktif pada saat lomba berlangsung',
    'Setiap kelompok HARUS terdiri dari tiga (3) orang yang berasal dari sekolah yang sama, dan satu (1) peserta HANYA BOLEH terdaftar dalam satu (1) tim',
    'Satu (1) sekolah maksimal membawa satu (1) guru pendamping',
    'Setiap tim wajib melunasi biaya pendaftaran sebelum batch pendaftaran berakhir',
    'Peserta dan guru pendamping WAJIB membawa tanda pengenal (apabila kartu pelajar peserta tidak ada maka harus membawa surat keterangan dari sekolah, untuk guru pendamping membawa surat dari sekolah apabila pendamping tersebut mewakili)',
    'Tiap tim wajib mengirimkan minimal satu (1) orang perwakilan untuk mengikuti technical meeting',
    'Peserta wajib menggunakan seragam dan bersepatu',
    '<strong>DILARANG</strong> merusak sarana dan prasarana FAKULTAS TEKNIK',
    '<strong>DILARANG</strong> membawa perhiasan, barang elektronik, dan barang berharga lainnya secara berlebihan. (setiap kehilangan di tanggung oleh pemilik)',
    '<strong>DILARANG</strong> berkelahi dengan kelompok lain **',
    '<strong>DILARANG</strong> meninggalkan area kompetisi ILPC 2018 selama acara berlangsung **',
    '<strong>DILARANG</strong> menggunakan alat komunikasi apapun selama lomba berlangsung',
    '<strong>DILARANG</strong> bekerja sama dalam bentuk apapun antar tim',
    '<strong>DILARANG</strong> membawa rokok (tradisional dan elektrik) dan atau NAPZA **',
    '<strong>DILARANG</strong> membawa senjata tajam, senjata api, minuman keras, dan dan benda-benda berbahaya lainnya **',    
    '<strong>DILARANG</strong> berbicara kotor atau menyinggung SARA',
    '<strong>DILARANG</strong> melakukan tindakan kriminal dan provokasi',
    '<strong>DILARANG</strong> menerima tamu dan berbincang dengan pihak luar selama acara belangsung',
    'Bersikap sopan terhadap sesama peserta dan panitia serta pihak luar yang terkait dengan ILPC 2018',
    'Menjaga kebersihan dan ketertiban acara ILPC 2018',
    'Segala bentuk kehilangan yang bersifat pribadi tidak ditanggung panitia',
    'Diwajibkan menjaga kebersihan dan ketenangan terutama di dekat ruang P3K jika ada yang sakit',
    'Penerimaan hadiah tidak boleh diwakilkan',
    'Hal-hal yang tidak tertera dapat ditambahkan sewaktu-waktu bila diperlukan',
    'Keputusan panitia bersifat mutlak dan tidak dapat diganggu gugat'
];
/*'Peserta diperbolehkan membawa jas hujan atau payung sendiri pada saat Semifinal. Panitia tidak menyediakan payung/ jas hujan saat Rally Games berlangsung',
'Memberitahu panitia dan membawa obat sendiri bagi yang memiliki penyakit tertentu karena obat yang disediakan panitia hanya obat  penyakit umum saja. Segera hubungi panitia jika merasa tidak beres dengan kesehatannya saat acara berlangsung',
    */
$aturanSF = [
    'Peserta wajib mengenakan <strong>SERAGAM OLAHRAGA SEKOLAH</strong> masing-masing (siswi WAJIB menggunakan celana dan ikat rambut) dan sepatu. <br>Apabila salah satu anggota tidak mempunyai seragam olahraga, maka seluruh anggota tim dapat menggunakan kaos dengan warna yang seragam.
',

    'Membawa topi/jas hujan/payung, karena rally games dilakukan di area terbuka (outdoor)',
    'Membawa jam tangan',
    'Bagi peserta dari luar kota yang dijemput oleh panitia harus siap dijemput pukul 06.15 WIB',
    'Peraturan bagaimana cara menjawab soal dan rally games akan disampaikan pada saat technical meeting'
];
?>

<div class="container-fluid">
    <div class="row"> 
        <div class="parallax">
            <img class="header-panduan img-responsive center-block" src="<?php echo base_url('asset/2018/img/ILPC-2018.png'); ?>" width="1000px">  
        </div>
    </div>

    <div class="peraturan">
        <h1>Peraturan Peserta ILPC 2018</h1>

        <div class="row rules-umum">
            <div class="container">
                <h2>Peraturan Umum</h2>
                <p class="updated">Last Update: 14 Oktober 2017 00.25 WIB</p>
                <div class="col-xs-12">
                <?php for($idx=0; $idx < count($aturanUmum); $idx++): ?>
                    <div class="isi-rules-umum">
                        <p><?php echo ($idx+1) . ". " . $aturanUmum[$idx]; ?></p>
                    </div>
                <?php endfor; ?>
                </div> <!-- end of col-xs-12 -->
                <div class="col-xs-12">
                    <p class="term-cond">** Peserta yang melanggar akan didiskualifikasi</p>
                </div>
            </div>
        </div> <!-- end of rules-umum -->

    </div> <!-- end of peraturan -->
</div>