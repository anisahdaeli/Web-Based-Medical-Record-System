<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokterpemeriksaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}

		$this->load->model('dataPasienmodel');
		$this->load->model('pemeriksaan_model');
		$this->load->model('pembayaran_model');
		$this->load->model('m_id');
		$this->load->library('pdf');
		$this->load->helper('url');
	}


	public function index()
	{
		$data['dokter'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();
		$data['pasien'] = $this->dataPasienmodel->getAllPasien()->result();
		$this->load->helper('date');
		
	
		$dataheader = array('keywords' => 'CI,rekmed,codeigniter','author'=>'MaaDeSu','description'=>'maadesu','title'=>'MaaDeSu');
        $this->load->view('template/header',$dataheader);
        $this->load->view('template/nav');
        $this->load->view('pemeriksaan/index', $data);
        $this->load->view('template/footer');
		
	}

	
	public function periksa($kd_rm)
	{

		$judul['judul'] = 'Pemeriksaan';
		$data['desc'] = '<h1 class="text-success"><i class="fa-solid fa-user-plus"></i>Tambah Pemeriksaan<hr></h1></h1>';
		$data['kodeperiksa'] = $this->m_id->buat_kode_periksa();
		$data['tanggal'] = date("d-m-Y");
		$data['dokter'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();
		$where1 = array('kd_rm' => $kd_rm);
		$data1['pasien'] = $this->pemeriksaan_model->tampil_detail($where1)->result();
		$data2['pemeriksaan'] = $this->pemeriksaan_model->tampil_pemeriksaan($where1)->result();
		$data['dokter'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();
		$data['tarif'] = $this->pembayaran_model->tampil();
		
		$dataheader = array('keywords' => 'CI,rekmed,codeigniter','author'=>'MaaDeSu','description'=>'maadesu','title'=>'MaaDeSu');
        $this->load->view('template/header',$dataheader, $data);
        $this->load->view('template/nav', $data);
        $this->load->view('pemeriksaan/detail', $data1);
		$this->load->view('pemeriksaan/input', $data2);
        $this->load->view('template/footer');	
}

function tambah_aksi(){

		$username = $this->session->userdata('username');
		$kd_rm = $this->input->post('kd_rm');
		$id_periksa = $this->input->post('id_periksa');
		$keluhan = $this->input->post('keluhan');
		$diagnosa = $this->input->post('diagnosa');
		$tindakan = implode(' , ', $this->input->post('tindakan',TRUE)) ;
		$tanggal = $this->input->post('tanggal');
		$dokter = $this->session->userdata('username');
		// $dokter = $this->db->query("SELECT user FROM user WHERE user='$username'")->row_array();

		$data = array(
			'kd_rm' => $kd_rm,
			'id_periksa' => $id_periksa,
			'keluhan' => $keluhan,
			'diagnosa' => $diagnosa,
			'tindakan' => $tindakan,
			'tanggal' => $tanggal,
			'dokter' => $dokter
		); 
		
		$this->pemeriksaan_model->input_data($data, 'pemeriksaan');
		redirect(base_url('index.php/dokterpemeriksaan/periksa/'.$kd_rm));
	}

 

		public function hapus($id_periksa)
	{
		$this->pemeriksaan_model->hapus_data($id_periksa);
		redirect(base_url('index.php/dokterpemeriksaan/index'));
	}

	public function cetak_pemeriksaan($id_periksa){
		$data = array(
        'pemeriksaan'  => $this->db->query("SELECT * FROM pemeriksaan where id_periksa='$id_periksa'"),
        );
        $this->load->view('pemeriksaan/cetak',$data);
	}

	
/*LAPORAN TRANSAKSI*/

	function laporan(){

		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 

			$filter = $_GET['filter'];     

			if($filter == '1'){               
				$tanggal1 = $_GET['tanggal'];  
				$tanggal2 = $_GET['tanggal2'];                               
				$ket = 'Data Rekam Medis dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' - '.date('d-m-y', strtotime($tanggal2));                
				$url_cetak = 'index.php/dokterpemeriksaan/cetak1?tanggal1='.$tanggal1.'&tanggal2='.$tanggal2.'';                
				$pemeriksaan = $this->pemeriksaan_model->view_by_date($tanggal1,$tanggal2);             
			}

			else if($filter == '2'){                
			$kd_rm = $_GET['kd_rm'];                                              
			$ket = 'Data Rekam Medis ';                
			$url_cetak = 'index.php/dokterpemeriksaan/cetak2?&kd_rm='.$kd_rm;                
			$pemeriksaan = $this->pemeriksaan_model->view_by_kd_rm($kd_rm);             
			}

			// else if($filter == '3'){                
			// $kelas = $_GET['kd_pasien'];                                                
			// $ket = 'Data Pasien '.$pasien;                
			// $url_cetak = 'pemeriksaan/cetak3?&pasien='.$pasien;                
			// $pasien = $this->pemeriksaan_model->view_by_kd_pasien($pasien)->result();             
			// }

		   

		}

		else{ 

			$ket = 'Semua Data Rekam Medis';            
			$url_cetak = 'index.php/dokterpemeriksaan/cetak';            
			$pemeriksaan = $this->pemeriksaan_model->view_all(); 

		}

		 	$data['ket'] = $ket;  
		 	$data['url_cetak'] = base_url($url_cetak);    
		 	$data['pemeriksaan'] = $pemeriksaan;       
		 	$data['kd_rm'] = $this->pemeriksaan_model->kd_rm();
		 	$data['kd_pasien'] = $this->pemeriksaan_model->kd_pasien();     
			    


		 	$data['judul'] = 'Laporan Data Rekam Medis';
			$data['admin'] = $this->db->get_where('user',['user' => $this->session->userdata('username')])->row_array();
			
			$dataheader = array('keywords' => 'CI,rekmed,codeigniter','author'=>'MaaDeSu','description'=>'maadesu','title'=>'MaaDeSu');
        	$this->load->view('template/header',$dataheader);
        	$this->load->view('template/nav');
        	$this->load->view('pemeriksaan/laporan', $data);
        	$this->load->view('template/footer');
	}     

	public function cetak(){    
                             
		$ket = 'Semua Data Rekam Medis';
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 MaaDeSu_City';

	  	ob_start();   
	  	// require('assets/pdf/fpdf.php');  
	  	$data['pemeriksaan'] = $this->pemeriksaan_model->view_all(); 
	  	$data['ket'] = $ket;  
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pemeriksaan/preview', $data);    
	  	
	}

	public function cetak1(){    

	  	$tanggal1 = $_GET['tanggal1'];  
		$tanggal2 = $_GET['tanggal2'];                               
		$ket = 'Data Rekam Medis dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' s/d '.date('d-m-y', strtotime($tanggal2));
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 MaaDeSu_City';

	  	ob_start();   
	  	// require('assets/pdf/fpdf.php');  
	  	$data['pemeriksaan'] = $this->pemeriksaan_model->view_by_date($tanggal1,$tanggal2);  
	  	$data['ket'] = $ket;
	  	$data['alamat'] = $alamat;  
	  	$this->load->view('pemeriksaan/preview', $data);    
	  	
	}

	public function cetak2(){    

	  	$kd_rm = $_GET['kd_rm'];
	  	$data['nama_pasien'] = $this->db->query("SELECT nama_pasien FROM pasien WHERE kd_rm = '$kd_rm'")->result();                                              
		$ket = 'Kode RM   '   .$kd_rm  ;     
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 MaaDeSu_City';                      
	  	ob_start();   
	  	// require('assets/pdf/fpdf.php');  
	  	$data['pemeriksaan'] = $this->pemeriksaan_model->view_by_kd_rm($kd_rm); 
	  	$data['ket'] = $ket; 
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pemeriksaan/preview1', $data);    
	  	
	}
		

	

}