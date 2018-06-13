<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 13/09/2015
 * Time: 10:54
 */
class Competition_model extends MY_Model
{
    // offset waktu GMT+7 dlm detik
    private $offset = 25200;

    /**
     * @return mixed id nya kompetisi yang sedang buka
     */
    public function getOpenCompetitionId()
    {
        $sql = "SELECT id FROM kompetisi WHERE status = 'buka'";
        $executedQuery = $this->db->query($sql);
        $result = $executedQuery->row_array();
        return $result['id'];
    }

    function getKompetisiWithId($idKompetisi) {
        $idKompetisi = $this->sanitize_input($idKompetisi);
        $sql = "select * from kompetisi
                where id= ?";
        $bindParam = [$idKompetisi];
        $result = $this->db->query($sql, $bindParam);
        return $result->row_array();
    }

    function getMaxPoin($id_kontes) {
        $id_kontes = $this->sanitize_and_escape($id_kontes);
        $sql = "select max_poin_ac
                from kompetisi
                where id = (select k.id
                from kompetisi k, admin a
                where a.id_kompetisi = k.id and a.id = (select id_admin from kontes_pemrograman where id='" . $id_kontes . "'))";

        $result = $this->db->query($sql);
        $result = $result->row_array();
        return $result['max_poin_ac'];
    }

    public function isProgrammingContestAvailable($contestId)
    {
        $contestId = $this->sanitize_input($contestId);

        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT id
          FROM kontes_pemrograman
          WHERE id = ? AND tanggal = ? AND (jam_mulai <= ? AND jam_selesai > ?) ";
        $param = [$contestId, $currentDate, $currentTime, $currentTime];
        $res = $this->db->query($sql, $param);
        if ($res->num_rows() > 0)
            return true;
        else
            return false;
    }

    public function isMultipleChoiceContestAvailable($contestId)
    {
        $contestId = $this->sanitize_input($contestId);

        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "select id
                from kontes_pilgan
                WHERE id = ? AND tanggal = ? AND (jam_mulai <= ? AND jam_selesai > ?) ";
        $param = [$contestId, $currentDate, $currentTime, $currentTime];
        $res = $this->db->query($sql, $param);
        if ($res->num_rows() > 0)
            return true;
        else
            return false;
    }

    function bolehIkutKontesPemrograman($id_kontes, $id_tim) {
        $id_kontes = $this->sanitize_and_escape($id_kontes);
        $id_tim = $this->sanitize_and_escape($id_tim);

        $sql = "select count(*) as jumlah
                from mengikuti_kontes_pemrograman
                where id_tim = '" . $id_tim . "' and id_kontes_pemrograman='" . $id_kontes . "'";
        $result = $this->db->query($sql);
        $result = $result->row_array();

        if ($result['jumlah'] == 0) {
            return false;
        } else {
            return true;
        }
    }

    function bolehIkutKontesPilgan($id_kontes, $id_tim) {
        $id_kontes = $this->sanitize_and_escape($id_kontes);
        $id_tim = $this->sanitize_and_escape($id_tim);

        $sql = "select count(*) as jumlah
                from mengikuti_kontes_pilgan
                where id_tim = '" . $id_tim . "' and id_kontes_pilgan='" . $id_kontes . "'";
        $result = $this->db->query($sql);
        $result = $result->row_array();

        if ($result['jumlah'] == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getNamaKontesPemrograman($id_kontes)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $sql = "select nama
                from kontes_pemrograman
                where id= ?";
        $param = [$id_kontes];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();
        return $result['nama'];
    }

    public function getScoreboardUrlKontesPemrograman($id_kontes)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $sql = "select scoreboard_name
                from kontes_pemrograman
                where id= ?";
        $param = [$id_kontes];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();
        return $result['scoreboard_name'];
    }

    public function getNamaKontesPilgan($id_kontes)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $sql = "select nama
                from kontes_pilgan
                where id = ?";
        $param = [$id_kontes];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();
        return $result['nama'];
    }

    public function pernahIkutKontesPemrograman($id_kontes, $id_tim)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $id_tim = $this->sanitize_input($id_tim);

        $sql = "select count(*) as jumlah
                from mengikuti_kontes_pemrograman
                where id_kontes_pemrograman= ? and id_tim = ? and jam_ikut = '00:00:00'";
        $param = [$id_kontes, $id_tim];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();
        if ($result['jumlah'] > 0) {
            return false;
        }
        else {
            return true;
        }
    }

    public function pernahIkutKontesPilgan($id_kontes, $id_tim)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $id_tim = $this->sanitize_input($id_tim);

        $sql = "select count(*) as jumlah
                from mengikuti_kontes_pilgan
                where id_kontes_pilgan = ? and id_tim = ? and jam_ikut='00:00:00'";
        $param = [$id_kontes, $id_tim];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();

        if ($result['jumlah'] > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function setJamIkutKontesPemrograman($id_kontes, $id_tim)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $id_tim = $this->sanitize_input($id_tim);

        $time = gmdate('H:i:s', time() + $this->offset);

        $sql = "UPDATE mengikuti_kontes_pemrograman
                SET jam_ikut = ?
                where id_kontes_pemrograman= ? and id_tim = ? ";
        $param = [$time, $id_kontes, $id_tim];
        $this->db->query($sql,$param);
    }

    public function setJamIkutKontesPilgan($id_kontes, $id_tim)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $id_tim = $this->sanitize_input($id_tim);

        $time = gmdate('H:i:s', time() + $this->offset);

        $sql = "update mengikuti_kontes_pilgan
                set jam_ikut = ?
                where id_kontes_pilgan = ? and id_tim = ?";
        $param = [$time, $id_kontes, $id_tim];
        $this->db->query($sql,$param);
    }

    public function getContestsToJoin($teamId)
    {
        $progContests = $this->getProgrammingContestsToJoin($teamId);
        $logicContests = $this->getMultipleChoiceContestsToJoin($teamId);
        /*print_r($progContests); echo "<br>";
        print_r($logicContests);echo "<br>";*/
        $contests = array_merge($progContests,$logicContests);
        /*print_r($contests);
        var_dump($teamId);
        die();*/

        return $contests;
    }

    private function getProgrammingContestsToJoin($teamId)
    {
        $teamId = parent::sanitize_input($teamId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT kp.id AS id_kontes, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal, 'programming' AS tipe
          FROM kontes_pemrograman kp INNER JOIN mengikuti_kontes_pemrograman mkp ON kp.id = mkp.id_kontes_pemrograman
          WHERE mkp.id_tim = ? AND kp.tanggal = ? AND (kp.jam_mulai <= ? AND kp.jam_selesai > ?) ";
        $param = [$teamId, $currentDate, $currentTime, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    private function getMultipleChoiceContestsToJoin($teamId)
    {
        $teamId = parent::sanitize_input($teamId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT kp.id AS id_kontes, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal, 'multiple_choice' AS tipe
                from kontes_pilgan kp INNER JOIN mengikuti_kontes_pilgan mkp ON kp.id = mkp.id_kontes_pilgan
                WHERE mkp.id_tim = ? AND kp.tanggal = ? AND (kp.jam_mulai <= ? AND kp.jam_selesai > ?) AND kp.jml_soal > 0 ";
        $param = [$teamId, $currentDate, $currentTime, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getUpcomingContestsToJoin($teamId)
    {
        $progContests = $this->getUpcomingProgrammingContestsToJoin($teamId);
        $logicContests = $this->getUpcomingMultipleChoiceContestsToJoin($teamId);

        $contests = array_merge($progContests,$logicContests);
        return $contests;
    }

    private function getUpcomingProgrammingContestsToJoin($teamId) {
        $teamId = parent::sanitize_input($teamId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT kp.id AS id_kontes, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal, 'programming' AS tipe
          FROM kontes_pemrograman kp INNER JOIN mengikuti_kontes_pemrograman mkp ON kp.id = mkp.id_kontes_pemrograman
          WHERE mkp.id_tim = ?  AND kp.jml_soal > 0 AND ((kp.tanggal = ? AND kp.jam_mulai > ? ) OR (kp.tanggal > ?))";
        $param = [$teamId, $currentDate, $currentTime, $currentDate];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    private function getUpcomingMultipleChoiceContestsToJoin($teamId)
    {
        $teamId = parent::sanitize_input($teamId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT kp.id AS id_kontes, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal, 'multiple_choice' AS tipe
                from kontes_pilgan kp INNER JOIN mengikuti_kontes_pilgan mkp ON kp.id = mkp.id_kontes_pilgan
                WHERE mkp.id_tim = ? AND kp.jml_soal > 0 AND ((kp.tanggal = ? AND kp.jam_mulai > ?) OR kp.tanggal > ? )";
        $param = [$teamId, $currentDate, $currentTime, $currentDate];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    /**
     * cuma ngambil id, nomor, judul soal
     * @param $contestId
     * @return mixed
     */
    public function getProgrammingProblemsId($contestId)
    {
        $contestId = parent::sanitize_input($contestId);
        $sql = "SELECT id, nomor, judul FROM soal_pemrograman WHERE id_kontes_pemrograman = ?";
        $param = [$contestId];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getMultipleChoiceProblemsId($contestId)
    {
        $contestId = parent::sanitize_input($contestId);
        $sql = "SELECT id, nomor FROM soal_pilgan WHERE id_kontes_pilgan = ?";
        $param = [$contestId];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getMultipleChoiceAnswers($contestId)
    {
        $contestId = parent::sanitize_input($contestId);
        $sql = "SELECT id, nomor, jawaban FROM soal_pilgan WHERE id_kontes_pilgan = ?";
        $param = [$contestId];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function setProgrammingSubmission($teamId, $problemId, $language, $file)
    {
        $submitTime = gmdate("H:i:s", time() + $this->offset);
        $file = parent::sanitize_input($file);
        $teamId = parent::sanitize_input($teamId);
        $problemId = parent::sanitize_input($problemId);
        $language = parent::sanitize_input($language);

        $sql = "insert into submission_pemrograman(id_tim, id_soal_pemrograman, jam, bahasa, file,poin,hasil)
                values(?, ?, ?, ?, ?, '0','Pending')";
        $param = [$teamId, $problemId, $submitTime, $language, $file];
        $this->db->query($sql, $param);
        //return $this->db->insert_id();
    }

    public function getProgrammingSubmissions($contestId, $teamId)
    {
        $contestId = parent::sanitize_input($contestId);
        $teamId = parent::sanitize_input($teamId);
        $sql = "SELECT subs.jam, subs.bahasa, subs.hasil, soal.nomor AS nomor_soal, soal.judul
                FROM submission_pemrograman subs INNER JOIN soal_pemrograman soal ON soal.id = subs.id_soal_pemrograman
                WHERE subs.id_tim = ? AND soal.id_kontes_pemrograman = ? ORDER BY subs.jam DESC";
        $param = [$teamId, $contestId];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getProgrammingClarifications($contestId, $teamId)
    {
        $contestId = parent::sanitize_input($contestId);
        $teamId = parent::sanitize_input($teamId);
        $sql = "SELECT kp.waktu_kirim, kp.waktu_jawab, kp.pertanyaan, kp.jawaban, soal.nomor, soal.judul
                FROM klarifikasi_pemrograman kp INNER JOIN soal_pemrograman soal ON kp.id_soal_pemrograman = soal.id
                WHERE kp.id_tim = ? AND soal.id_kontes_pemrograman = ? ORDER BY kp.id DESC";
        $param = [$teamId, $contestId];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getMultipleChoiceClarifications($contestId, $teamId)
    {
        $contestId = parent::sanitize_input($contestId);
        $teamId = parent::sanitize_input($teamId);
        $sql = "SELECT kp.waktu_kirim, kp.waktu_jawab, kp.pertanyaan, kp.jawaban, soal.nomor
                FROM klarifikasi_pilgan kp INNER JOIN soal_pilgan soal ON kp.id_soal_pilgan = soal.id
                WHERE kp.id_tim = ? AND soal.id_kontes_pilgan = ? ORDER BY kp.id DESC";
        $param = [$teamId, $contestId];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function setProgrammingClarification($teamId, $problemId, $question)
    {
        $submitTime = gmdate("H:i:s", time() + $this->offset);
        $teamId = parent::sanitize_input($teamId);
        $problemId = parent::sanitize_input($problemId);
        $question = parent::sanitize_input($question);
        $sql = "INSERT INTO klarifikasi_pemrograman(pertanyaan, waktu_kirim, id_tim, id_soal_pemrograman)
              VALUES(?, ?, ?, ?)";
        $param = [$question, $submitTime, $teamId, $problemId];
        $this->db->query($sql, $param);
    }

    public function setMultipleChoiceClarification($teamId, $problemId, $question)
    {
        $submitTime = gmdate("H:i:s", time() + $this->offset);
        $teamId = parent::sanitize_input($teamId);
        $problemId = parent::sanitize_input($problemId);
        $question = parent::sanitize_input($question);
        $sql = "INSERT INTO klarifikasi_pilgan(pertanyaan, waktu_kirim, id_tim, id_soal_pilgan)
              VALUES(?, ?, ?, ?)";
        $param = [$question, $submitTime, $teamId, $problemId];
        $this->db->query($sql, $param);
    }

    public function getMultipleChoicePoint($competitionId)
    {
        $competitionId = parent::sanitize_input($competitionId);
        $sql = "select poin_benar,poin_salah,poin_kosong
                from kompetisi
                where id = ?";
        $param = [$competitionId];
        $res = $this->db->query($sql,$competitionId);
        return $res->row_array();
    }

    /**
     * cek apakah tim sudah pernah submit jawaban multiple choice , dengan mengecek kolom status pada DB
     * @param $teamId
     * @param $contestId
     * @return bool
     */
    public function hasSubmitMultipleChoice($teamId,$contestId)
    {
        $teamId = parent::sanitize_input($teamId);
        $contestId = parent::sanitize_input($contestId);
        $sql = "select status
                from mengikuti_kontes_pilgan
                where id_kontes_pilgan = ? and id_tim = ?";
        $param = [$contestId,$teamId];
        $res = $this->db->query($sql,$param);
        $hasil = $res->row_array();
        if ($hasil['status'] == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    public function saveMultipleChoiceSubmissions($teamId, $submissions, $point)
    {
        $teamId = parent::sanitize_input($teamId);
        //$hasSubmittedBefore = parent::sanitize_input($hasSubmittedBefore);

        $poinBenar = parent::sanitize_input($point['poin_benar']);
        $poinSalah = parent::sanitize_input($point['poin_salah']);
        $poinKosong = parent::sanitize_input($point['poin_kosong']);

        $sqlInsert = "INSERT INTO submission_pilgan(id_tim, id_soal_pilgan, jawaban, score) VALUES ";
        $paramInsert = array();
        $totalScore = 0;
        $jumlahSoal = count($submissions);
        for($i = 0; $i < $jumlahSoal; $i++)
        {
            if($i == count($submissions) - 1)
            {
                $sqlInsert .= '(?,?,?,?)';
            }
            else
            {
                $sqlInsert .= '(?,?,?,?) , ';
            }

            $score = 0;
            $jawabanPeserta = $this->sanitize_input($submissions[$i]['jawaban_peserta']);
            if($jawabanPeserta == null)
            {
                $score = $poinKosong;
            }
            elseif($jawabanPeserta == $submissions[$i]['kunci_jawaban'])
            {
                //print_r($jawabanPeserta);
                $score = $poinBenar;
            }
            else
            {
                $score = $poinSalah;
            }
            $paramInsert[] = $teamId;
            $paramInsert[] = $submissions[$i]['id_soal'];
            $paramInsert[] = $jawabanPeserta;
            $paramInsert[] = $score;
            $totalScore += $score;
        }
        $sqlDelete = "DELETE FROM submission_pilgan WHERE id_tim = ? AND (id_soal_pilgan BETWEEN ? AND ? )";
        $paramDelete = [$teamId, $submissions[0]['id_soal'], $submissions[$jumlahSoal-1]['id_soal']];
/*        echo $sqlInsert . "<br>";
        print_r($paramDelete); echo "<br>";
        print_r($paramInsert);*/

        $this->db->trans_start();
        $this->db->query($sqlDelete, $paramDelete);
        $this->db->query($sqlInsert, $paramInsert);
        $this->db->trans_complete();
        return $totalScore;
    }

    public function setMultipleChoiceTotalScore($id_tim, $id_kontes, $score)
    {
        $id_kontes = $this->sanitize_input($id_kontes);
        $id_tim = $this->sanitize_input($id_tim);
        $score = $this->sanitize_input($score);
        $sql = "UPDATE mengikuti_kontes_pilgan SET score = ?, status='1'
                WHERE id_tim = ? AND id_kontes_pilgan = ?";
        $param = [$score, $id_tim, $id_kontes];
        $this->db->query($sql,$param);
    }


}
?>