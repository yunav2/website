<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller {
	public function index()
	{
        $data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('templates_admin/head');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
	}

	public function tambah_aksi() {
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
			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'stok' => $stok,
			'harga' => $harga,
			'gambar' => $gambar
		);
		$this->model_barang->tambah_barang($data, 'data_barang');
		redirect('admin/data_barang/index');
	}

	public function edit ($id){
		$where = array('id' -> $id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'data_barang')->result();
		$this->load->view('templates_admin/head');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update(){
		$id = $this->input->post('id');
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
			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'stok' => $stok,
			'harga' => $harga,
			'gambar' => $gambar
		);

		$where = array('id' => $id);

		$this->model_barang->update_barang($where, $data, 'data_barang');
		redirect('admin/data_barang/index');
	}

	public function delete($id){
		$where = array('id' -> $id);
		$this->model_barang->delete_barang($where, 'data_barang');
		redirect('admin/data_barang/index');
	}
}

