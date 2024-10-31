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

        $max_id = $this->model_barang->get_max_id('data_barang');
        $id_brg = $max_id + 1;
	
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

	public function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['barang'] = $this->model_barang->editBarang($where, 'data_barang')->result_array();
		$this->load->view('templates_admin/head');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
    $id_barang = $this->input->post('id_barang');
    $nama_barang = $this->input->post('nama_barang');
    $keterangan = $this->input->post('keterangan');
    $kategori = $this->input->post('kategori');
    $stok = $this->input->post('stok');
    $harga = $this->input->post('harga');

    $data = array(
        'nama_barang' => $nama_barang,
        'keterangan' => $keterangan,
        'kategori' => $kategori,
        'harga' => $harga,
        'stok' => $stok
    );

    $where = array('id_barang' => $id);

    $this->model_barang->updateBarang($data, $where, 'data_barang');
    redirect('admin/data_barang/index');
    }

    public function delete($id)
    {
        $where = array('id_barang' => $id);

        // delete gambar
        $gambar = $this->model_barang->editBarang($where, 'data_barang')->result_array()[0]['gambar_brg'];
        $path = './assets/uploads/' . $gambar;
        unlink($path);

        $this->model_barang->hapusBarang($where, 'data_barang');
        redirect('admin/data_barang/');
    }
}

