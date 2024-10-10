<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctugas2 extends CI_Controller {
    public function index() {
        $this-> load -> model('mtugas2');
        $data['mahasiswa'] = $this-> mtugas2 -> get_data();

        $this-> load -> view('vtugas2', $data);
    }
}