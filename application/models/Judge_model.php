<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 30/12/2015
 * Time: 19:53
 */
class Judge_model extends MY_Model
{
    public function getPendingSubmission()
    {
        $sql = "SELECT sp.id, t.nama AS 'nama_tim' , soal.nomor AS urutan_soal, soal.judul AS nama_soal,
            s.nama AS nama_sekolah, sp.jam, sp.file, sp.bahasa, k.nama AS kabupaten
            FROM submission_pemrograman sp INNER JOIN tim t ON t.id = sp.id_tim
              INNER JOIN soal_pemrograman soal ON soal.id = sp.id_soal_pemrograman
              INNER JOIN guru g ON t.id_guru_pendamping = g.id
              INNER JOIN sekolah s ON s.id = g.id_sekolah
              INNER JOIN kabupaten k ON k.id = s.id_kabupaten
            WHERE sp.hasil = 'Pending'";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getSubmissionsByContest($contestId)
    {
        $contestId = parent::sanitize_input($contestId);
        //$competitionId= parent::sanitize_input($competitionId);

        $sql = "SELECT sp.id, t.nama AS 'nama_tim' , soal.nomor AS urutan_soal, soal.judul AS nama_soal,
            s.nama AS nama_sekolah, sp.jam, sp.bahasa, sp.hasil, sp.file, sp.runtime, k.nama AS kabupaten
            FROM submission_pemrograman sp INNER JOIN tim t ON t.id = sp.id_tim
              INNER JOIN soal_pemrograman soal ON soal.id = sp.id_soal_pemrograman
              INNER JOIN guru g ON t.id_guru_pendamping = g.id
              INNER JOIN sekolah s ON s.id = g.id_sekolah
              INNER JOIN kabupaten k ON k.id = s.id_kabupaten
            WHERE sp.id_soal_pemrograman IN
              (SELECT id FROM soal_pemrograman where id_kontes_pemrograman = ?)
              ORDER BY sp.jam DESC";
        $param = [$contestId];
        $res = $this->db->query($sql,$param);
        return $res->result_array();
    }

    public function getSubmissionById($submissionId)
    {
        $submissionId = parent::sanitize_input($submissionId);
        $sql = "select *
                from submission_pemrograman
                where id= ? ";
        $param = [$submissionId];
        $result = $this->db->query($sql,$param);
        return $result->row_array();
    }


    public function updateSubmissionStatus($submissionId, $hasil)
    {
        $submissionId = parent::sanitize_input($submissionId);
        $hasil = parent::sanitize_input($hasil);
        $sql = "update submission_pemrograman set hasil = ?
                where id = ?";
        $param = [$hasil, $submissionId];
        $this->db->query($sql,$param);
    }

    function updateSubmission($id_sub, $runtime, $hasil, $poin)
    {
        $id_sub = $this->sanitize_and_escape($id_sub);
        $runtime = $this->sanitize_and_escape($runtime);
        $hasil = $this->sanitize_and_escape($hasil);
        $poin = $this->sanitize_and_escape($poin);
        $sql = "update submission_pemrograman set runtime = '" . $runtime . "', hasil = '" . $hasil . "', poin = '" . $poin . "'
                where id = '" . $id_sub . "'";
        $this->db->query($sql);
    }

    public function getDataSoalPemrograman($id_soal)
    {
        $id_soal = parent::sanitize_input($id_soal);
        $sql = "select input, output, time_limit
                from soal_pemrograman
                where id = ?";
        $param = [$id_soal];
        $result = $this->db->query($sql, $param);
        return $result->row_array();
    }

    function getSolved($id_soal, $id_tim)
    {
        $id_soal = $this->sanitize_and_escape($id_soal);
        $id_tim = $this->sanitize_and_escape($id_tim);
        $sql = "select id
                from submission_pemrograman
                where hasil = 'Accepted' and id_soal_pemrograman='" . $id_soal . "' and id_tim = '" . $id_tim . "'";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getKontesId($idSoal)
    {
        $idSoal = $this->sanitize_and_escape($idSoal);
        $sql = "select id_kontes_pemrograman
                from soal_pemrograman
                where id='" . $idSoal . "'";
        $result = $this->db->query($sql);
        $hasil = $result->row_array();

        return $hasil['id_kontes_pemrograman'];
    }

    function getKontesPemrogramanStart($id_kontes)
    {
        $id_kontes = $this->sanitize_and_escape($id_kontes);
        $sql = "select jam_mulai
                from kontes_pemrograman
                where id = '" . $id_kontes . "'";
        $result = $this->db->query($sql);
        $result = $result->row_array();
        return $result['jam_mulai'];
    }

    function getJumlahSubmission($id_tim, $id_soal)
    {
        $id_tim = $this->sanitize_and_escape($id_tim);
        $id_soal = $this->sanitize_and_escape($id_soal);
        $sql = "select count(*) as total
                from submission_pemrograman
                where id_tim='" . $id_tim . "' and id_soal_pemrograman='" . $id_soal . "' and hasil!='Solved' and hasil !='Pending' and hasil !='Judging'";
        $result = $this->db->query($sql);
        $hasil = $result->row_array();

        return $hasil['total'];
    }

    public function resetSubmission($problemId)
    {
        $problemId = parent::sanitize_input($problemId);
        $sql = "UPDATE submission_pemrograman SET runtime = ?, hasil = ?, poin = ? WHERE id_soal_pemrograman = ?";
        $param = [0, 'Pending', 0, $problemId];
        $this->db->query($sql,$param);
    }
}