<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // Memuat database jika belum dimuat secara otomatis
        $this->load->database();
        // Memuat helper URL untuk fungsi base_url() dan redirect()
        $this->load->helper('url');

        // Pastikan user sudah login
        if ($this->session->userdata('ses_masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
		$this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        // Mengambil id user dan akses user ketika berhasil login
        $id_user = $this->session->userdata('ses_id_user');
        $akses = $this->session->userdata('ses_akses'); // 'dosen', 'prodi', 'mahasiswa'

        $data['menu'] = array(); // Inisialisasi array menu
        $data['user_data'] = array(); // Inisialisasi array untuk data spesifik user

        // Query untuk mengambil menu berdasarkan hak akses user
        $query_menu = "SELECT
                            tm.nama AS nama_menu,
                            tm.link AS link_menu
                        FROM tbl_user_menu tum
                        JOIN tbl_menu tm ON tum.id_menu = tm.id
                        WHERE tum.id_user = '$id_user'";
        $data['menu'] = $this->db->query($query_menu)->result();

        // Logika untuk menampilkan data berdasarkan hak akses
        switch ($akses) {
            case 'dosen':
                $query_dosen = "SELECT nama, email FROM tbl_user WHERE id = '$id_user'";
                $data['user_data'] = $this->db->query($query_dosen)->row();
                $data['dashboard_title'] = 'Dashboard Dosen';
                break;

            case 'prodi':
                $query_prodi_user = "SELECT nama, email FROM tbl_user WHERE id = '$id_user'";
                $data['user_data'] = $this->db->query($query_prodi_user)->row();
                $data['dashboard_title'] = 'Dashboard Prodi';
                break;

            case 'mahasiswa':
                $npm_mahasiswa = $this->session->userdata('ses_npm');
                if ($npm_mahasiswa) {
                    $query_mahasiswa = "SELECT m.nama_mahasiswa, m.npm, p.nama_prodi, f.nama_fakultas
                                        FROM mahasiswa m
                                        JOIN prodi p ON m.id_p = p.id_p
                                        JOIN fakultas f ON p.id_f = f.id_f
                                        WHERE m.npm = '$npm_mahasiswa'";
                    $data['user_data'] = $this->db->query($query_mahasiswa)->row();
                } else {
                    $query_mahasiswa_user = "SELECT nama, email FROM tbl_user WHERE id = '$id_user'";
                    $data['user_data'] = $this->db->query($query_mahasiswa_user)->row();
                }
                $data['dashboard_title'] = 'Dashboard Mahasiswa';
                break;

            default:
                $data['dashboard_title'] = 'Dashboard';
                break;
        }

        // Tampilkan view dashboard dengan data yang sudah disiapkan
        // Asumsi 'template/home' adalah bagian dari konten utama dashboard
        $this->template->load('template/dashboard', 'template/home', $data);
    }

    public function Session_form()
    {
        $this->template->load('template/dashboard', 'session_form');
    }

    public function Save_session()
    {
        $user_nama  = $this->input->post('user_name');
        $password   = $this->input->post('pswd');

        $this->session->set_userdata('user_nama', $user_nama);
        $this->session->set_userdata('pswd', $password);
    }

    public function Sigout()
    {
        $this->session->unset_userdata('ses_email');
        $this->session->unset_userdata('ses_masuk');
        $this->session->unset_userdata('ses_id_user');
        $this->session->unset_userdata('ses_akses');
        $this->session->unset_userdata('ses_npm');
        echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php'>";
    }

	public function data_mahasiswa()
	{
        // Pastikan variabel $title didefinisikan di sini
        $data['title'] = 'Data Mahasiswa'; // Judul yang akan ditampilkan di view
        $data['mahasiswa'] = $this->Mahasiswa_model->Get_mahasiswa(); // Menggunakan nama variabel 'mahasiswa' agar konsisten dengan view

	    $this->template->load('template/dashboard','mahasiswa_view',$data);
    }

    // Fungsi `index()` yang kedua di bawah ini harus dihapus
    /*
    public function index()
    {
        // Definisikan variabel $title di sini
        $data['title'] = 'Halaman Mahasiswa'; // Atau nilai lain yang sesuai
        $this->load->view('mahasiswa_view', $data);
    }
    */
    // Fungsi-fungsi lain (supplier, jenis_barang, barang, tangkap_barang) tetap sama
    // atau bisa disesuaikan jika ada relevansi dengan data akademik

	public function add()
    {
        $data['title'] = 'Tambah Data Mahasiswa';
        $data['prodi'] = $this->Mahasiswa_model->get_prodi();

        $this->template->load('template/dashboard', 'mahasiswa_add', $data);
    }

    // ... (bagian atas controller tidak berubah)

    public function save()
    {
        $npm = $this->input->post('npm');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $id_p = $this->input->post('id_p');

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

        // Perbaiki di sini
        redirect('welcome/data_mahasiswa'); //
    }

    public function update()
    {
        $npm = $this->input->post('npm');
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

        // Perbaiki di sini
        redirect('welcome/data_mahasiswa'); //
    }

    public function delete($npm)
    {
        $delete = $this->Mahasiswa_model->delete_mahasiswa($npm);

        if ($delete) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data mahasiswa.');
        }

        // Perbaiki di sini
        redirect('welcome/data_mahasiswa'); //
    }
}
