<?php
class Admin extends CI_Controller
{
    public function input_data_corona()
    {
        $data['corona'] = $this->m_corona->ambil_data('data_corona')->result();
        $this->load->view('admin/v_input_data', $data);
    }

    public function lihat_hitung()
    {
        $jml_data   = 0;
        $sgm_x      = 0;
        $sgm_y      = 0;
        $sgm_xy     = 0;
        $sgm_x2     = 0;
        $data_mentah = $this->m_corona->ambil_data_mentah('data_corona')->result();

        //hitung sigma dari x, y, xy, x2
        foreach ($data_mentah as $dm) {
            $sgm_x += $dm->hari_ke;
            $sgm_y += $dm->jml_pstf;
            $sgm_xy += $dm->xy;
            $sgm_x2 += $dm->x2;
        }
        $data['sgm_x'] = $sgm_x;
        $data['sgm_y'] = $sgm_y;
        $data['sgm_xy'] = $sgm_xy;
        $data['sgm_x2'] = $sgm_x2;
        $this->load->view('admin/v_hitung_data', $data);
    }

    public function input_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->input_data_corona();
        } else {
            $jml_pstf           = $this->input->post('jml_pstf', TRUE);
            $hari               = $this->input->post('hari', TRUE);
            $xy                 = $jml_pstf * $hari;
            $x2                 = $hari * $hari;
            $tanggal            = $this->input->post('tgl', TRUE);
            $tgl                = date('Y-m-d', strtotime($tanggal));

            $data = array(
                'hari_ke'   => $hari,
                'tgl'       => $tgl,
                'jml_pstf'  => $jml_pstf,
                'xy'        => $xy,
                'x2'        => $x2,
            );

            $this->m_corona->input_data($data);
            // $this->session->set_flashdata('pesan', '<div 
            // 	class="alert alert-success alert-dismissible fade show" role="alert">
            // 		Berhasil Tambah Data Corona
            // 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            // 			<span aria-hidden="true">&times;
            // 			</span>
            // 		</button>
            // 	</div>'); //flash data untuk alret!
            redirect('admin/input_data_corona');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('hari', 'hari', 'required', ['required' => 'Hari Wajib Diisi!']);
        $this->form_validation->set_rules('tgl', 'tgl', 'required', ['required' => 'Tanggal Wajib Diisi!']);
        $this->form_validation->set_rules('jml_pstf', 'jml_pstf', 'required', ['required' => 'Jumlah Positif Wajib Diisi!']);
    }
}
