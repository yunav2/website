<?php

class Model_barang extends CI_Model{
    public function tampil_data(){
        return $this->db->get('data_barang');
    }

    public function tambah_barang($data, $table){
        $this->db->insert($table, $data);
    }

    public function delete($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}