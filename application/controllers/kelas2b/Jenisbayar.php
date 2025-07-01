<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenisbayar extends CI_Controller
{
    public function index()
    {
        $this->template->load('template/dashboard', 'kelas2b/master/pembayaran_jenis/insert');
    }

    public function Insert()
    {
        $nama       = $this->input->post('nama');
        $nominal    = $this->input->post('nominal');
        $data = array(
            'nama'      => $nama,
            'nominal'   => $nominal
        );
        $this->db->insert('pembayaran_jenis', $data);
    }
}
