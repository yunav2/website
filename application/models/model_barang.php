<?php

class Model_barang extends CI_Model{
    public function tampil_data(){
        return $this->db->get('data_barang');
    }

    public function input_data($data, $table){
        $this->db->insert($table, $data);
    }
}