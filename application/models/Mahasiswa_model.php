<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Pastikan database dimuat di model
    }

    public function Get_mahasiswa()
    {
        // Contoh query untuk mendapatkan semua mahasiswa dengan informasi prodi dan fakultas
        $this->db->select('m.npm, m.nama_mahasiswa, p.nama_prodi, f.nama_fakultas');
        $this->db->from('mahasiswa m');
        $this->db->join('prodi p', 'm.id_p = p.id_p', 'left'); // Sesuaikan JOIN berdasarkan relasi tabel Anda
        $this->db->join('fakultas f', 'p.id_f = f.id_f', 'left'); // Sesuaikan JOIN
        $query = $this->db->get();

        // Mengembalikan hasil sebagai array of objects.
        // Setiap objek akan memiliki properti seperti 'npm', 'nama_mahasiswa', dll.
        return $query->result(); // PENTING: Gunakan result() untuk mendapatkan array objek

        // Jika Anda menggunakan result_array(), maka di view Anda perlu mengaksesnya sebagai array: $mhs['npm']
        // return $query->result_array();
    }

    // Fungsi lain seperti get_prodi, insert_mahasiswa, get_mahasiswa_by_npm, update_mahasiswa, delete_mahasiswa
    // ... (sesuai dengan yang sudah Anda miliki)

    public function get_prodi()
    {
        $query = $this->db->get('prodi');
        return $query->result(); // Mengembalikan semua prodi sebagai objek
    }

    public function insert_mahasiswa($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    public function get_mahasiswa_by_npm($npm)
    {
        $this->db->select('m.npm, m.nama_mahasiswa, p.id_p, p.nama_prodi, f.nama_fakultas'); // Tambahkan id_p untuk form edit
        $this->db->from('mahasiswa m');
        $this->db->join('prodi p', 'm.id_p = p.id_p', 'left');
        $this->db->join('fakultas f', 'p.id_f = f.id_f', 'left');
        $this->db->where('m.npm', $npm);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan satu baris sebagai objek
    }

    public function update_mahasiswa($npm, $data)
    {
        $this->db->where('npm', $npm);
        return $this->db->update('mahasiswa', $data);
    }

    public function delete_mahasiswa($npm)
    {
        $this->db->where('npm', $npm);
        return $this->db->delete('mahasiswa');
    }
}