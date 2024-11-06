<?php

class Model_barang extends CI_Model{
    public function tampil_data(){
        return $this->db->get('data_barang');
    }

    public function tambah_barang($data, $table){
        $this->db->insert($table, $data);
    }

    public function editBarang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateBarang($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapusBarang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_max_id($table)
    {
        $this->db->select_max('id_barang');
        $query = $this->db->get($table);
        return $query->row()->id_barang;
    }

    public function find($id)
    {
        $result = $this->db->where('id_barang', $id_barang)
            ->limit(1)
            ->get('data_barang');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}