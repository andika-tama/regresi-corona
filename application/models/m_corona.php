<?php
class M_corona extends CI_Model
{

    public function ambil_data($tb)
    {
        return $this->db->select('*')->from($tb)->order_by('hari_ke', "DESC")->limit(1)->get();
    }

    public function ambil_data_real($tb)
    {
        return $this->db->select('*')->from($tb)->get();
    }

    public function ambil_data_variabel($tb)
    {
        return $this->db->select('*')->from($tb)->get();
    }


    public function ambil_data_mentah($tb)
    {
        return $this->db->select('*')->from($tb)->get();
    }

    public function input_data($data)
    {
        $this->db->insert('data_corona', $data);
    }
    public function input_data_model($data)
    {
        $this->db->insert('model_regresi', $data);
    }
    public function update_data_variabel($where, $data)
    {
        $this->db->where($where);
        $this->db->update('model_regresi', $data);
    }
}
