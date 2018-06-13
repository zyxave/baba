<?php
/**
 * User: CWR
 * Date: 07/10/2015
 * Time: 18:32
 */
class Admin_model extends MY_Model
{
    public function login($username, $password) {
        $username = $this->sanitize_input($username);


        $sql = "select a.id, a.nama, a.password, a.jabatan, a.id_kompetisi from admin a, kompetisi k
                where a.id_kompetisi = k.id
                and a.username = ? and k.status = 'buka'";
        $bindParam = array($username);
        $executedQuery = $this->db->query($sql, $bindParam);
        $row = $executedQuery->row_array();

        if($row === NULL)
        {
            $loginResult = NULL;
        }
        else
        {
            $password_hash = $row['password'];
            if(password_verify($password, $password_hash))
            {
                $loginResult = $row;
            }
            else
            {
                $loginResult = NULL;
            }
        }
        return $loginResult;

        /*$result = $this->db->query($sql);
        return $result->row_array();*/
    }

    function getTotalTeacher($search){
        if(!empty($search)) {
            $search = $this->sanitize_input($search);
            $this->db->like('nama',$search);
        }
        return $this->db->count_all_results('guru');
    }

    public function getTeacher($perPage, $offset, $search, $idKompetisi) {
        $perPage = $this->sanitize_and_escape($perPage);
        $offset = $this->sanitize_and_escape($offset);
        $idKompetisi = $this->sanitize_and_escape($idKompetisi);

        if(!empty($search))
        {
            $search = $this->sanitize_and_escape($search);
            $sql = "SELECT g.id, g.nama, g.email, g.telp, s.nama AS namasekolah, s.kota, kab.nama AS kab, (SELECT COUNT(t.id) FROM tim t WHERE g.id = t.id_guru_pendamping AND t.id_kompetisi = " . $idKompetisi . ") AS 'jumlahTim'
FROM guru g
LEFT JOIN sekolah s ON g.id_sekolah = s.id
LEFT JOIN kabupaten kab ON kab.id = s.id_kabupaten
WHERE g.nama LIKE '%" .$search."%'
LIMIT " .$perPage." OFFSET ". $offset;
        }
        else
        {
            $sql = "SELECT g.id, g.nama, g.email, g.telp, s.nama AS namasekolah, s.kota, kab.nama AS kab, 
  (SELECT COUNT(t.id) FROM tim t WHERE g.id = t.id_guru_pendamping AND t.id_kompetisi = " . $idKompetisi . ") AS 'jumlahTim'
FROM guru g
LEFT JOIN sekolah s ON g.id_sekolah = s.id
LEFT JOIN kabupaten kab ON kab.id = s.id_kabupaten
LIMIT " .$perPage." OFFSET ". $offset;
        }
        $getData = $this->db->query($sql);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }

    public function getTotalSekolah($search)
    {
        if(!empty($search)) {
            $search = $this->sanitize_input($search);
            $this->db->like('nama',$search);
        }
        return $this->db->count_all_results('sekolah');
    }

    function getSchoolList($perPage, $uri, $search) {
        $perPage = $this->sanitize_input($perPage);
        $uri = $this->sanitize_input($uri);

        $this->db->select('sekolah.id, sekolah.nama AS nama, sekolah.alamat, sekolah.kota, kabupaten.nama AS kab');
        $this->db->from('sekolah');
        $this->db->join('kabupaten', 'kabupaten.id = sekolah.id_kabupaten','left');
        if(!empty($search)) {
            $search = $this->sanitize_input($search);
            $this->db->like('sekolah.nama', $search);
            $this->db->order_by('sekolah.nama','asc');
        }
        /*else
        {
            //$this->db->order_by('sekolah.id','asc');
        }*/

        $getData = $this->db->get('', $perPage, $uri);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }

    public function getSekolah()
    {
        $sql = "select * from sekolah";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getSekolahWithID($id){
        $id = $this->sanitize_input($id);
        $sql = "select s.id, s.nama, s.kota, s.alamat, k.id AS id_kab, p.id AS id_prov
                from sekolah s LEFT JOIN kabupaten k ON k.id = s.id_kabupaten
                LEFT JOIN  provinsi p ON p.id = k.id_provinsi
                where s.id = ?";
        $bindParam = [$id];
        $result = $this->db->query($sql, $bindParam);
        return $result->row_array();
    }
}