<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 12/31/2015
 * Time: 10:02 PM
 */

class Logika_model extends MY_Model
{
    private $offset = 25200;
    public function getFinishedContests($competitionId)
    {
        $competitionId = parent::sanitize_input($competitionId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT k.id,k.nama,k.tanggal,k.jam_mulai,k.jam_selesai,k.jml_soal
        FROM kontes_pilgan k INNER JOIN admin a ON k.id_admin = a.id
        WHERE a.id_kompetisi = ? AND ((k.tanggal< ?) OR (k.tanggal = ? AND k.jam_selesai<=?)) order by k.tanggal desc";
        $param = [$competitionId, $currentDate, $currentDate, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    function getUpcomingContests($competitionId) {
        $competitionId = parent::sanitize_input($competitionId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT k.id,k.nama,k.tanggal,k.jam_mulai,k.jam_selesai,k.jml_soal
        FROM kontes_pilgan k INNER JOIN admin a ON a.id = k.id_admin
        WHERE a.id_kompetisi = ? AND k.tanggal > ? OR k.tanggal = ? AND ? < k.jam_mulai";
        $param = [$competitionId, $currentDate, $currentDate, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    function getRunningContests($competitionId) {
        $competitionId = parent::sanitize_input($competitionId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT k.id,k.nama,k.tanggal,k.jam_mulai,k.jam_selesai,k.jml_soal
        FROM kontes_pilgan k INNER JOIN admin a ON k.id_admin = a.id
        WHERE a.id_kompetisi = ? AND k.tanggal = ? AND ? >= k.jam_mulai AND ? < k.jam_selesai";
        $param = [$competitionId, $currentDate, $currentTime, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function createLogikaContest($contestName, $date, $startTime, $endTime, $totalProblems, $creatorId)
    {
        $contestName = parent::sanitize_input($contestName);
        $date = parent::sanitize_input($date);
        $startTime = parent::sanitize_input($startTime);
        $endTime = parent::sanitize_input($endTime);
        $totalProblems = parent::sanitize_input($totalProblems);
        $creatorId = parent::sanitize_input($creatorId);

        $date = gmdate('Y-m-d', strtotime($date) + $this->offset);
        $startTime = gmdate('H:i:s', strtotime($startTime) + $this->offset);
        $endTime = gmdate('H:i:s', strtotime($endTime) + $this->offset);
        
        $sql = "INSERT INTO kontes_pilgan(nama,tanggal,jam_mulai,jam_selesai,jml_soal,id_admin) VALUES
        (?,?,?,?,?,?)";
        $param = [$contestName, $date, $startTime, $endTime, $totalProblems, $creatorId];
        $this->db->query($sql, $param);
        return $this->db->insert_id();
    }

    public function getContestById($contestId, $needsCreatorInfo = false)
    {
        $contestId = $this->sanitize_input($contestId);
        $needsCreatorInfo = $this->sanitize_input($needsCreatorInfo);
        if($needsCreatorInfo == false)
        {
            $sql = "SELECT id, nama, tanggal, jam_mulai, jam_selesai, jml_soal AS jumlah_soal FROM kontes_pilgan WHERE id = ?";
        }
        else
        {
            $sql = "SELECT id, nama, tanggal, jam_mulai, jam_selesai, jml_soal AS jumlah_soal , id_admin FROM kontes_pilgan WHERE id = ?";
        }

        $param = [$contestId];
        $res = $this->db->query($sql, $param);
        return $res->row_array();
    }

    public function getRunningContestById($contestId)
    {
        $contestId = $this->sanitize_input($contestId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT id, nama, tanggal, jam_mulai, jam_selesai, jml_soal AS jumlah_soal FROM kontes_pilgan
        WHERE id = ? AND tanggal = ? AND (jam_mulai <= ? AND jam_selesai > ?)";

        $param = [$contestId, $currentDate, $currentTime, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->row_array();
    }

    public function getProblemSet($contestId, $competitionId = null)
    {
        $contestId= parent::sanitize_input($contestId);
        if($competitionId === null)
        {
            $sql = "SELECT id, nomor, isi, jawaban FROM soal_pilgan WHERE id_kontes_pilgan = ?
            ORDER BY nomor ASC";
            $param = [$contestId];
        }
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getProblemSetAndTeamsAnswer($contestId,$teamsId,$competitionId = null)
    {
        $contestId= parent::sanitize_input($contestId);
        if($competitionId === null)
        {
            $sql = "SELECT s.id, s.nomor, s.isi, s.jawaban,sp.id as submission ,sp.jawaban as jawabanTim
            FROM soal_pilgan as s left join (select * from submission_pilgan where id_tim=?) as sp on s.id=sp.id_soal_pilgan
            WHERE s.id_kontes_pilgan = ?
            ORDER BY nomor ASC";


            $param = [$teamsId,$contestId];
        }
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }


    function getNamaKontesPilganWithId2($id_kontes) {
        $id_kontes = parent::sanitize_input($id_kontes);
        $offset = 7 * 60 * 60; //converting to seconds.
        $dateFormat = "H:i:s";
        $time = gmdate($dateFormat, time() + $offset);
        $dateFormat2 = "Y-m-d";
        $date = gmdate($dateFormat2, time() + $offset);
        $sql = "select nama,jml_soal
        from kontes_pilgan
        where id = ?";
        $param = [$id_kontes];
        $result = $this->db->query($sql,$param);
        return $result->row_array();
    }

    public function getProblem($problemId)
    {
        $problemId = parent::sanitize_input($problemId);
        $sql = "SELECT s.id,s.nomor, s.isi AS soal, s.jawaban, s.id_kontes_pilgan AS id_kontes FROM soal_pilgan s
        WHERE s.id = ?";
        $param = [$problemId];
        $res = $this->db->query($sql, $param);
        return $res->row_array();
    }

    public function getPilihan($urutan,$id){
        $urutan=parent::sanitize_input($urutan);
        $id=parent::sanitize_input($id);
        $sql = "SELECT isi FROM pilihan WHERE urutan = ? AND id_soal_pilgan = ?";
        $param = [$urutan,$id];
        $result = $this->db->query($sql,$param);
        return $result->row_array();
    }

    function getPilihanAllSoal($nomor, $id_kontes) {
        $nomor = parent::sanitize_input($nomor);
        $id_kontes = parent::sanitize_input($id_kontes);
        $sql = "select isi
        from pilihan
        where id_soal_pilgan = (select id
        from soal_pilgan
        where id_kontes_pilgan = ? and nomor = ?)
        order by id asc";
        $param = [$id_kontes,$nomor];
        $result = $this->db->query($sql,$param);
        return $result->result_array();
    }

    public function getJawaban($problemId){
        $problemId = parent::sanitize_input($problemId);
        $sql = "SELECT urutan,isi FROM pilihan WHERE id_soal_pilgan = ?";
        $param = [$problemId];
        $result = $this->db->query($sql,$param);
        return $result->result_array();
    }

    function setSoalKontesPilgan($isi, $jawaban, $id_kontes_pilgan) {
        $jawaban = parent::sanitize_input($jawaban);
        $id_kontes_pilgan = parent::sanitize_input($id_kontes_pilgan);
        //$isi = str_replace("'", "''", $isi);
        //$isi = parent::sanitize_input($isi);

        $sql = "insert into soal_pilgan(nomor,isi,jawaban,id_kontes_pilgan) values(?,?,?,?)";
        $nomor = $this->getLatestProblemNumber($id_kontes_pilgan);

        if($nomor === null)
            $nomor = 1;
        else
            $nomor++;

        $param = [$nomor, $isi, $jawaban, $id_kontes_pilgan];

        $sqlUpdateJumlah = "UPDATE kontes_pilgan SET jml_soal = (jml_soal + 1) WHERE id = ?";
        $updateParam = [$id_kontes_pilgan];

        $this->db->trans_start();
        $this->db->query($sql, $param);
        $this->db->query($sqlUpdateJumlah, $updateParam);
        $this->db->trans_complete();

        $query = "SELECT id FROM soal_pilgan ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($query);
        return $result->row_array();
    }

    function setPilihanPilgan($urutan, $isi, $id_soal_pilgan) {
        $urutan = parent::sanitize_input($urutan);
        $id_soal_pilgan = parent::sanitize_input($id_soal_pilgan);
        //$isi = str_replace("'", "''", $isi);

        $sql = "insert into pilihan(urutan,isi,id_soal_pilgan) values(?,?,?)";
        $param = [$urutan, $isi, $id_soal_pilgan];
        $this->db->query($sql,$param);
    }

    public function getLatestProblemNumber($contestId)
    {
        $contestId = parent::sanitize_input($contestId);
        $sql = "SELECT nomor FROM soal_pilgan WHERE id_kontes_pilgan = ?
        ORDER BY id DESC LIMIT 1";
        $param = [$contestId];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();
        return $result['nomor'];
    }

    public function updateProblem($isi, $jawaban, $id_kontes_pilgan)
    {
        $jawaban = parent::sanitize_input($jawaban);
        $id_kontes_pilgan = parent::sanitize_input($id_kontes_pilgan);
        //$isi = str_replace("'", "''", $isi);
        //$isi = parent::sanitize_input($isi);

        $sql = "UPDATE soal_pilgan SET isi = ?, jawaban = ? WHERE id = ?";
        $param = [$isi, $jawaban, $id_kontes_pilgan];
        $this->db->query($sql,$param);
    }

    public function updatePilihanPilgan($urutan, $isi, $id_soal_pilgan){
        $urutan = parent::sanitize_input($urutan);
        $id_soal_pilgan = parent::sanitize_input($id_soal_pilgan);
        //$isi = str_replace("'", "''", $isi);
        //$isi = parent::sanitize_input($isi);

        $sql = "UPDATE pilihan SET isi = ? WHERE urutan = ? AND id_soal_pilgan = ?";
        $param = [$isi,$urutan, $id_soal_pilgan];
        $this->db->query($sql,$param);
    }

    public function updateLogikaContest($contestName,$date, $startTime, $endTime, $contestId){
        $contestName = parent::sanitize_input($contestName);
        $date = parent::sanitize_input($date);
        $startTime = parent::sanitize_input($startTime);
        $endTime = parent::sanitize_input($endTime);
        $contestId = parent::sanitize_input($contestId);
       
        $date = gmdate('Y-m-d', strtotime($date) + $this->offset);
        $startTime = gmdate('H:i:s', strtotime($startTime) + $this->offset);
        $endTime = gmdate('H:i:s', strtotime($endTime) + $this->offset);

        $sql = "UPDATE kontes_pilgan SET nama = ?, tanggal = ?, jam_mulai = ?, jam_selesai = ?
        WHERE id = ? ";
        $param = [$contestName, $date, $startTime, $endTime,$contestId];
        $this->db->query($sql, $param);
    }

    public function getReadyTeam($competitionId, $contestId)
    {
        $competitionId = parent::sanitize_input($competitionId);
        $contestId = parent::sanitize_input($contestId);
        $sql = "SELECT t.id, t.nama AS  'nama_tim', t.status, s.nama AS  'nama_sekolah', s.kota AS  'kota_sekolah',
        k.nama AS 'kabupaten', p.nama AS 'provinsi',
        ( select count(*) from mengikuti_kontes_pilgan mkp
        where mkp.id_kontes_pilgan = ? and mkp.id_tim = t.id ) as 'jumlah'
        FROM tim t INNER JOIN guru g ON t.id_guru_pendamping = g.id
        INNER JOIN sekolah s ON s.id = g.id_sekolah
        INNER JOIN kabupaten k ON k.id = s.id_kabupaten
        INNER JOIN provinsi p ON p.id = k.id_provinsi
        WHERE t.id_kompetisi = ?
        AND t.status =  'ready'
        ORDER BY s.nama";
        $param = [$contestId, $competitionId];
        $res = $this->db->query($sql,$param);
        return $res->result_array();
    }

    public function updateMengikutiPilgan($contestId, $teamsId)
    {
        $contestId = parent::sanitize_input($contestId);
        //$teamsId = parent::sanitize_input($teamsId);
        $score = 0;

        //var_dump($sql); print_r($param); die();

        $sqlDelete = "DELETE from mengikuti_kontes_pilgan
        where id_kontes_pilgan = ?";
        $paramDelete = [$contestId];

        if(is_array($teamsId))
        {
            $sql = "INSERT INTO mengikuti_kontes_pilgan(id_tim,id_kontes_pilgan,score) VALUES ";
            $param = array();
            for($i=0; $i < count($teamsId); $i++)
            {
                if($i == (count($teamsId) - 1))
                {
                    $sql .= " (?,?,?)";
                }
                else
                {
                    $sql .= " (?,?,?),";
                }
                $param[] = parent::sanitize_input($teamsId[$i]);
                $param[] = $contestId;
                $param[] = $score;
            }

            $this->db->trans_start();
            $this->db->query($sqlDelete, $paramDelete);
            $this->db->query($sql, $param);
            $this->db->trans_complete();
        }
        else
        {
            $this->db->query($sqlDelete, $paramDelete);
        }
    }

    function getScoreMultipleChoice($id_kontes, $id_kompetisi) {
        $id_kontes = parent::sanitize_input($id_kontes);
        $id_kompetisi = parent::sanitize_input($id_kompetisi);
        if ($id_kompetisi == 1) {
            $sql = "select t.nama as nama_tim,s.nama as nama_sekolah,(select score from mengikuti_kontes_pilgan where id_tim=t.id and id_kontes_pilgan=?) as score
            from tim t,guru_pendamping g, sekolah s
            where t.id_guru_pendamping=g.id and g.id_sekolah=s.id and t.id in
            (select id_tim from mengikuti_kontes_pilgan
            where id_kontes_pilgan=?)
            order by score desc";
        } else {
            $sql = "select t.nama as nama_tim,s.nama as nama_sekolah,k.nama AS kabupaten,(select score from mengikuti_kontes_pilgan
            where id_tim=t.id and id_kontes_pilgan=?) as score
            from tim t LEFT JOIN guru g ON t.id_guru_pendamping = g.id LEFT JOIN sekolah s ON g.id_sekolah = s.id
            INNER JOIN kabupaten k ON k.id = s.id_kabupaten
            where t.id in (select id_tim from mengikuti_kontes_pilgan where id_kontes_pilgan=?)
            order by score desc";
        }

        $param = [$id_kontes,$id_kontes];
        $hasil = $this->db->query($sql,$param);
        return $hasil->result_array();
    }

    /**
     * @param $id_kontes
     * @return mixed
     */
    function getKlarifikasiBelumDijawab($id_kontes)
    { //untuk yang belum dijawab
        $id_kontes = parent::sanitize_input($id_kontes);

        $sql = "SELECT k.id, k.waktu_kirim,k.pertanyaan, s.nomor,t.nama
        FROM klarifikasi_pilgan k INNER JOIN soal_pilgan s ON s.id = k.id_soal_pilgan
        INNER JOIN tim t ON t.id = k.id_tim 
        WHERE s.id_kontes_pilgan = ? AND k.jawaban IS NULL";

        $param = [$id_kontes];
        $result = $this->db->query($sql,$param);
        return $result->result_array();
    }

    function getKlarifikasiSudahDijawab($id_kontes) {  //untuk yang sudah dijawab
        $id_kontes = parent::sanitize_input($id_kontes);

        $sql = "SELECT k.id, k.waktu_kirim,k.pertanyaan, s.nomor,t.nama, k.jawaban
        FROM klarifikasi_pilgan k INNER JOIN soal_pilgan s ON s.id = k.id_soal_pilgan
        INNER JOIN tim t ON t.id = k.id_tim 
        WHERE s.id_kontes_pilgan = ? AND k.jawaban IS NOT NULL";
        $param = [$id_kontes];
        $result = $this->db->query($sql,$param);
        return $result->result_array();
    }

    function setJawabanKlarPilgan($id_admin, $jawaban, $id_klar) {
        $id_admin = parent::sanitize_input($id_admin);
        $jawaban = parent::sanitize_input($jawaban);
        $id_klar = parent::sanitize_input($id_klar);
        $dateFormat = "H:i:s";
        $time = gmdate($dateFormat, time() + $this->offset);
        $sql = "update klarifikasi_pilgan set jawaban=?, id_admin=?, waktu_jawab=?
        where id = ?";
        $param = [$jawaban,$id_admin,$time,$id_klar];
        $this->db->query($sql,$param);
    }

    public function isContestExpired($contestId)
    {
        $contestId = parent::sanitize_input($contestId);

        $time = gmdate('H:i:s', time() + $this->offset);
        $date = gmdate("Y-m-d", time() + $this->offset);
       
        $sql = "select id,nama,jml_soal
        from kontes_pilgan
        where id = ? and (tanggal < ? or(tanggal= ? and jam_selesai < ?))";
        $param = [$contestId, $date, $date, $time];
        $result = $this->db->query($sql,$param);
        return $result->row_array();
    }

    public function getOptions($nomor, $id_kontes)
    {
        $nomor = $this->sanitize_and_escape($nomor);
        $id_kontes = $this->sanitize_and_escape($id_kontes);
        $sql = "select urutan, isi
        from pilihan
        where id_soal_pilgan = (select id
        from soal_pilgan
        where id_kontes_pilgan = '" . $id_kontes . "' and nomor = '" . $nomor . "')
        order by id asc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function isContestAvailable($logikaContestId)
    {
        $logikaContestId = parent::sanitize_input($logikaContestId);
        $offset = 7 * 60 * 60; //converting to seconds GMT +7.
        $time = gmdate("H:i:s", time() + $offset);
        $date = gmdate("Y-m-d", time() + $offset);
        $sql = "select id
        from kontes_pemrograman
        where id = ?";
        $param = [$logikaContestId];
        $res = $this->db->query($sql,$param);
        if ($res->num_rows() > 0)
            return true;
        else
            return false;
    }
}