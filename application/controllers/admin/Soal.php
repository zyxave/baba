<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 19/11/2015
 * Time: 13:48
 */
class Soal extends Soal_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        //$this->load->library("pagination");
    }

    public function index()
    {
        $this->load->model('programming_model','progModel');
        $this->load->model('Logika_model', 'logikaModel');
        $this->data['home'] = true;
        $this->data['pageTitle'] = 'Soal Home';
        $this->data['progRunningContests'] = $this->progModel->getRunningContests($_SESSION['id_kompetisi']);
        $this->data['logikaRunningContests'] = $this->logikaModel->getRunningContests($_SESSION['id_kompetisi']);
        $this->render_view('sie_soal/home','sie_soal/master_soal');
    }

    public function run_code()
    {
        $this->data['runcode'] = true;
        if($this->input->post('btnRunCode') === NULL)
        {
            $this->data['pageTitle'] = 'Sie Soal';
            $this->render_view('sie_soal/run_code','sie_soal/master_soal');
        }
        else
        {
            /*$inputFile = $_FILES['file_input'];
            $solutionFile = $_FILES['file_solusi'];*/

            /*$config['upload_path'] = 'asset/output_result/';
            $config['allowed_types'] = 'cpp|pas|java';
            $config['max_size'] = '2048';
            $file_solusi = $_FILES["file_solusi"]["name"];
            $file_solusi = str_replace(" ", '_', $file_solusi);
            echo $file_solusi;
            $config['file_name'] = $file_solusi;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('file_solusi'))
            {
                $a = $this->upload->display_errors();
                echo $a;
            }
            else {

                $data2 = $this->upload->data();

                $file_solusi_raw = $data2['raw_name'];
                $ext = $data2['file_ext'];
                echo "<pre>";
                print_r($data2);

                echo "</pre>";
            }
            //upload file input
            $config['upload_path'] = 'asset/output_result/';
            $config['allowed_types'] = 'in';
            $config['max_size'] = '2048';
            $file_input = $_FILES["file_input"]["name"];
            $file_input = str_replace(" ", '_', $file_input);
            $config['file_name'] = $file_input;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('file_input');*/

            if(!$this->check_file())
            {
                redirect(base_url() . 'admin/soal/run_code');
            }
            else
            {
                $uploaded = $this->upload_code();
                $_SESSION['uploadResult'] = $uploaded;
                $this->session->mark_as_flash('uploadResult');
                
                
                $this->execute_code($uploaded['input_file'], $uploaded['solution'], $uploaded['solution_raw'], $uploaded['ext']);
                redirect(base_url() . 'admin/soal/run_code');
            }
        }
    }

    private function check_file(){
        $err = 0;
        if ($_FILES['file_input']["error"] > 0) {
            $err = 1;
        } else {
            if ($_FILES['file_input']["size"] > (5 * 1024 * 1024)) {
                $err = 1;
            }
            $myArray = explode(".", $_FILES['file_input']["name"]);
            if (end($myArray) != "in") {
                $err = 1;
            }
        }

        if ($err == 1) {
            $errors[] = "The input file is not valid";
            $err = 0;
        }

        if ($_FILES['file_solusi']["error"] > 0) {
            $err = 1;
        } else {
            if ($_FILES['file_solusi']["size"] > (2 * 1024 * 1024)) {
                $err = 1;
            }
            $array2 = explode(".", $_FILES['file_solusi']["name"]);
            $eks = end($array2);
            if ($eks != "cpp" && $eks != 'pas' && $eks != 'java') {
                $err = 1;
            }
        }

        if ($err == 1) {
            $errors[] = "The solution file is not valid";
        }
        if (isset($errors))
        {
            $_SESSION['errors'] = $errors;
            $this->session->mark_as_flash('errors');
            //redirect(base_url() . 'admin/soal/run_code');
            return false;
        }
        return true;
    }

    /**
     * Eks Code Lama < 2015, Tidak Dipakai Dulu
     * @return bool
     */
    
    // DON'T USE THIS !!!
    private function check_run_code_file()
    {
        $err = 0;
        if ($_FILES['file_input']["error"] > 0) {
            $err = 1;
        } else {
            if ($_FILES['file_input']["size"] > (2 * 1024 * 1024)) {
                $err = 1;
            }
            if (end(explode(".", $_FILES['file_input']["name"])) != "in") {
                $err = 1;
            }
        }

        if ($err == 1) {
            $errors[] = "The input file is not valid";
        }

        $err = 0;
        if ($_FILES['file_solusi']["error"] > 0) {
            $err = 1;
        } else {
            if ($_FILES['file_solusi']["size"] > (2 * 1024 * 1024)) {
                $err = 1;
            }
            $eks = end(explode(".", $_FILES['file_solusi']["name"]));
            if ($eks != "cpp" && $eks != 'pas' && $eks != 'java') {
                $err = 1;
            }
        }

        if ($err == 1) {
            $errors[] = "The solution file is not valid";
        }
        if (isset($errors))
        {
            $_SESSION['errors'] = $errors;
            $this->session->mark_as_flash('errors');
            return false;
        }
        else
        {
            return true;
        }
    }
    //END 

    private function upload_code()
    {
        //upload file solusi
        $config['upload_path'] = 'asset/runcode_result/';
        $config['allowed_types'] = 'cpp|pas|java';
        $config['max_size'] = '2048';
        $file_solusi = $_FILES["file_solusi"]["name"];
        $file_solusi = str_replace(" ", '_', $file_solusi);
        $config['file_name'] = $file_solusi;

        $this->load->library('upload', $config);
        $this->upload->do_upload('file_solusi');

        $solutionFileData = $this->upload->data();

        $file_solusi_raw = $solutionFileData['raw_name'];
        $ext = $solutionFileData['file_ext'];
        //$ext=$config['file_name'];
        /*echo "<pre>";
        print_r($data2);
        echo "</pre>";*/

        //upload file input
        $config['upload_path'] = 'asset/runcode_result/';
        $config['allowed_types'] = 'in';
        $config['max_size'] = '5120';
        $file_input = $_FILES["file_input"]["name"];
        $file_input = str_replace(" ", '_', $file_input);
        $config['file_name'] = $file_input;

        $this->upload->initialize($config);
        $this->upload->do_upload('file_input');

        $uploaded = ['solution' => $file_solusi, 'solution_raw' => $file_solusi_raw, 'input_file'=> $file_input , 'ext' => $ext];
        return $uploaded;
    }

    private function execute_code($file_input, $file_solusi, $file_solusi_raw, $ext)
    {
        //hapus file sebelumnya kalo ada
        system("rm asset/runcode_result/result.out");
       
        
        //proses
        if (strtolower($ext) == ".cpp") {
            echo "masuk proses cpp<br>";
            $bahasa = "cpp";
            $command1 = "g++ runcode_result/" . $file_solusi . " -o runcode_result/tes"; // untuk compilenya
            $command2 = "time ./runcode_result/tes <runcode_result/" . $file_input . "> runcode_result/result.out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
        }
        else if (strtolower($ext) == ".c") {
            $bahasa = "c";
            $command1 = "gcc runcode_result/" . $file_solusi . " -o submission_asset/tes"; // untuk compilenya
            $command2 = "time ./runcode_result/tes <runcode_result/" . $file_input . "> runcode_result/result.out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
        }
        else if (strtolower($ext) == ".pas") {
            $bahasa = "pascal";
            $command1 = "fpc -Tlinux asset/runcode_result/" . $file_solusi . ""; // untuk compilenya
            //$command1 = "fpc asset/runcode_result/" . $file_solusi . ""; // untuk compilenya
            //$command2 = "time asset/runcode_result/" . $file_solusi_raw . "< asset/runcode_result/" . $file_input . "> asset/runcode_result/result.out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
            $command2 = "time ./runcode_result/" . $file_solusi_raw . "< runcode_result/" . $file_input . "> runcode_result/result.out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
        }
        else if (strtolower($ext) == ".java") {
            $bahasa = "java";
            system("mkdir asset/runcode_result/tes"); //untuk create folder tes
            system("cp asset/runcode_result/" . $file_solusi . " asset/runcode_result/tes/" . $file_solusi);
            $command1 = "javac runcode_result/tes/" . $file_solusi . ""; // untuk compilenya
            $command2 = "time java -cp runcode_result/tes Main <runcode_result/" . $file_input . "> runcode_result/tes/result.out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
            //$command2 = 'time java -cp submission_asset/'.$id.' '.$safefilename.' <input/'.$data["problemid"].'.in> temp/'.$safefilename.'.out';
        }
        echo "File solusi :" . $file_solusi . "<br>";
        echo "File solusi RAW :" . $file_solusi_raw . "<br>";
        echo "File Input :" . $file_input . "<br>";
        echo "Com1 :" . $command1 . "<br>";
        echo "Com2:" . $command2 . "<br>";

        //proses Juri
        $hasil = "Accepted";
        $runtime = 0;

        $descriptorspec = array(
            0 => array("pipe", "r"), // stdin is a pipe that the child will read from
            1 => array("pipe", "w"), // stdout is a pipe that the child will write to
            2 => array("pipe", "w") //stderr is a pipe that the child will write to
            );

        $cwd = 'asset'; //The initial working dir for the command
        if ($bahasa == "pascal") {
            $process = shell_exec('pwd');
            echo "pwd : " . $process . "<BR>";
            $process = shell_exec($command1);
            echo "hasil : " . $process . "<BR>";
            if (strstr($process, "error exitcode") != null)
                $hasil = 'Compile Error';
        }
        else
        {
            $process = proc_open($command1, $descriptorspec, $pipes, $cwd);
            echo "Command:" . $command1 . "<br />";
            echo "Descriptor:"; print_r( $descriptorspec);  echo "<br />";
            if (is_resource($process)) {

                $out = stream_get_contents($pipes[1]);
                echo "1." . $out . "<br />";
                fclose($pipes[1]);

                $out = stream_get_contents($pipes[2]);
                echo "2." . $out . "<br />";
                fclose($pipes[2]);

                // It is important that you close any pipes before calling
                // proc_close in order to avoid a deadlock
                // proc_close return 0 jika program dapat dicompile/warning, dan 1 jika tidak dapat dicompile(ada pesan error juga)
                $return_value = proc_close($process);
                if ($return_value != 0)
                    $hasil = 'Compile Error';
            }
        }

        //jika tidak error saat dicompile, cek time limit
        if ($hasil == "Accepted")
        {
            //jika tidak pake bash -c --> untuk if ini tidak akan sempurna
            //jika menggunakan bash maka settingan untuk ulimit tidak akan mempengaruhi setting resource system awal
            $memory_limit = 64 * 1024; //64MB
            $time_limit = 15; //15detik

            //kalo tidak pake bash -c akan mengubah settingan  resource awal
            $process = proc_open('bash -c "ulimit -St ' . $time_limit . ' -Sm ' . $memory_limit . '; ' . $command2 . '"', $descriptorspec, $pipes, $cwd);

            //echo 'bash -c "' . $command2 . '"';
            //echo "<br />";
            if (is_resource($process))
            {
                $stream = stream_get_contents($pipes[2]);
                echo "Stream : " . $stream;
                fclose($pipes[2]);
                $return_value = proc_close($process);

                $timelimitstring = "CPU time limit exceeded";
                $memorylimitstring = "Memory size limit exceeded";

                if (strstr($stream, $timelimitstring) != null) { //cari ada kata CPU Time...?
                    $hasil = 'Time Limit Exceeded';
                }

                if (strstr($stream, $memorylimitstring) != null) { //cari ada kata Memory ... exceeded?
                    $hasil = "Memory Limit Exceeded";
                }

                if ($hasil == "Accepted" && substr($stream, 1, 4) != "real") { //tidak TL/ML
                    $hasil = "Run Time Error";
                }

                //real	0m14.253s (contoh hasil penggunakan fungsi time di terminal)
                $str = strstr($stream, "real"); //ambil sebelah kanan real
                $im = strpos($str, "m"); //cari posisi huruf m(menit)
                $is = strpos($str, "s"); //cari posisi huruf s(detik)
                $m = substr($str, 5, $im - 5);
                $s = substr($str, $im + 1, $is - $im - 1);
                $runtime = number_format($m * 60 + $s, 3);
            }
        }

        $this->deleteTempSubmissionFiles($file_input, $file_solusi, $file_solusi_raw, $bahasa);
        /*$data['file'] = base_url() . "asset/runcode_result/result.out";
        $data['result'] = $hasil;
        $data['run_time'] = $runtime;*/

        $_SESSION['result'] = $hasil;
        $_SESSION['runtime'] = $runtime;
        $this->session->mark_as_flash('result');
        $this->session->mark_as_flash('runtime');
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";

    }

    private function deleteTempSubmissionFiles($file_input, $file_solusi, $file_solusi_raw, $bahasa)
    {
        //hapus file yang telah diibuat
        system("rm asset/runcode_result/" . $file_input);
        system("rm asset/runcode_result/" . $file_solusi);

        if ($bahasa == "cpp" || $bahasa == "c") {
            system("rm -r asset/runcode_result/tes"); //hapus file yang dibuat saat compile pertama
        }
        else if ($bahasa == "pascal") {
            system("rm asset/runcode_result/" . $file_solusi_raw); //hapus file yang dibuat saat compile pertama
            system("rm asset/runcode_result/" . $file_solusi_raw . ".o"); //hapus file saat dikompile
        }
        else if ($bahasa == "java") {
            system("cp asset/runcode_result/tes/result.out asset/runcode_result/result.out");
            // -d(directory), unlink FILE, even if it is a non-empty directory (super-user only)
            // -R(recursive), remove the contents of directories recursively

            system("rm -r asset/runcode_result/tes"); //hapus folder untuk penampungan
        }
    }

    public function download_run_result()
    {
        $this->load->helper('download');

        if(file_exists(base_url() . 'asset/runcode_result/result.out'))
        {
            $data = file_get_contents(base_url() . 'asset/runcode_result/result.out');
            $name = 'result.out';
            force_download($name, $data);
        }

       // force_download(base_url() . 'asset/runcode_result/result.out', NULL);
    }

    public function setting($jenis = null)
    {
        $this->load->model('competition_model', 'competitionModel');
        $this->data['pageTitle'] = 'Sie Soal';
        $this->data['kompetisi'] = $this->competitionModel->getKompetisiWithId($_SESSION['id_kompetisi']);


        if($jenis === 'programming')
            $this->render_view('sie_soal/setting_programming','sie_soal/master_soal');
        else if($jenis === 'multiplechoice')
            $this->render_view('sie_soal/setting_multiplechoice','sie_soal/master_soal');
        else
            $this->render_view('sie_soal/setting','sie_soal/master_soal');
    }

    function liattotal() {
        $this->load->model('report_model', 'reportModel');
        $this->data['pageTitle'] = 'Sie Soal';
        $this->data['kompetisi'] = $this->reportModel->getAllKompetisi();
        $this->render_view('sie_soal/total_score', 'sie_soal/master_soal');
    }

    function hasiltotal() {
        $this->data['pageTitle'] = 'Sie Soal';
        $this->load->model('Programming_model','progModel');
        $idprog = $this->input->post('kontesy');
        $idpil = $this->input->post('kontesx');
        if ($this->progModel->isContestAvailable($idprog)) {
            $this->data['scorex'] = $this->progModel->getScore($idprog, $_SESSION['id_kompetisi']);
            $this->data['kontes'] = $this->progModel->getKontes($idprog);
            $this->data['max_poin_ac'] = $this->progModel->getMaxPoin($idprog);
        }
        $this->load->model('Logika_model','logikaModel');
        if ($this->logikaModel->isContestAvailable($idpil)) {
            $this->data['scorey'] = $this->logikaModel->getScoreMultipleChoice($idpil, $_SESSION['id_kompetisi']);
            $this->data['kontes'] = $this->logikaModel->getContestById($idpil);
        }
        $this->data['scorey'] = $this->logikaModel->getScoreMultipleChoice($idpil, $_SESSION['id_kompetisi']);
        $this->data['kontes'] = $this->logikaModel->getContestById($idpil);
        $this->render_view('sie_soal/total_score_view', 'sie_soal/master_soal');
    }

    public function getKontesPilgan() {
        $this->load->model('report_model','reportModel');
        $kompetisi = $this->input->post('kompetisi');
        $this->data['kontes'] = $this->reportModel->getKontesPilgan($kompetisi);
        $this->render_view('sie_soal/getKontesPilgan_view', 'sie_soal/master_soal');
    }

    public function getKontesPemrograman() {
        $this->load->model('report_model','reportModel');
        $kompetisi = $this->input->post('kompetisi');
        $this->data['kontes'] = $this->reportModel->getKontesPemrograman($kompetisi);
        $this->render_view('sie_soal/getKontesPemrograman_view', 'sie_soal/master_soal');
    }
}