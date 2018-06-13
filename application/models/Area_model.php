<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 24/09/2015
 * Time: 20:39
 */
class Area_model extends MY_Model
{
    public function getSemuaProvinsi()
    {
        $sql = "SELECT id,nama FROM provinsi";
        $executedQuery = $this->db->query($sql);
        return $executedQuery->result_array();
    }

    public function getKabupaten($idProvinsi)
    {
        $idProvinsi = parent::sanitize_input($idProvinsi);
        $sql = "SELECT id,nama FROM kabupaten WHERE id_provinsi = ?";
        $bindParam = [$idProvinsi];
        $executedQuery = $this->db->query($sql, $bindParam);
        return $executedQuery->result_array();
    }
}
?>