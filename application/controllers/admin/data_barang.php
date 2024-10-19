<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {
	public function index()
	{
		$this->load->view('templates_admin/head');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
	}

	public function action() {
		$nama_barang = $this->input->post('nama_barang');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$stok = $this->input->post('stok');
		$harga = $this->input->post('harga');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar = ''){}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif';
	
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gagal Upload";
			}else{
				$gambar = $this->upload->data('file_name');
			}
		}
	
		$data = array(
			'nama_brg' => $nama_barang,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'stok' => $stok,
			'harga' => $harga,
			'gambar' => $gambar
		);
		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('admin/data_barang/index');
	}
}

