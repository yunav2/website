<?php

class Model_barang extends CI_Model{
    public function tampil_data(){
        return $this->db->get('data_barang');
    }

    public function tambah_barang($data, $table){
        $this->db->insert($table, $data);
    }

    public function edit_barang($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_barang($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_barang($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function search($keyword){
        $this->db->like('id', $keyword);
        $this->db->or_like('nama', $keyword);
        return $this->db->get('data_barang')->result();
    }
}