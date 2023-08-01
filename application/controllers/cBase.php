<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cBase extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_buku');
		// $this->load->library('session');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{	
        $data['title'] = "BookStore Arief";
        $this->load->view('templates/header',$data);
		$this->load->view('vHome');
		$this->load->view('templates/footer');
	}
	public function daftarBuku()
	{
		// $this->load->model('Model_buku');
		$data['data_buku'] = $this->Model_buku->getAllBukus()->result_array();
		$data['data_penerbit'] = $this->db->get('tb_penerbit')->result_array();
		// $data['data_buku'] = $this->db->get('tb_buku')->result_array();
        $data['title'] = "BookStore Arief";
        $this->load->view('templates/header',$data);
		$this->load->view('vDaftarBuku',$data);
		$this->load->view('templates/modal');
		$this->load->view('templates/footer');
	}
	public function daftarPenerbit()
	{
		$data['data_penerbit'] = $this->db->get('tb_penerbit')->result_array();
		// $data['data_penerbit'] = $this->mBuku->getAllBuku->result_array();
	
		// $data['data_penerbit'] = $this->Model_buku->getAllBukus()->result_array();
        $data['title'] = "BookStore Arief";
        $this->load->view('templates/header',$data);
		$this->load->view('vDaftarPenerbit');
		$this->load->view('templates/modal_penerbit');
		$this->load->view('templates/footer');
	}

	public function simpanBuku(){
		$data = array(
			'judul_buku' => $this->input->post('judulBuku'),
			'tahun_terbit' => $this->input->post('tahunTerbit'),
			'kode_penerbit' => $this->input->post('kodePenerbit')
		);
		$this->Model_buku->simpan_buku($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
		Data Berhasil Di Simpan
	  	</div>');
		redirect('cBase/daftarBuku');
	}

	public function simpanPenerbit(){
		$data = array(
			'nama_penerbit' => $this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit')
		);
		$this->Model_buku->simpan_penerbit($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
		Data Penerbit Berhasil Di Simpan
	  	</div>');
		redirect('cBase/daftarPenerbit');
	}

	public function kepemilikan()
	{
		// return DB::table('tb_buku')
        //     ->select(DB::raw(
        //         "SELECT * FROM tb_buku WHERE kode_penerbit = '1'"
        //     ))->get();
		$kode = $this->uri->segment(3);
		$data['data_buku'] = $this->Model_buku->getDataSpesific($kode)->result_array();
			
		$data['title'] = "BookStore Arief";
        $this->load->view('templates/header',$data);
		$this->load->view('vSpesifik');
		$this->load->view('templates/footer');
	}
	
	public function hapusBuku(){
		
		$kode = $this->uri->segment(3);
		$this->Model_buku->hapus_buku($kode);



		$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
		Data Berhasil Di Hapus
	  </div>');
		redirect('cBase/daftarBuku');
		
	}

	public function hapusPenerbit(){
		$kode = $this->uri->segment(3);
		// $this->Model_buku->hapus_penerbit($kode);
		$status = $this->Model_buku->hapus_done($kode);
		// var_dump($status);
	// 	if($status == true){
	// 		$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
	// 	Data Berhasil Di Hapus
	//   </div>');
	// 	}else{
			
	// 		$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
	// 		// 	Data Gagal di Hapus Karna Constraint Data
	// 		//   </div>');
	// 	}
		
		redirect('cBase/daftarPenerbit');
	

	}

	public function tampilEdit(){
		$data['title'] = "BookStore Arief";
		$kode = $this->uri->segment(3);
		// $data['data_kode'] = 3;
		// $data['data_kode'] = $this->Model_buku->get_kodePenerbit($kode)->row_array();
		$data['data_banyak'] = $this->Model_buku->getAllBukus()->result_array();
		$data['data_penerbit'] = $this->db->get('tb_penerbit')->result_array();
		$data['data_buku'] = $this->Model_buku->get_spesifik($kode)->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('vEdit');
		$this->load->view('templates/footer');
	}
	
	public function tampilEditPenerbit(){
		$data['title'] = "BookStore Arief";
		$kode = $this->uri->segment(3);
		$data['data_penerbit'] = $this->Model_buku->get_spesifik_penerbit($kode)->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('vEditPenerbit');
		$this->load->view('templates/footer');
	}

	public function editBuku($kode){
		$kode = $this->uri->segment(3);
		// $form = $this->input->post('editPenerbit');
		// $a = $this->Model_buku->get_namaPenerbit($kode);

		$data = array(
			'judul_buku' => $this->input->post('editNama'),
			'tahun_terbit' => $this->input->post('editTerbit'),
			'kode_penerbit' => $this->input->post('editPenerbit')
		);
		$this->Model_buku->edit_buku($kode,$data);
	
		redirect('cBase/daftarBuku');
	}

	public function editPenerbit($kode){
		$kode = $this->uri->segment(3);
		$data = array(
			'nama_penerbit' => $this->input->post('editPenerbit'),
			'alamat_penerbit' => $this->input->post('editAlamat')
		);
		$this->Model_buku->edit_penerbit($kode,$data);
	
		redirect('cBase/daftarPenerbit');
	}

	// public function deletes(){
    //     $connection = mysqli_connect('localhost', 'root', '', 'db_buku');
	// 	$kode = $this->uri->segment(3);
    //     if (!$connection) {
    //         die("Database connection failed: " . mysqli_connect_error());
    //     }
            
    //         $delete_query = "DELETE FROM tb_penerbit WHERE kode_penerbit = $kode";
        
    //         if (mysqli_query($connection, $delete_query)) {
	// 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
	// 	Data Berhasil di Hapus
	//   </div>');
    //             // Data deleted successfully, redirect to a success page or display a success message
    //             redirect('cBase/daftarPenerbit');
    //             // header('Location: success.php');
    //             exit();
    //         } else {
    //             // Check if the error is due to a constraint violation (e.g., foreign key constraint)
    //             if (mysqli_errno($connection) == 1451) {
					
    //                 $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
	// 	Data Gagal di Hapus Karna Constraint Data
	//   </div>');
	//   redirect('cBase/daftarPenerbit');
    //             } else {
    //                 // Other database error, display a generic error message
    //                 $error_message = "Error deleting data: " . mysqli_error($connection);
    //             }
    //         }
        
    // }

	
}