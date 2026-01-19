<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect(base_url("auth"));
        }
        $this->load->model('dataPasienmodel');
        $this->load->model('m_id');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }


    public function index()
    {
        $data['pasien'] = $this->dataPasienmodel->getAllPasien()->result();
        $data['kodeunik'] = $this->m_id->buat_kode();
        $kodeunik = $this->m_id->buat_kode();
        $this->load->helper('date');
        $cek = $this->db->query("SELECT tanggal_lahir FROM pasien where kd_rm = '$kodeunik'")->row_array();
        $awal = strtotime((string) $cek);
        $ayena = time();
        $data['umur'] = timespan($awal, $ayena, 1);
        $data['admin'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();

        $dataheader = array('keywords' => 'CI,rekmed,codeigniter','author'=>'MaaDeSu','description'=>'maadesu','title'=>'MaaDeSu');
        $this->load->view('template/header',$dataheader);
        $this->load->view('template/nav');
        $this->load->view('data_pasien/index', $data);
        $this->load->view('template/footer');
    }


    public function tambah()
    {
        $data['kodeunik'] = $this->m_id->buat_kode();
        $data['admin'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pengobatan', 'Pengobatan', 'required');
        $this->form_validation->set_rules('no_bpjs', 'No BPJS');
        $this->form_validation->set_rules('telp', 'Nomor HP/Telepon', 'required');
        

        if ( $this->form_validation->run() == FALSE) {
        $dataheader = array('keywords' => 'CI,rekmed,codeigniter','author'=>'MaaDeSu','description'=>'maadesu','title'=>'MaaDeSu');
        $this->load->view('template/header',$dataheader);
        $this->load->view('template/nav');
        $this->load->view('data_pasien/input', $data);
        $this->load->view('template/footer');
        } else{
        $this->dataPasienmodel->tambah_data();
        redirect(base_url('index.php/adminpasien'));

        }
        

    
    }

    public function hapus($kd_rm)
    {
        $this->dataPasienmodel->hapus_data($kd_rm);
        redirect(base_url('index.php/adminpasien'));
    }


    public function ubah($kd_rm)
    {

        $judul['judul'] = 'Halaman Ubah Data Pasien';
        $data['pasien'] = $this->dataPasienmodel->getPasienById($kd_rm);
        $data['admin'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();

        
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Nomor HP/Telepon', 'required');
        

        if ( $this->form_validation->run() == FALSE) {
        $dataheader = array('keywords' => 'CI,rekmed,codeigniter','author'=>'MaaDeSu','description'=>'maadesu','title'=>'MaaDeSu');
        $this->load->view('template/header',$dataheader);
        $this->load->view('template/nav');
        $this->load->view('data_pasien/ubah', $data);
        $this->load->view('template/footer');
        } else{
        $this->dataPasienmodel->ubah_data($kd_rm);
        redirect(base_url('index.php/adminpasien'));
        }
        }

    public function cetak_pasien($kd_rm){
        $data = array(
        'pasien'  => $this->db->query("SELECT * FROM pasien where kd_rm='$kd_rm'"),
        );
        $this->load->view('data_pasien/cetak',$data);
    }


    
/*LAPORAN TRANSAKSI*/

    function laporan(){

        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 

            $filter = $_GET['filter'];     

            
            if($filter == '1'){                
            $kd_rm = $_GET['kd_rm'];                                              
            $ket = 'Data Pasien ';                
            $url_cetak = 'index.php/adminpasien/cetak2?&kd_rm='.$kd_rm;                
            $pasien = $this->dataPasienmodel->view_by_kd_rm($kd_rm);             
            }

           

        }else{ 

            $ket = 'Semua Data Pasien';            
            $url_cetak = 'index.php/adminpasien/cetak';            
            $pasien = $this->dataPasienmodel->view_all(); 

        }

            $data['ket'] = $ket;    
            $data['url_cetak'] = base_url($url_cetak);    
            $data['pasien'] = $pasien;       
            $data['kd_rm'] = $this->dataPasienmodel->kd_rm();     
                


            $data['judul'] = 'Laporan Pasien';
            $data['admin'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();
                            
            $dataheader = array('keywords' => 'CI,rekmed,codeigniter','author'=>'MaaDeSu','description'=>'maadesu','title'=>'MaaDeSu');
            $this->load->view('template/header',$dataheader);
            $this->load->view('template/nav');
            $this->load->view('data_pasien/laporan', $data);
            $this->load->view('template/footer');
        
    }     

    public function cetak(){    
                             
        $ket = 'Semua Data Pasien';
        $alamat = 'Kp. Cibereum No.18 RT/RW 04/01 MaaDeSu_City';

        ob_start();   
        // require('assets/pdf/fpdf.php');  
        $data['pasien'] = $this->dataPasienmodel->view_all(); 
        $data['ket'] = $ket;  
        $data['alamat'] = $alamat;
        $this->load->view('data_pasien/preview', $data);    
        
    }

    public function cetak1(){    
                             
        $ket = 'Data Pasien';
        $alamat = 'Kp. Cibereum No.18 RT/RW 04/01 MaaDeSu City';

        ob_start();   
        // require('assets/pdf/fpdf.php');  
        $data['pasien'] = $this->dataPasienmodel->view_by_kd_rm(); 
        $data['ket'] = $ket;  
        $data['alamat'] = $alamat;
        $this->load->view('data_pasien/preview1', $data);    
        
    }
}


