<?php
class M_corona extends CI_Model
{

    public function ambil_data($tb)
    {
        return $this->db->select('hari_ke')->from($tb)->order_by('hari_ke', "DESC")->limit(1)->get();
    }
}
