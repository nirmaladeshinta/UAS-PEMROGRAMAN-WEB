<?php
class Barang_model extends CI_model
{

    public function Get_barang()
    {
        //$sql = "SELECT barang.*, barang_group.nama as group_barang FROM barang inner join barang_group on barang_group.id=barang.id_group";
        $sql = "SELECT barang.*, barang_group.nama as group_barang FROM barang left outer join barang_group on barang_group.id=barang.id_group";
        $barang = $this->db->query($sql);

        //echo $this->db->last_query();
        //$barang = $this->db->get('barang')->result();
        return $barang->result();
    }
}
