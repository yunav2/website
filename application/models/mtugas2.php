<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtugas2 extends CI_Model{
    public function get_data() {
        return $this -> db -> get('tabel_mahasiswa') -> result_array();
    }
}