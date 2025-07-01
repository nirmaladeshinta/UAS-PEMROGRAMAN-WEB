<?php
class Pegawai_model extends CI_Model
{
    public function Get_pegawai()
    {
        ///$this->db->get('pegawai');
        //$this->db->join('jabatan', 'jabatan.id = pegawai.id_jabatan');
        //$sql = "SELECT * FROM pegawai,jabatan where pegawai.id_jabatan
        //=jabatan.id";
        // Inner join, left join, right join
        // 
        $sql = "SELECT pegawai.nip, pegawai.nama, pegawai.no_telp,
        jabatan.nama as jabatan FROM pegawai 
        left join jabatan on jabatan.id=pegawai.id_jabatan";
        $data = $this->db->query($sql)->result();
        return $data;
    }

    public function Post_data($data)
    {
        $this->db->insert('pegawai', $data);
    }

    public function Update_data()
    {
        $this->db->update('pegawai', $data);
    }

    public function Delete_data() {}
}
