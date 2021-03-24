<?php
class Admin extends CI_Controller
{
    public function input_data_corona()
    {
        $data['corona'] = $this->m_corona->ambil_data_hari()->result();
        echo $data['corona'];
        $this->load->view('admin/v_input_data', $data);
    }
}
