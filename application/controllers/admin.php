<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->_is_logged();
    }

    public function index()
    {
        redirect('admin/dashboard');
    }

    public function dashboard()
    {

        $MAD = $this->_hitung_MAD();
        $data_real = $this->_ambil_data_real();
        $data_variabel = $this->_ambil_variabel();

        $data['MAD'] = $MAD['MAD'];
        $data['big_X'] = $data_variabel['X'];
        $data['big_Y'] = $data_variabel['Y'];;
        $data['small_b'] = $data_variabel['b'];;
        $data['small_a'] = $data_variabel['a'];;
        $data['data_pstf'] = $data_real['data_pstf'];
        $data['data_hari'] = $data_real['data_hari'];
        $data['jml_data'] = $data_real['jml_data'];
        $data['judul'] = "Dashboard";

        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/dashboard.php', $data);
        $this->load->view('templet_admin/footer.php');
    }

    public function data_real()
    {
        $data['corona'] = $this->m_corona->ambil_data_real('data_corona')->result();
        $data['judul'] = "Data Positif";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/v_data_real.php', $data);
        $this->load->view('templet_admin/footer.php');
    }
    public function input_data_corona()
    {
        $this->_is_logged();
        $data['corona'] = $this->m_corona->ambil_data('data_corona')->result();
        $data['judul'] = "Input Data Positif";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/v_input_data_real.php', $data);
        $this->load->view('templet_admin/footer.php');
        //$this->load->view('admin/v_input_data', $data);
    }

    public function lihat_variabel()
    {
        $data['regresi'] = $this->m_corona->ambil_data_variabel('model_regresi')->result();
        $data['judul'] = "Variabel Regresi Linier";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/v_data_variabel.php', $data);
        $this->load->view('templet_admin/footer.php');
    }

    public function update_variabel()
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
            $jml_data++;
        }

        $i = 0;
        foreach ($data_mentah as $dmt) {
            $hari_ke[$i] = $dmt->hari_ke;
            $jml_pstf[$i++] = $dmt->jml_pstf;
        }

        $big_X  = $sgm_x / $jml_data;
        $big_Y  = $sgm_y / $jml_data;
        $big_X2 = $big_X * $big_X;

        $small_b = ($sgm_xy - $jml_data * $big_X * $big_Y) / ($sgm_x2 - $jml_data * $big_X2);
        $small_a = $big_Y - $small_b * $big_X;

        $varibel = $this->m_corona->ambil_data_variabel('model_regresi')->result();
        foreach ($varibel as $vr) {
            $id_var = $vr->id;
        }

        $where = array(
            'id' => $id_var,
        );
        $data_model = array(
            'id' => $id_var,
            'big_x'   => $big_X,
            'big_y'       => $big_Y,
            'small_a'  => $small_a,
            'small_b'        => $small_b,
            'jml_data'  => $jml_data,
        );

        $this->m_corona->update_data_variabel($where, $data_model);

        $this->session->set_flashdata('pesan', '<div 
            	class="alert alert-success alert-dismissible fade show" role="alert">
            		Berhasil Update Data Variabel Regresi
            		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;
            			</span>
            		</button>
            	</div>'); //flash data untuk alret!

        redirect('admin/lihat_variabel');
    }

    //lihat prediksi
    public function lihat_hitung($data_ambil = NULL)
    {
        if ($data_ambil == NULL) {
            $data_ambil = 5;
        }
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
            $jml_data++;
        }

        $i = 0;
        foreach ($data_mentah as $dmt) {
            $hari_ke[$i] = $dmt->hari_ke;
            $jml_pstf[$i++] = $dmt->jml_pstf;
        }

        $big_X  = $sgm_x / $jml_data;
        $big_Y  = $sgm_y / $jml_data;
        $big_X2 = $big_X * $big_X;

        $small_b = ($sgm_xy - $jml_data * $big_X * $big_Y) / ($sgm_x2 - $jml_data * $big_X2);
        $small_a = $big_Y - $small_b * $big_X;

        //$x255 = $small_a + $small_b * 255;

        //hitung prediksi
        for ($i = 0; $i < $jml_data; $i++) {
            $data_forcast[$i] =  $small_a + $small_b * $hari_ke[$i];
        }

        $j = 0;
        for ($i = $jml_data; $i < $jml_data + $data_ambil; $i++) {
            $data_perkiraan[$j] =  $small_a + $small_b * ($hari_ke[$jml_data - 1] + $j + 1);
            $j++;
        }


        $data['sgm_x'] = $sgm_x;
        $data['sgm_y'] = $sgm_y;
        $data['sgm_xy'] = $sgm_xy;
        $data['sgm_x2'] = $sgm_x2;
        $data['jml_data'] = $jml_data;
        $data['big_X'] = $big_X;
        $data['big_Y'] = $big_Y;
        $data['small_b'] = $small_b;
        $data['small_a'] = $small_a;
        $data['forcast'] = $data_forcast;
        $data['data_real'] = $jml_pstf;
        $data['hari'] = $hari_ke;
        $data['prediksi_kedepan'] = $data_perkiraan;

        //untuk input model X Y a dan b
        // $data_model = array(
        //     'big_x'   => $big_X,
        //     'big_y'       => $big_Y,
        //     'small_a'  => $small_a,
        //     'small_b'        => $small_b,
        // );

        //$this->m_corona->input_data_model($data_model);

        //$this->load->view('admin/v_hitung_data', $data);
        $data['judul'] = "Regresi Linier";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/cek_regresi.php', $data);
        $this->load->view('templet_admin/footer.php');
    }

    public function input_data()
    {
        $this->_is_logged();
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

    //lihat selisih
    public function lihat_selisih()
    {
        $i = 0;
        $data_real = $this->m_corona->ambil_data_real('data_corona')->result();
        $data_variabel = $this->m_corona->ambil_data_variabel('model_regresi')->result();

        foreach ($data_real as $dr) {
            $data_pstf[$i] = $dr->jml_pstf;
            $data_hari[$i++] = $dr->hari_ke; //x
        }
        foreach ($data_variabel as $dv) {
            $a = $dv->small_a;
            $b = $dv->small_b;
            $jml_data = $dv->jml_data;
        }

        for ($k = 0; $k < $jml_data; $k++) {
            $data_forcast[$k] =  $a + $b * $data_hari[$k];
            $pembulatan[$k] = round($data_forcast[$k], 0);
            $selisih[$k] = abs($data_pstf[$k] -  $pembulatan[$k]);
        }

        $data['real'] = $data_real;
        $data['forcast'] = $data_forcast;
        $data['pembulatan'] = $pembulatan;
        $data['selisih'] = $selisih;

        $data['judul'] = "Selisih Prediksi";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/v_lihat_selisih.php', $data);
        $this->load->view('templet_admin/footer.php');
    }

    public function lihat_MAD()
    {
        $MAD = $this->_hitung_MAD();
        $i = 0;
        $data_real = $this->m_corona->ambil_data_real('data_corona')->result();
        $data_variabel = $this->m_corona->ambil_data_variabel('model_regresi')->result();

        foreach ($data_real as $dr) {
            $data_pstf[$i] = $dr->jml_pstf;
            $data_hari[$i++] = $dr->hari_ke; //x
        }
        foreach ($data_variabel as $dv) {
            $a = $dv->small_a;
            $b = $dv->small_b;
            $jml_data = $dv->jml_data;
        }
        for ($k = 0; $k < $jml_data; $k++) {
            $data_forcast[$k] =  $a + $b * $data_hari[$k];
            $xifi[$k] = abs($data_pstf[$k] - $data_forcast[$k]);
        }

        $data['real'] = $data_real;
        $data['forcast'] = $data_forcast;
        $data['xifi'] = $xifi;
        $data['sgm_xifi'] = $MAD['sgm_xifi'];
        $data['MAD'] = $MAD['MAD'];

        $data['judul'] = "Perhitungan Galat MAD";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/v_lihat_MAD.php', $data);
        $this->load->view('templet_admin/footer.php');
    }

    public function lihat_prediksi()
    {
        if (($this->input->post('jml_hari', TRUE) == NULL) || ($this->input->post('jml_hari', TRUE) == 0)) {
            $data_ambil = 5;
        } else {
            $data_ambil = abs($this->input->post('jml_hari', TRUE));
        }

        $data_real = $this->_ambil_data_real();
        $data_pstf = $data_real['data_pstf'];
        $data_hari = $data_real['data_hari'];

        $data_variabel = $this->_ambil_variabel();
        $a = $data_variabel['a'];
        $b = $data_variabel['b'];
        $jml_data = $data_variabel['jml_data'];

        $j = 0;
        for ($i = $jml_data; $i < $jml_data + $data_ambil; $i++) {
            $data_perkiraan[$j] =  $a + $b * ($data_hari[$jml_data - 1] + $j + 1);
            $j++;
        }

        $data['data_real'] = $data_pstf;
        $data['hari'] = $data_hari;
        $data['prediksi_kedepan'] = $data_perkiraan;

        $data['judul'] = "Prediksi Corona";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('templet_admin/sidebar.php');
        $this->load->view('admin/v_lihat_prediksi.php', $data);
        $this->load->view('templet_admin/footer.php');
    }

    private function _is_logged()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    private function _hitung_MAD()
    {
        $data_real = $this->_ambil_data_real();
        $data_pstf = $data_real['data_pstf'];
        $data_hari = $data_real['data_hari'];

        $data_variabel = $this->_ambil_variabel();
        $a = $data_variabel['a'];
        $b = $data_variabel['b'];
        $jml_data = $data_variabel['jml_data'];

        $sgm_xifi = 0;
        for ($k = 0; $k < $jml_data; $k++) {
            $data_forcast[$k] =  $a + $b * $data_hari[$k];
            $xifi[$k] = abs($data_pstf[$k] - $data_forcast[$k]);
            $sgm_xifi += $xifi[$k];
        }

        $MAD['sgm_xifi'] = $sgm_xifi;
        $MAD['MAD'] = $sgm_xifi / $jml_data;

        return $MAD;
    }

    //coba fungsi hitung regresi
    private function _hitung_regresi()
    {
    }

    //ambil nilai variabel
    private function _ambil_variabel()
    {
        $data_variabel_model = $this->m_corona->ambil_data_variabel('model_regresi')->result();
        foreach ($data_variabel_model as $dv) {
            $a = $dv->small_a;
            $b = $dv->small_b;
            $X = $dv->big_x;
            $Y = $dv->big_y;
            $jml_data = $dv->jml_data;
        }
        $data_variabel['a'] = $a;
        $data_variabel['b'] = $b;
        $data_variabel['X'] = $X;
        $data_variabel['Y'] = $Y;
        $data_variabel['jml_data'] = $jml_data;

        return $data_variabel;
    }

    //ambil data positif
    private function _ambil_data_real()
    {
        $data_real_model = $this->m_corona->ambil_data_real('data_corona')->result();
        $i = 0;
        foreach ($data_real_model as $dr) {
            $data_pstf[$i] = $dr->jml_pstf;
            $data_hari[$i++] = $dr->hari_ke; //x
        }
        $data_real['data_pstf'] = $data_pstf;
        $data_real['data_hari'] = $data_hari;
        $data_real['jml_data'] = $i;

        return $data_real;
    }
}
