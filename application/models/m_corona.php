<?php
class M_corona extends CI_Model
{

    public function ambil_data_hari()
    {
        return $this->db->select('*')->from('data_corona')->get();
    }
}
