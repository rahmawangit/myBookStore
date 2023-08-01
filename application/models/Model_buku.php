<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_buku extends CI_Model {

    // public function getAllBuku(){
    //     return $this->db->get('tb_buku');
    // }
    
    public function getAllBukus(){
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->join('tb_penerbit', 'tb_penerbit.kode_penerbit = tb_buku.kode_penerbit');
        $query = $this->db->get();

        return $query;
        // return $this->db->get('tb_buku');
    }

    public function simpan_buku($data){
        $this->db->insert('tb_buku',$data);
    }


    public function getDataSpesific($kode){
        $query = $this->db->query("SELECT * FROM tb_buku WHERE kode_penerbit = '$kode' ");

        return $query;
    }

    public function hapus_buku($kode){     
            $this->db->where('kode_buku',$kode);
            $this->db->delete('tb_buku');
        
    }

    public function get_spesifik($kode){
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->join('tb_penerbit', 'tb_penerbit.kode_penerbit = tb_buku.kode_penerbit');
        $this->db->where('kode_buku',$kode);
        $query = $this->db->get();

        return $query;
    }

    public function get_spesifik_penerbit($kode){
        $this->db->select('*');
        $this->db->from('tb_penerbit');
        $this->db->where('kode_penerbit',$kode);
        $query = $this->db->get();

        return $query;
    }

    public function edit_buku($kode,$dataMasuk){
        $data = array(
            'judul_buku' => $dataMasuk['judul_buku'],
            'tahun_terbit' => $dataMasuk['tahun_terbit'],
            'kode_penerbit' => $dataMasuk['kode_penerbit']
    );
    
    $this->db->where('kode_buku', $kode);
    $this->db->update('tb_buku', $data);
    }


    // PENERBIT IS HERE

    public function get_namaPenerbit($kode){
        $this->db->select('nama_penerbit');
        $this->db->from('tb_penerbit');
        $this->db->where('kode_penerbit',$kode);
    }

    public function get_kodePenerbit($kode){
        $this->db->select('kode_penerbit');
        $this->db->from('tb_buku');
        $this->db->join('tb_penerbit', 'tb_penerbit.kode_penerbit = tb_buku.kode_penerbit');
        $this->db->where('kode_buku',$kode);
    }

    public function simpan_penerbit($data){
        $this->db->insert('tb_penerbit',$data);
    }

    public function hapus_penerbit($kode){
        $this->db->where('kode_penerbit',$kode);
        $this->db->delete('tb_penerbit');
    }

    public function edit_penerbit($kode,$dataMasuk){
        $data = array(
            'nama_penerbit' => $dataMasuk['nama_penerbit'],
            'alamat_penerbit' => $dataMasuk['alamat_penerbit']
    );

    $this->db->where('kode_penerbit', $kode);
    $this->db->update('tb_penerbit', $data);

    }


    public function hapus_done($kode){
        
        $this->db->where('kode_penerbit',$kode);
        $query = $this->db->get('tb_penerbit');
        if($query->num_rows() > 0){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
			 	Data Gagal di Hapus Karna Constraint Data
			   </div>');
        }else{
            $this->db->where('kode_penerbit',$kode);
            $this->db->delete('tb_penerbit');
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
	 	Data Berhasil Di Hapus
	   </div>');
        }
        
        
       

       
        //  if($this->db->affected_rows()){
            
        //     // return true;
        // }else{
            
            // $this->db->error()['message'];
            // return false;
        }
    

//     $this->db->delete($this->table,array('id'=>$id));
// if ($this->db->_error_message()) {
//     $result = 'Error! ['.$this->db->_error_message().']';



// } else if (!$this->db->affected_rows()) {
//     $result = 'Error! ID ['.$id.'] not found';
// } else {
//     $result = 'Success';
// }

    
}