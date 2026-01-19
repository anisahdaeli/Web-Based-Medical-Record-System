<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
     public function __construct()
       {
            parent::__construct();
            $this->load->model('Loginmodel');
       }
    public function index($renderData=""){
		$this->load->view('pages/login');
	}
	public function submitLogin(){
		if($this->input->post('Login')){
			$username = $this->db->escape_str($this->input->post('username'));
			$password = $this->db->escape_str($this->input->post('password'));
			if($this->Loginmodel->cekLogin($username,$password)){
				$data = $this->Loginmodel->getDataforsession($username, $password);
				$data = array('username'=>$data['user'], 'nama'=>$data['nama'], 'level'=>$data['level']);
				$this->session->set_userdata($data);
				if($data['level']=="admin"){
					redirect(base_url('index.php/admin'));
				}else if($data['level']=="dokter"){
					redirect(base_url('index.php/dokter'));
				}
			}else{
				$this->data['error'] = "Username atau password salah";
				$this->load->view('pages/login',$this->data);
			}
		}else{
			redirect(base_url('index.php/login'));
			echo "nologin";
		}
	}
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda telah keluar</div>');
		redirect('login');
	}
}
