<?php

/**
 * Description of scoreboard_model
 *
 * @author santos sabanari
 */
class Scoreboard_model extends MY_Model {
    
    function getScoreboard($id_kontes) {
        $id_kontes = parent::sanitize_and_escape($id_kontes);
        /*
          $sql = "select t.id as id_tim , t.nama as nama_tim, g.id as id_guru, g.nama as nama_guru, s.id as id_sekolah, s.nama as nama_sekolah,
          ifnull(
          (select count(*)
          from submission_pemrograman
          where id_tim=t.id and hasil='Accepted'),0) as jumlah_ac,
          ifnull(
          (select sum(poin)
          from submission_pemrograman
          where id_tim=t.id and hasil='Accepted'),0) as time
          from tim t
          left join guru_pendamping g
          on t.id_guru_pendamping = g.id
          left join sekolah s
          on g.id_sekolah=s.id
          left join mengikuti_kontes_pemrograman p
          on t.id=p.id_tim
          where p.id_kontes_pemrograman=12
          order by jumlah_ac desc, time asc";

          $scoreboard = $this->db->query($sql);
          $scoreboard = $scoreboard->result_array();
          $i = 0;
          foreach ($scoreboard as $row){
          $sql = "select p.id as id_soal, p.nomor as nomor_soal, p.judul as judul_soal,
          ifnull((select count(*) from submission_pemrograman where id_soal_pemrograman=p.id and id_tim=".$row['id_tim']."),0) as att,
          ifnull((select poin from submission_pemrograman where id_soal_pemrograman=p.id and id_tim=".$row['id_tim']." and hasil='Accepted'),-1) as time
          from soal_pemrograman p
          where id_kontes_pemrograman = ".$id_kontes."
          order by nomor_soal asc";
          $hasil = $this->db->query($sql);
          $scoreboard[$i]['soal'] = $hasil->result_array();
          $i++;
          }
          return $scoreboard;
         */

        $sql = "select t.id as id_tim , t.nama as nama_tim, s.nama as nama_sekolah, k.nama AS kabupaten,
                ifnull(
                    (select count(*)
                    from submission_pemrograman
                    where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."')),0) as jumlah_ac,
                ifnull(
                    (select sum(poin)
                    from submission_pemrograman
                    where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."')),0) as time
                from tim t
                left join guru g
                on t.id_guru_pendamping = g.id
                left join sekolah s
                on g.id_sekolah=s.id
                INNER JOIN kabupaten k ON k.id = s.id_kabupaten
                left join mengikuti_kontes_pemrograman p
                on t.id=p.id_tim
                where p.id_kontes_pemrograman='" . $id_kontes . "'
                order by jumlah_ac desc, time asc";

        $scoreboard = $this->db->query($sql);
        $scoreboard = $scoreboard->result_array();
        $i = 0;
        foreach ($scoreboard as $row) {
            $sql = "select p.nomor as nomor_soal, 
                    ifnull((select count(*) from submission_pemrograman where id_soal_pemrograman=p.id and id_tim='" . $row['id_tim'] . "' and hasil!='Solved' and hasil !='Pending' and hasil !='Judging'),0) as att, 
                    ifnull((select poin from submission_pemrograman where id_soal_pemrograman=p.id and id_tim='" . $row['id_tim'] . "' and hasil='Accepted'),-1) as time
                    from soal_pemrograman p
                    where id_kontes_pemrograman = '" . $id_kontes . "'
                    order by nomor_soal asc";
            $hasil = $this->db->query($sql);
            $scoreboard[$i]['soal'] = $hasil->result_array();
            $i++;
        }
        return $scoreboard;
    }

    function getScoreboard2($id_kontes, $jam) {
        $id_kontes = parent::sanitize_and_escape($id_kontes);
        $jam = parent::sanitize_and_escape($jam);
        
        $sql = "select t.id as id_tim , t.nama as nama_tim, s.nama as nama_sekolah, k.nama AS kabupaten,
                ifnull(
                    (select count(*)
                    from submission_pemrograman
                    where id_tim=t.id and hasil='Accepted' and jam<='" . $jam . "' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."')),0) as jumlah_ac,
                ifnull(
                    (select sum(poin)
                    from submission_pemrograman
                    where id_tim=t.id and hasil='Accepted' and jam<='" . $jam . "' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."')),0) as time
                from tim t
                left join guru g
                on t.id_guru_pendamping = g.id
                left join sekolah s
                on g.id_sekolah=s.id
                INNER JOIN kabupaten k ON k.id = s.id_kabupaten
                left join mengikuti_kontes_pemrograman p
                on t.id=p.id_tim
                where p.id_kontes_pemrograman='" . $id_kontes . "'
                order by jumlah_ac desc, time asc";

        $scoreboard = $this->db->query($sql);
        $scoreboard = $scoreboard->result_array();
        $i = 0;
        foreach ($scoreboard as $row) {
            $sql = "select p.nomor as nomor_soal, 
                    ifnull(
                        (select count(*) 
                        from submission_pemrograman 
                        where id_soal_pemrograman=p.id and id_tim='" . $row['id_tim'] . "' and jam<='" . $jam . "' and hasil!='Solved' and hasil !='Pending' and hasil !='Judging'),0) as att, 
                    ifnull(
                        (select poin 
                        from submission_pemrograman 
                        where id_soal_pemrograman=p.id and id_tim='" . $row['id_tim'] . "' and hasil='Accepted' and jam<='" . $jam . "'),-1) as time
                    from soal_pemrograman p
                    where id_kontes_pemrograman = '" . $id_kontes . "'
                    order by nomor_soal asc";
            $hasil = $this->db->query($sql);
            $scoreboard[$i]['soal'] = $hasil->result_array();
            $i++;
        }
        return $scoreboard;
    }

    function getProblem($id_kontes) {
        $id_kontes = parent::sanitize_and_escape($id_kontes);
        $sql = "select id,nomor,judul
                from soal_pemrograman
                where id_kontes_pemrograman = '" . $id_kontes . "'
                order by nomor asc";
        $hasil = $this->db->query($sql);
        return $hasil->result_array();
    }

    function getKontes($id_kontes) {
        $id_kontes = parent::sanitize_and_escape($id_kontes);
        $sql = "select id,nama,tanggal,jam_selesai,jam_mulai,start_freeze as 'waktu_freeze',end_freeze, scoreboard_name
                from kontes_pemrograman
                where id='" . $id_kontes . "'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
     function getKontesIdByUrl($kontes_url) {
        $kontes_url = parent::sanitize_and_escape($kontes_url);
        $sql = "select id
                from kontes_pemrograman
                where scoreboard_name='" . $kontes_url . "'";
        $result = $this->db->query($sql);
        $result = $result->row_array();
        return $result["id"];
    }

    function getTotalAttSolved($id_kontes) {
        $id_kontes = parent::sanitize_and_escape($id_kontes);
        $sql = "select
                ifnull(
                    (select count(*)
                    from submission_pemrograman
                    where id_soal_pemrograman=p.id and hasil!='Solved' and hasil !='Pending' and hasil !='Judging'),0)as att,
                ifnull(
                    (select count(*)
                    from submission_pemrograman
                    where id_soal_pemrograman=p.id and hasil='Accepted'),0)as ac
                from soal_pemrograman p
                where id_kontes_pemrograman='" . $id_kontes . "'
                order by p.nomor asc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getTotalAttSolved2($id_kontes, $jam) {
        $id_kontes = parent::sanitize_and_escape($id_kontes);
        $jam = $this->sanitize_and_escape($jam);
        $sql = "select
                ifnull(
                    (select count(*)
                    from submission_pemrograman
                    where id_soal_pemrograman=p.id and jam<='" . $jam . "' and hasil!='Solved' and hasil !='Pending' and hasil !='Judging'),0)as att,
                ifnull(
                    (select count(*)
                    from submission_pemrograman
                    where id_soal_pemrograman=p.id and hasil='Accepted' and jam<='" . $jam . "'),0)as ac
                from soal_pemrograman p
                where id_kontes_pemrograman='" . $id_kontes . "'
                order by p.nomor asc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    
    function isAvailableContest($id_kontes){
        $id_kontes = parent::sanitize_input($id_kontes);
        $sql = "select id
                from kontes_pemrograman
                where id=?";
        $param = [$id_kontes];
        $result = $this->db->query($sql,$param);
        return $result->row_array();

    }
    
    function getTimeFreezeKompetisiWithKontesId($id_kontes) {
        $id_kontes = parent::sanitize_and_escape($id_kontes);
        $sql = "select time_freeze
                from kompetisi
                where id = (select k.id
                from kompetisi k, admin a
                where a.id_kompetisi = k.id and a.id = (select id_admin from kontes_pemrograman where id='".$id_kontes."'))";

        $result = $this->db->query($sql);
        $result = $result->row_array();
        return $result['time_freeze'];
    }
}

?>