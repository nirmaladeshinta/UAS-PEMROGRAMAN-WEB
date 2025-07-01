<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model'); // Memuat Mahasiswa_model
        $this->load->helper('url');
        $this->load->helper('form'); // Untuk form_open() dll.

        // Pastikan user sudah login (sesuai Welcome.php)
        if ($this->session->userdata('ses_masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        // Opsional: Batasi akses hanya untuk peran tertentu (misal: prodi, admin)
        // if ($this->session->userdata('ses_akses') != 'prodi' && $this->session->userdata('ses_akses') != 'admin') {
        //     show_404(); // Atau redirect ke halaman lain
        // }
    }

    public function index()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->Get_mahasiswa()->result(); // Mengambil semua data mahasiswa

        // Memuat view mahasiswa_view.php di dalam template dashboard AdminLTE
        $this->template->load('template/dashboard', 'mahasiswa/mahasiswa_view', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Data Mahasiswa';
        $data['prodi'] = $this->Mahasiswa_model->get_prodi(); // Mengambil daftar prodi untuk dropdown

        // Memuat view mahasiswa_add.php di dalam template dashboard AdminLTE
        $this->template->load('template/dashboard', 'mahasiswa/mahasiswa_add', $data);
    }

    public function save()
    {
        $npm = $this->input->post('npm');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $id_p = $this->input->post('id_p'); // Pastikan ini sesuai dengan nama di form

        $data = array(
            'npm' => $npm,
            'nama_mahasiswa' => $nama_mahasiswa,
            'id_p' => $id_p
        );

        $insert = $this->Mahasiswa_model->insert_mahasiswa($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data mahasiswa.');
        }

        redirect('mahasiswa'); // Kembali ke halaman daftar mahasiswa
    }

    public function edit($npm)
    {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_by_npm($npm); // Mengambil data mahasiswa berdasarkan NPM
        $data['prodi'] = $this->Mahasiswa_model->get_prodi(); // Mengambil daftar prodi untuk dropdown

        // Jika mahasiswa tidak ditemukan
        if (empty($data['mahasiswa'])) {
            show_404();
        }

        // Memuat view mahasiswa_update.php di dalam template dashboard AdminLTE
        $this->template->load('template/dashboard', 'mahasiswa/mahasiswa_update', $data);
    }

    public function update()
    {
        $npm = $this->input->post('npm'); // NPM dari hidden field atau field yang tidak bisa diubah
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $id_p = $this->input->post('id_p');

        $data = array(
            'nama_mahasiswa' => $nama_mahasiswa,
            'id_p' => $id_p
        );

        $update = $this->Mahasiswa_model->update_mahasiswa($npm, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data mahasiswa.');
        }

        redirect('mahasiswa'); // Kembali ke halaman daftar mahasiswa
    }

    public function delete($npm)
    {
        $delete = $this->Mahasiswa_model->delete_mahasiswa($npm);

        if ($delete) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data mahasiswa.');
        }

        redirect('mahasiswa'); // Kembali ke halaman daftar mahasiswa
    }
}