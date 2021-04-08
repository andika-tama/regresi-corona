<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->_is_logged();
        $data['judul'] = "Login";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('auth/v_login');
    }

    public function login()
    {
        $this->_is_logged();
        $data['judul'] = "Login";
        $this->load->view('templet_admin/header.php', $data);
        $this->load->view('auth/v_login');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Login";
            $this->load->view('templet_admin/header.php', $data);
            $this->load->view('auth/v_login');
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = md5($password);

            $cek = $this->m_login->cek_login($user, $pass);

            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {
                    $s_data['id_admin'] = $ck->id_admin;
                    $s_data['username'] = $ck->username;
                    $s_data['email'] = $ck->email;
                    $this->session->set_userdata($s_data);
                }
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('pesan', 'Maaf username dan password salah!');
                redirect('auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
					Andah sudah Logout!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');

        $this->session->sess_destroy();
        redirect('auth/login');
    }

    private function _is_logged()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }
    }
}
