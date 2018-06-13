<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 26/12/2015
 * Time: 21:37
 */
class Judge extends Soal_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['pageTitle'] = 'Sie Soal';
        $this->load->model('programming_model', 'progModel');
        $this->load->model('judge_model', 'judgeModel');
        $this->data['judge'] = true; // supaya kelihatan navigasinya lg dimana posisinya
    }

    function index()
    {
        $this->data['submissions'] = $this->judgeModel->getPendingSubmission();
        $this->render_view('sie_soal_programming/judge', 'sie_soal/master_soal');
    }

    public function do_judge($id)
    {
        $submission = $this->judgeModel->getSubmissionById($id);
        $this->judgeModel->updateSubmissionStatus($submission['id'], 'Judging');

        $soal = $this->judgeModel->getDataSoalPemrograman($submission['id_soal_pemrograman']);

        $input = explode("/", $soal['input']); // karena default dir -> files, jadi tidak perlu ada files lagi...
        $input = $input[1] . "/" . $input[2];

        $output = explode("/", $soal['output']); // karena default dir -> files, jadi tidak perlu ada files lagi...
        $output = $output[1] . "/" . $output[2];

        $fileName = $submission['file'];
        $fileName = explode("/", $fileName);
        $fileName = $fileName[2];
        $rawName = explode(".", $fileName);
        $rawName = $rawName[0];
        $file_sub = $submission['file'];

        if ($submission['bahasa'] == "cpp") {
            $bahasa = "cpp";
            $command1 = "g++ -lm submission_files/" . $fileName . " -o submission_files/" . $rawName; // untuk compilenya
            $command2 = "time ./submission_files/" . $rawName . "<" . $input . "> submission_files/" . $rawName . ".out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
        } else if ($submission['bahasa'] == "c") {
            $bahasa = "c";
            $command1 = "gcc -lm submission_files/" . $fileName . " -o submission_files/" . $rawName; // untuk compilenya
            $command2 = "time ./submission_files/" . $rawName . "<" . $input . "> submission_files/" . $rawName . ".out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
        } else if ($submission['bahasa'] == "pascal") {
            $bahasa = "pascal";
            $command1 = "fpc -Tlinux asset/submission_files/" . $fileName . ""; // untuk compilenya
            $command2 = "time ./submission_files/" . $rawName . "<" . $input . "> submission_files/" . $rawName . ".out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
        } else if ($submission['bahasa'] == "java") {
            $bahasa = "java";
            system("mkdir asset/submission_files/" . $id);
            system("cp " . $file_sub . " asset/submission_files/" . $id . "/" . $fileName);
            $command1 = "javac submission_files/" . $id . "/" . $fileName . ""; // untuk compilenya
            $command2 = "time java -cp submission_files/" . $id . " Main <" . $input . "> submission_files/" . $id . "/" . $rawName . ".out"; //jika berhasil dicompile, maka selanjutnya akan dijalankan programnya dengan inputan yang diberikan
//$command2 = 'time java -cp submission_files/'.$id.' '.$safefilename.' <input/'.$data["problemid"].'.in> temp/'.$safefilename.'.out';
        }

        $id = $submission['id'];

    //proses Juri
        $hasil = "Accepted";
        $runtime = 0;

        $descriptorspec = array(
            0 => array("pipe", "r"), // stdin is a pipe that the child will read from
            1 => array("pipe", "w"), // stdout is a pipe that the child will write to
            2 => array("pipe", "w") //stderr is a pipe that the child will write to
        );

        $cwd = 'asset'; //The initial working dir for the command
        if ($bahasa == "pascal")
        {
            $process = shell_exec($command1);
            if (strstr($process, "error exitcode") != null)
                $hasil = 'Compile Error';
        }
        else
        {
            $process = proc_open($command1, $descriptorspec, $pipes, $cwd);
            if (is_resource($process)) {
                $out = stream_get_contents($pipes[1]);
                fclose($pipes[1]);

                $out = stream_get_contents($pipes[2]);
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
//kalo tidak pake bash -c akan mengubah settingan  resource awal
            $process = proc_open('bash -c "ulimit -St ' . $soal['time_limit'] . ' -Sm ' . $memory_limit . '; ' . $command2 . '"', $descriptorspec, $pipes, $cwd);
//echo 'bash -c "' . $command2 . '"';
//echo "<br />";
            if (is_resource($process))
            {
                $stream = stream_get_contents($pipes[2]);

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

//real  0m14.253s (contoh hasil penggunakan fungsi time di terminal)
                $str = strstr($stream, "real"); //ambil sebelah kanan real
                $im = strpos($str, "m"); //cari posisi huruf m(menit)
                $is = strpos($str, "s"); //cari posisi huruf s(detik)
                $m = substr($str, 5, $im - 5);
                $s = substr($str, $im + 1, $is - $im - 1);
                $runtime = number_format($m * 60 + $s, 3);
            }
        }

//jika tetap masih AC(uda lewat TL), harus dicek sama tidak dengan output yang diinginkan
        if ($hasil == "Accepted")
        {
            if ($bahasa == "java") {
                $process = proc_open('cmp submission_files/' . $id . '/' . $rawName . '.out ' . $output, $descriptorspec, $pipes, $cwd);
            } else {
                $process = proc_open('cmp submission_files/' . $rawName . '.out ' . $output, $descriptorspec, $pipes, $cwd);
            }


            if (is_resource($process)) {
                $return_value = proc_close($process);
                if ($return_value != 0)
                    $hasil = "Wrong Answer";
            }
        }

//hapus file yang telah diibuat
        if ($bahasa == "cpp" || $bahasa == "c")
        {
            system("rm asset/submission_files/" . $rawName); //hapus file yang dibuat saat compile pertama
            system("rm asset/submission_files/" . $rawName . ".out"); //hapus file yang dibuat compile dua
        }
        else if ($bahasa == "pascal")
        {
            system("rm asset/submission_files/" . $rawName); //hapus file yang dibuat saat compile pertama
            system("rm asset/submission_files/" . $rawName . ".out"); //hapus file yang dibuat compile dua
            system("rm asset/submission_files/" . $rawName . ".o"); //hapus file saat dikompile
        }
        else if ($bahasa == "java")
        {
// -d(directory), unlink FILE, even if it is a non-empty directory (super-user only)
// -R(recursive), remove the contents of directories recursively
            system("rm -d -R asset/submission_files/" . $id); //hapus folder untuk penampungan
        }

//update db

        if ($hasil == "Accepted")
        {
            if ($this->judgeModel->getSolved($submission['id_soal_pemrograman'], $submission['id_tim']))
            {
                $this->judgeModel->updateSubmission($id, $runtime, 'Solved', 0);
            }
            else
            { // blm pernah ac sblmnya
                $time = $submission['jam']; //jam kirim
                $tampung = explode(":", $time);
                $jam1 = $tampung[0];
                $menit1 = $tampung[1];

//jam kontes mulai
                $kontesId = $this->judgeModel->getKontesId($submission['id_soal_pemrograman']);
                $kontes_start = $this->judgeModel->getKontesPemrogramanStart($kontesId);
                $tampung = explode(":", $kontes_start);
                $jam2 = $tampung[0];
                $menit2 = $tampung[1];

//selisih jam sekarang - jam kontes mulai
                $selisih = ($jam1 * 60 + $menit1) - ($jam2 * 60 + $menit2);
                $jumlah = $this->judgeModel->getJumlahSubmission($submission['id_tim'], $submission['id_soal_pemrograman']);
                $poin = $selisih + (20 * $jumlah);
                $this->judgeModel->updateSubmission($id, $runtime, $hasil, $poin);
            }
        }
        else
        {
            if ($this->judgeModel->getSolved($submission['id_soal_pemrograman'], $submission['id_tim'])) {
                $this->judgeModel->updateSubmission($id, $runtime, 'Solved', 0);
            }
            else {
                $this->judgeModel->updateSubmission($id, $runtime, $hasil, 0);
            }
        }
        if($_SERVER['HTTP_REFERER'] == base_url('admin/judge')) 
            redirect(base_url() . "admin/judge");
        else if(strpos($_SERVER['HTTP_REFERER'], base_url("admin/judge/submissions/")) !== false)
            redirect($_SERVER['HTTP_REFERER']);
        else
            redirect(base_url('admin/programming'));
    }

    public function do_judge_pascal($id)
    {
        $submission = $this->judgeModel->getSubmissionById($id);
        $this->judgeModel->updateSubmissionStatus($submission['id'], 'Judging');

        $soal = $this->judgeModel->getDataSoalPemrograman($submission['id_soal_pemrograman']);

        $input = explode("/", $soal['input']); // karena default dir -> files, jadi tidak perlu ada files lagi...
        $input = $input[1] . "/" . $input[2];

        $output = explode("/", $soal['output']); // karena default dir -> files, jadi tidak perlu ada files lagi...
        $output = $output[1] . "/" . $output[2];

        $fileName = $submission['file'];
        $fileName = explode("/", $fileName);
        $fileName = $fileName[2];
        $rawName = explode(".", $fileName);
        $rawName = $rawName[0];
        $file_sub = $submission['file'];
        $id = $submission['id'];
//proses Juri
        $hasil = "Accepted";
        $runtime = 0;

        $descriptorspec = array(
            0 => array("pipe", "r"), // stdin is a pipe that the child will read from
            1 => array("pipe", "w"), // stdout is a pipe that the child will write to
            2 => array("pipe", "w") //stderr is a pipe that the child will write to
        );
        $cwd = 'asset'; //The initial working dir for the command

//jika tidak error saat dicompile, cek time limit
        if ($hasil == "Accepted")
        {
//jika tidak pake bash -c --> untuk if ini tidak akan sempurna
//jika menggunakan bash maka settingan untuk ulimit tidak akan mempengaruhi setting resource system awal
            $memory_limit = 64 * 1024; //64MB
//kalo tidak pake bash -c akan mengubah settingan  resource awal
            $process = proc_open('bash -c "ulimit -St ' . $soal['time_limit'] . ' -Sm ' . $memory_limit . '; ' . $command2 . '"', $descriptorspec, $pipes, $cwd);
//echo 'bash -c "' . $command2 . '"';
//echo "<br />";
            if (is_resource($process))
            {
                $stream = stream_get_contents($pipes[2]);

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

//real  0m14.253s (contoh hasil penggunakan fungsi time di terminal)
                $str = strstr($stream, "real"); //ambil sebelah kanan real
                $im = strpos($str, "m"); //cari posisi huruf m(menit)
                $is = strpos($str, "s"); //cari posisi huruf s(detik)
                $m = substr($str, 5, $im - 5);
                $s = substr($str, $im + 1, $is - $im - 1);
                $runtime = number_format($m * 60 + $s, 3);
            }
        }

//jika tetap masih AC(uda lewat TL), harus dicek sama tidak dengan output yang diinginkan
        if ($hasil == "Accepted")
        {
            if ($bahasa == "java") {
                $process = proc_open('cmp submission_files/' . $id . '/' . $rawName . '.out ' . $output, $descriptorspec, $pipes, $cwd);
            } else {
                $process = proc_open('cmp submission_files/' . $rawName . '.out ' . $output, $descriptorspec, $pipes, $cwd);
            }


            if (is_resource($process)) {
                $return_value = proc_close($process);
                if ($return_value != 0)
                    $hasil = "Wrong Answer";
            }
        }

//hapus file yang telah diibuat
        if ($bahasa == "cpp" || $bahasa == "c")
        {
            system("rm asset/submission_files/" . $rawName); //hapus file yang dibuat saat compile pertama
            system("rm asset/submission_files/" . $rawName . ".out"); //hapus file yang dibuat compile dua
        }
        else if ($bahasa == "pascal")
        {
            system("rm asset/submission_files/" . $rawName); //hapus file yang dibuat saat compile pertama
            system("rm asset/submission_files/" . $rawName . ".out"); //hapus file yang dibuat compile dua
            system("rm asset/submission_files/" . $rawName . ".o"); //hapus file saat dikompile
        }
        else if ($bahasa == "java")
        {
// -d(directory), unlink FILE, even if it is a non-empty directory (super-user only)
// -R(recursive), remove the contents of directories recursively
            system("rm -d -R asset/submission_files/" . $id); //hapus folder untuk penampungan
        }

//update db

        if ($hasil == "Accepted")
        {
            if ($this->judgeModel->getSolved($submission['id_soal_pemrograman'], $submission['id_tim']))
            {
                $this->judgeModel->updateSubmission($id, $runtime, 'Solved', 0);
            }
            else
            { // blm pernah ac sblmnya
                $time = $submission['jam']; //jam kirim
                $tampung = explode(":", $time);
                $jam1 = $tampung[0];
                $menit1 = $tampung[1];

//jam kontes mulai
                $kontesId = $this->judgeModel->getKontesId($submission['id_soal_pemrograman']);
                $kontes_start = $this->judgeModel->getKontesPemrogramanStart($kontesId);
                $tampung = explode(":", $kontes_start);
                $jam2 = $tampung[0];
                $menit2 = $tampung[1];

//selisih jam sekarang - jam kontes mulai
                $selisih = ($jam1 * 60 + $menit1) - ($jam2 * 60 + $menit2);
                $jumlah = $this->judgeModel->getJumlahSubmission($submission['id_tim'], $submission['id_soal_pemrograman']);
                $poin = $selisih + (20 * $jumlah);
                $this->judgeModel->updateSubmission($id, $runtime, $hasil, $poin);
            }
        }
        else
        {
            if ($this->judgeModel->getSolved($submission['id_soal_pemrograman'], $submission['id_tim'])) {
                $this->judgeModel->updateSubmission($id, $runtime, 'Solved', 0);
            }
            else {
                $this->judgeModel->updateSubmission($id, $runtime, $hasil, 0);
            }
        }
        redirect(base_url() . "admin/judge");
    }

    public function pascal_compile_error($submissionId)
    {
        $submission = $this->judgeModel->getSubmissionById($submissionId);
        if(!isset($submission))
        {
            redirect(base_url() . 'judge');
        }
        $id = $submission['id'];
        $this->judgeModel->updateSubmission($id, 0, 'Compile Error', 0);
        redirect(base_url() . 'admin/judge');
    }

    public function submissions($contestId)
    {
        if($this->input->is_ajax_request())
        {
            $this->data['submissions'] = $this->judgeModel->getSubmissionsByContest($contestId);
            $this->render_view('sie_soal_programming/submission_list_ajax', NULL);
        }
        else
        {
            $contest = $this->progModel->getContestById($contestId);
            if(empty($contest))
            {
                redirect(base_url() . 'admin/programming');
            }

            $this->data['submissions'] = $this->judgeModel->getSubmissionsByContest($contestId);
            $this->data['contest'] = $contest;

            //$this->load->view('admin/admin_submission_view', $data);
            $this->render_view('sie_soal_programming/submission_list', 'sie_soal/master_soal');
        }
    }

    public function rejudge($problemId)
    {
        $problem = $this->progModel->getProblem($problemId);
        if(!isset($problem))
        {
            redirect(base_url() . 'admin/judge');
        }
        $this->judgeModel->resetSubmission($problemId);
        $_SESSION['resetSubmission'] = 1;
        $this->session->mark_as_flash('resetSubmission');
        redirect(base_url() . 'admin/judge');
    }

}