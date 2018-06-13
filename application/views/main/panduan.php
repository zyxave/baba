<?php
/**
 * Date: 20/10/2015
 * Time: 20:54
 */
?>
<div class="width-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="panduan">Panduan ILPC 2016</h1>
                <p class="penting term-cond">Last Update: 8 Januari 2016 12.30 WIB</p>
                <div class="deskripsi">
                    <p>Soal ILPC 2016 terdiri dua (2) jenis, yaitu soal logika dan soal pemrograman. Khusus pada babak penyisihan, soal logika berbentuk soal pilihan ganda. Sedangkan pada babak semifinal dan final, soal logika berbentuk isian dan essay. Soal pemrograman memiliki bentuk yang sama baik pada babak penyisihan, semifinal, maupun final.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="light-org-area">
    <div class="width-wrapper">
        <div class="container-fluid">
            <section class="deskripsi-prog">
                <h2>Soal Pemrograman</h2>
                <div>
                    <p>Peserta akan diberikan cerita atau deskripsi dari suatu permasalahan. Kemudian peserta diminta untuk membuat program berbasis console (non GUI) untuk menyelesaikan soal tersebut dengan memperhatikan batasan dan kriteria yang berlaku. Untuk menjawab soal pemrograman, peserta bebas menggunakan bahasa <span class="penting"> C++, Java, atau Pascal </span>. </p>
                    <p>Peserta dapat langsung mengirimkan source code melalui halaman <span class="penting">Submit</span>. Tunggu hingga juri melakukan penilaian. Peserta dapat melihat hasil penilaian juri melalui halaman <span class="penting">Submission</span>. Kami menyediakan halaman <span class="penting">Scoreboard</span> untuk melihat ranking setiap tim pada sesi pemrograman.
                    </p>
                </div>
                <article class="prog-box">
                    <h3>Struktur Soal</h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <ol>
                                <li><span class="penting">Deskripsi</span>
                                    <p>
                                        berisi penjelasan permasalahan yang harus diselesaikan oleh peserta.
                                    </p></li>
                                <li><span class="penting">Time Limit</span>
                                    <p><strong>Time Limit</strong> merupakan batasan waktu bagi program anda untuk memproses seluruh inputan yang diujikan menjadi output yang diminta pada server ILPC. Apabila program anda berjalan melebihi <strong>Time Limit</strong> , hasil yang muncul pada halaman <b>Submission</b> adalah <strong>Time Limit Exceeded</strong></p>
                                    <p>

                                    </p>
                                </li>
                                <li><span class="penting">Memory Limit</span>
                                    <p><strong>Memory Limit</strong> merupakan batasan penggunaan memori ketika memproses seluruh inputan yang diujikan menjadi output tertentu pada server ILPC. Apabila program anda memakan memori melebihi <strong>Memory Limit</strong> , hasil yang muncul pada halaman <b>Submission</b> adalah <strong>Memory Limit Exceeded</strong>

                                    </p></li>
                                <li><span class="penting">Format Input dan Output</span>
                                    <p>
                                        <span class="penting">Format Input</span> merupakan deskripsi bagaimana inputan akan diberikan juri kepada program peserta saat dijalankan. Sedangkan <span class="penting">Format Output</span> adalah bagaimana seharusnya output jawaban peserta ditampilkan. Apabila peserta tidak mengikuti format input dan output, jawaban peserta dinilai salah <strong>(Wrong Answer)</strong>
                                    </p>
                                    <p class="penting term-cond">
                                        * Peserta tidak perlu mengecek validitas inputan, karena inputan yang diberikan juri pasti sesuai dengan kriteria yang tertera pada soal.
                                    </p>
                                </li>
                                <li><span class="penting">Contoh Input dan Output</span><p>Merupakan contoh input yang diberikan juri beserta hasil output yang benar berdasarkan input tersebut. Apabila program peserta menghasilkan output yang sama dengan contoh output, jawaban peserta belum tentu 100% benar. Bisa saja solusi peserta salah ketika diberikan kasus uji lain. Data Uji/Inputan selain yang disebutkan pada <strong>Contoh Input</strong> bersifat <span class="term-cond penting">RAHASIA.</span></p>
                                </li>

                            </ol>
                        </div>
                    </div>
                </article>
                <div class="orange-box">
                    <h3>Contoh Soal</h3>
                    <div class="row">
                        <div class="col-xs-8 col-sm-4 col-lg-3">
                            <a class="btn btn-ilpc" role="button" data-toggle="collapse" href="#contohSoal">Show/Hide Soal</a>
                        </div>
                    </div>
                    <div id="contohSoal" class="collapse">
                        <div class="soal-header">
                            <h4>Pilih Paket</h4>
                            Author: Christoper W. Rimba (Semifinal ILPC 2014)<br>
                            Time Limit: 1 s. <br>Memory Limit: 64 MB.
                        </div>
                        <div class="desc-soal">
                            <p>Di negara Galaxy terdapat salah satu operator telekomunikasi yang terkenal bernama Solarsel. Solarsel baru-baru ini selalu menawarkan pilihan paket tarif gabungan (telepon, sms, dan internet) yang beragam dan sering berganti. Udin, salah satu pengguna setia Solarsel yang juga seorang pelajar,  menjadi dibuat bingung oleh paket yang berganti-ganti ini. Ia ingin agar pengeluaran pulsanya tiap bulan tidak membengkak akibat salah pilih paket. </p>
                            <p>
                                Sebagai teman baik Udin, Ronaldo memiliki ide untuk membuatkan program yang dapat membantu menentukan paket mana yang seharusnya diambil berdasarkan data kebutuhan pemakaian telepon, sms, dan internet tiap bulannya. Sayangnya, Ronaldo tidak bisa membuat programnya. Padahal ia juga berencana menjual program ini kepada orang lain untuk mendapat uang saku tambahan. (tentunya Udin tidak perlu membayar kepada Ronaldo). Oleh sebab itu, bantulah Ronaldo untuk membuat program ini.
                            </p>
                            <p>
                                Berikut adalah daftar tarif paket yang dikeluarkan Solarsel untuk 3 bulan ke depan:
                                <div class="table-responsive">


                                <table class="soal-table">
                                    <tr>
                                        <th>Nama Paket</th>
                                        <th>SMS</th>
                                        <th>Telepon</th>
                                        <th>Internet</th>
                                    </tr>
                                    <tr>
                                        <td>Asyik</td> <td>20000/bulan, unlimited</td> <td>20/menit</td> <td>25000 per 800 MB</td>
                                    </tr>
                                    <tr><td>Seru</td> <td>15/sms</td> <td>25/menit</td> <td>15000 per 500 MB</td></tr>
                                    <tr><td>Hebat</td> <td>10/sms</td> <td>30/menit</td> <td>35000 per 1,25 GB</td></tr>

                                    <tr>
                                        <td>Xtra Cepat</td> <td>30/sms</td> <td>35/menit</td> <td>50000 per 2,5 GB</td>
                                    </tr>
                                    <tr><td>Nelpon Ria</td> <td>25/sms</td> <td>10/menit</td> <td>10000 per 250 MB</td></tr>
                                </table>
                                </div>
                            </p>
                            <div>
                                <h4>Format Input:</h4>
                                Baris pertama diawali dengan bilangan bulat T (T > 0) yang menyatakan banyaknya kasus. Setiap kasus terdiri dari satu baris yang berisi 3 buah bilangan S, N, dan I yang dipisahkan oleh satu spasi. Masing-masing bilangan tersebut secara berurutan menunjukkan jumlah penggunaan sms, telepon, dan internet tiap bulan. 0 &lt; S <= 10000. 0 &lt; N <= 10000 (N dalam menit).  0 &lt; I <= 10240 ( I dalam MB).

                                catatan: 1 GB = 1024 MB.
                            </div>
                            <div>
                                <h4>Format Output:</h4>
                                <p>Untuk setiap kasus, outputkan dalam satu baris <span class="konsole">"Paket A"</span> , dimana A  adalah nama paket yang seharusnya dipilih agar pengeluaran pulsa per bulannya minimum. Apabila hasilnya lebih dari 1 jenis paket, cukup tampilkan 1 jenis paket yang muncul lebih dahulu dalam tabel tarif paket di atas.</p>
                            </div>
                            <div>
                                <h4>Contoh Input:</h4>
                                <div class="konsole">2<br>
                                1000 1800 400<br>
                                60 1500 2048<br>
                                </div>
                            </div>
                            <div>
                                <h4>Contoh Output:</h4>
                                <div class="konsole">
                                    Paket Nelpon Ria<br>
                                    Paket Xtra Cepat
                                </div>
                                <br>
                            </div>
                            <div>
                                <h4>Penjelasan:</h4>
                                <p>Contoh 1 :<br>
                                Asyik:  (20000) + (20 * 1800) + 25000 = 81000<br>
                                Seru: (15 * 1000) + (25 * 1800) + 15000 = 75000<br>
                                Hebat: (10 * 1000) + (30 * 1800) + 35000 = 99000<br>
                                Xtra Cepat: (30 * 1000) + (35 * 1800) + 50000 = 143000<br>
                                Nelpon Ria: (25 * 1000) + (10 * 1800) + (2*10000) = <b>63000</b><br>
                                </p>
                                <p>
                                    Contoh 2:<br>
                                    Asyik:  (20000) + (20 * 1500) + (3 * 25000) = 125000<br>
                                    Seru: (15 * 60) + (25 * 1500) + (5 * 15000) = 113400<br>
                                    Hebat: (10 * 60) + (30 * 1500) + (2 * 35000) = 115600<br>
                                    Xtra Cepat: (30 * 60) + (35 * 1500) + 50000 = <b>104300</b><br>
                                    Nelpon Ria: (25 * 60) + (10 * 1500) + (9*10000) = 106500
                                </p>

                            </div>
                        </div>
                    </div>
                    <article class="a-box">
                        <h3>Contoh Solusi yang Benar</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="desc-soal">
                                <p>Berikut adalah contoh solusi yang benar untuk soal di atas dengan menggunakan bahasa Java: </p>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-lg-3">
                                <a class="btn btn-ilpc" role="button" data-toggle="collapse" href="#trueAns">Show/Hide Solution</a>
                            </div>
                        </div>
                        <pre id="trueAns" class="source-code collapse"><code class="language-java">import java.util.Scanner;

class Main {
    public static void main(String[] args) {
        Scanner sc = new Scanner (System.in);
        int t = sc.nextInt();
        //urutan data dalam array di bawah ini: tarifSms, tarifTelepon, tarifInternet, kuotaDataPerTarifInternet
        int[][] tarif = {{20000, 20, 25000, 800}, {15,25,15000,500}, {10,30,35000,1280}, {30,35,50000,2560}, {25,10,10000,250}};
        String[] paket = {"Paket Asyik","Paket Seru","Paket Hebat","Paket Xtra Cepat","Paket Nelpon Ria"};
        for(int tc=1; tc<= t; tc++)  {
            int sms = sc.nextInt();
            int telp = sc.nextInt();
            double inet = sc.nextDouble();
            int bayar = 0, min = 0, minIndex = 0;
            for(int i=0; i < tarif.length; i++) {
                bayar = tarif[i][1] * telp + (int) Math.ceil(inet / tarif[i][3]) * tarif[i][2];
                if(i==0) {
                    bayar += tarif[i][0]; 
                    min = bayar;
                }
                else 
                    bayar += tarif[i][0] * sms;
                if(bayar < min) {
                    min = bayar;
                    minIndex = i;
                }
            }
            System.out.println(paket[minIndex]);
        }
    }
}</code></pre>
                    </article>
                    <article class="a-box">
                        <h3>Contoh Solusi yang Salah</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="desc-soal">
                                <p>Walaupun algoritma solusi di bawah ini sudah benar, solusi ini akan manghasilkan respon <b>"Wrong Answer"</b> ketika disubmit. Hal ini disebabkan adanya tambahan karakter <b>"Masukan Jumlah "</b> pada saat program membaca inputan, dan ada <b>tambahan karakter titik</b> saat program mencetak output. </p>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-lg-3">
                                <a class="btn btn-ilpc" role="button" data-toggle="collapse" href="#falseAns">Show/Hide Solution</a>
                            </div>
                        </div>
                        <pre id="falseAns" class="source-code collapse"><code class="language-java">import java.util.Scanner;

class Main {
    public static void main(String[] args) {
        Scanner sc = new Scanner (System.in);
        int t = sc.nextInt();
        int[][] tarif = {{20000, 20, 25000, 800}, {15,25,15000,500}, {10,30,35000,1280}, {30,35,50000,2560}, {25,10,10000,250}};
        String[] paket = {"Paket Asyik","Paket Seru","Paket Hebat","Paket Xtra Cepat","Paket Nelpon Ria"};
        for(int tc=1; tc<= t; tc++)  {
            System.out.println("Masukkan Jumlah SMS: ");
            int sms = sc.nextInt();
            System.out.println("Masukkan Jumlah Telp: ");
            int telp = sc.nextInt();
            System.out.println("Masukkan Jumlah Data Internet: ");
            double inet = sc.nextDouble();
            int bayar = 0, min = 0, minIndex = 0;
            for(int i=0; i < tarif.length; i++) {
                bayar = tarif[i][1] * telp + (int) Math.ceil(inet / tarif[i][3]) * tarif[i][2];
                if(i==0) {
                    bayar += tarif[i][0]; 
                    min = bayar;
                }
                else 
                    bayar += tarif[i][0] * sms;
                if(bayar < min) {
                    min = bayar;
                    minIndex = i;
                }
            }
            System.out.println(paket[minIndex]);
        }
    }
}</code></pre>
                    </article>
                    <article class="a-box">
                        <h3>Compiler</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <p>Compiler yang akan digunakan juri adalah :</p>
                                <ul>
                                    <li>C++ : g++ 4.8</li>
                                    <li>Java : <span class="term-cond">Java 7</span> </li>
                                    <li>Pascal : free pascal 2.6 </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="a-box">
                        <h3>Software yang Disediakan</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <p>Pada babak semifinal dan final, tiap tim disediakan sebuah laptop dengan OS Windows yang dilengkapi dengan software berikut :</p>
                                <ul>
                                    <li>Netbeans 8 (Java dan C++)</li>
                                    <li>Orwell Dev-C++ (C++)</li>
                                    <li>Codeblocks (C++)</li>
                                    <li>Free Pascal IDE (Pascal)</li>
                                    <li>Lazarus IDE (Pascal)</li>
                                    <li>Notepad++ </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="a-box">
                        <h3>Penilaian</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <strong>UPDATE TERBARU 8 Januari 2016</strong><br>
                                Untuk memahami bagaimana juri melakukan penilaian beserta tips untuk menghindari error, silahkan <a href="https://drive.google.com/file/d/0B-_aLNBXQLy_dFZ4TS1VTHNaTkE/view?usp=sharing" target="_blank">Download Petunjuk Penilaian</a>
                            </div>
                        </div>
                    </article>
                </div>

            </section>
        </div>
    </div>
</div>
<div class="dark-org-area">
    <div class="width-wrapper">
        <div class="container-fluid">
            <section class="deskripsi-logic">
                <h2>Soal Logika</h2>
                <div>

                </div>
                <div class="prog-box">
                    <h3>Contoh Soal</h3>
                    <div class="desc-soal">
                        <div>
                            1. Diketahui premis-premis:
                            <ol type="i">
                                <li>Adi sedang bermain atau listrik mati</li>
                                <li>Jika listrik mati, Budi tidak pergi ke rumah Adi</li>
                                <li>Budi pergi ke rumah Adi</li>
                            </ol>
                            Kesimpulan yang benar adalah ...
                            <ol type="a">
                                <li>Adi tidak sedang bermain</li>
                                <li><b>Adi sedang bermain</b></li>
                                <li>Listrik mati</li>
                                <li>Adi kerumah Budi</li>
                                <li>Tidak ada jawaban benar</li>
                            </ol>

                        </div>
                        <div>
                            2.	Dua buah dadu dilempar secara bersamaan. Berapa peluang mendapatkan jumlah dadu ganjil tidak lebih dari 8?<br>
                            <ol type="a">
                                <li>11/36</li>
                                <li>10/36</li>
                                <li>13/36</li>
                                <li><b>12/36</b></li>
                                <li>24/36</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . 'asset/2016/js/prism.js'?>">"></script>
