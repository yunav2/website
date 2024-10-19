<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$data['barang'] = $this -> mtoko -> tampil_data() -> result();
		$this->load->view('templates/head');
		$this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
	}
}