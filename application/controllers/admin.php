<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect(base_url('index.php/login'));
        }
        $this->load->model('dataPasienmodel');
        $this->load->model('Pemeriksaan_model');
    }
    public function index(){
        $data['jumlahpasien'] = $this->dataPasienmodel->jumlahpasien();
        $data['jumlahrm'] = $this->Pemeriksaan_model->jumlahrm();
        $data['admin'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();
        $data['dokter'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();
        $dataheader = array('keywords'=>'CI, aptk, MaaDeSu','author'=>'MaaDeSu','description'=>'rekmed_maadesu','title'=>'RekMed_MaaDeSu');
        $this->load->view('template/header',$dataheader);
        $this->load->view('template/nav');
        $this->load->view('pages/dashboard', $data);
        $this->load->view('template/footer');
    }
}