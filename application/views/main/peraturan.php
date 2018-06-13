<?php
$aturanUmum = ['Peserta harus terdaftar sebagai siswa SMA / sederajat yang masih aktif pada saat lomba berlangsung',
    'Setiap kelompok terdiri dari tiga (3) orang yang berasal dari sekolah yang sama, dan satu (1) peserta hanya boleh terdaftar dalam satu (1) tim',
    'Satu (1) sekolah maksimal membawa satu (1) guru pendamping',
    'Setiap tim wajib melunasi biaya pendaftaran sebelum batch pendaftaran berakhir',
    'Peserta dan guru pendamping membawa tanda pengenal (apabila kartu pelajar peserta tidak ada maka harus membawa surat keterangan dari sekolah, untuk guru pendamping membawa surat dari sekolah apabila pendamping tersebut mewakili)',
    'Tiap tim wajib mengirimkan minimal satu (1) orang perwakilan untuk mengikuti technical meeting',
    'Peserta wajib menggunakan seragam dan bersepatu',
    '<strong>DILARANG</strong> merusak sistem dan fasilitas ILPC',
    '<strong>DILARANG</strong> menggunakan alat komunikasi apapun selama lomba berlangsung',
    '<strong>DILARANG</strong> berbicara antar tim maupun melakukan segala bentuk kecurangan saat acara berlangsung',
    '<strong>DILARANG</strong> merokok pada saat lomba berlangsung',
    '<strong>DILARANG</strong> membawa senjata tajam, minuman keras, NAPZA dan barang-barang mewah',
    
    '<strong>DILARANG</strong> berbicara kotor atau menyinggung SARA',
    'Segala bentuk kehilangan yang bersifat pribadi tidak ditanggung panitia',
    'Diwajibkan menjaga kebersihan dan ketenangan terutama di dekat ruang P3K jika ada yang sakit',
    'Penerimaan hadiah tidak boleh diwakilkan',
    'Keputusan panitia tidak dapat diganggu gugat'
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
<section class="peraturan" xmlns="http://www.w3.org/1999/html">
    <h1>Peraturan Peserta ILPC 2016</h1>
    <div class="row">
        <section>
            <h2>Peraturan Umum</h2>
            <p>Last Update: 12 Januari 2016 20.40  WIB</p>
            <?php for($idx=0; $idx < count($aturanUmum); $idx++): ?>
                <div class="col-xs-12">
                    <?php if($idx % 2 == 0): ?>
                        <div class="question even-data">
                    <?php else :?>
                        <div class="question odd-data">
                    <?php endif; ?>
                        <p>
                    <?php echo ($idx+1) . ". " . $aturanUmum[$idx]; ?>
                        </p>
                        </div>
                </div>
            <?php endfor; ?>
            <div class="col-xs-12">
                <p class="term-cond">
                ** Peserta yang melanggar akan didiskualifikasi
                </p>
            </div>
        </section>
    </div>
    <div class="row">
        <section>
            <h2>Peraturan Semifinal</h2>
            <p>Last Update: 12 Januari 2016 20.40 WIB</p>
        <?php for($idx=0; $idx < count($aturanSF); $idx++): ?>
        <div class="col-xs-12">
            <?php if($idx % 2 == 0): ?>
                <div class="question even-data">
            <?php else :?>
                <div class="question odd-data">
            <?php endif; ?>
                    <p>
                        <?php echo ($idx+1) . ". " . $aturanSF[$idx]; ?>
                    </p>
                </div>
        </div>
        <?php endfor; ?>
            <p style="padding-left: 12px"><strong>Perhatian : Panitia tidak menyediakan sarapan pagi untuk peserta</strong></p>
        </section>
    </div>
    <div class="row">
        <section>
            <h2>Peraturan Final (Umum)</h2>
            <p>Last Update: 12 Januari 2016 20.40 WIB</p>
            <div class="col-xs-12">
                <div class="question even-data">
                    Boleh membawa alat tulis sendiri seperti ballpoint / pen, pensil, penghapus, dan corection pen (tippex)
                </div>
                <div class="question odd-data">
                    Kertas buram (untuk coretan atau berhitung) akan disediakan panitia
                </div>
                <div class="question even-data">
                    Dilarang menggunakan kalkulator
                </div>
            
            </div>
        </section>
    </div>
    <div class="row">
        <section>
            <h2>Peraturan Final (Programming)</h2>
            <p>Last Update: 9 Januari 2016 22.30 WIB</p><p>Selain aturan umum, pada babak final sesi programming juga diberlakukan aturan berikut :</p>
            <div class="col-xs-12">
                <div class="question even-data">
                    Setiap tim boleh membawa catatan pada sesi Programming dengan ketentuan sebagai berikut :
                    <br>
                    <ol>
                        <li>Ukuran Kertas A4 maksimum 4 lembar bolak balik, diketik dan dicetak sendiri dengan ukuran font yang dapat dibaca oleh mata normal tanpa alat pembesar.</li>
                        <li>Diberi identitas berupa nama tim dan asal sekolah di sudut kanan atas tiap lembar</li>
                        <li>Berisi apapun yang diperlukan tiap tim saat mengerjakan soal pemrograman</li>
                        <li>Peserta harap mencetak catatan ini sendiri sebelum lomba berlangsung, karena panitia tidak menyediakan printer.</li>
                    </ol>
                </div>
                <div class="question odd-data">
                    Setiap tim boleh membawa mouse dan keyboard USB sendiri untuk digunakan saat sesi programming. Harap diberi label identitas (nama tim) agar tidak tertukar dengan tim lain.
                </div>

            </div>
        </section>
    </div>
    <div class="row">
        <section>
            <h2>Penyisihan Programming</h2>
            <p>Last Update: 8 Januari 2016 16.00 WIB</p>
            <div class="col-xs-12">
                <div class="question even-data">
                Kami akan melakukan pengecekan source code peserta secara random dan jika ditemukan ada source code yang diduga telah melakukan kecurangan (sama persis), tim yang dicurigai akan dipertimbangkan untuk didiskualifikasi.

                </div>
                <div class="question odd-data">
                    Nilai N untuk perhitungan poin penyisihan programming adalah 50.
                </div>
            </div>
        </section>
    </div>
</section>
