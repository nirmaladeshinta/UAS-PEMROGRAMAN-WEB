<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public function Check()
    {
        $email  = $this->input->post('email');
        $pswd   = $this->input->post('pswd');

        $this->db->where('email', $email);
        $this->db->where('pswd', $pswd);
        $cek = $this->db->get('tbl_user')->result();

        //print_r($cek);
        // fungsi untuk mengetahui apakah user dan password ada atau tidak
        if (count($cek) > 0) {
            // fungsi untuk merubah data array menjadi sebuag class object
            foreach ($cek as $_cek);
            $this->session->set_userdata('ses_email', $_cek->email);
            $this->session->set_userdata('ses_masuk', TRUE);
            $this->session->set_userdata('ses_akses', $_cek->akses);
            $this->session->set_userdata('ses_id_user', $_cek->id);
            echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/Welcome'>";
        } else {
            echo "User login tidak terdaftar";
        }


        // untuk login prodi
        /*if ($email == 'prodi@gmail.com') {
            if ($pswd == 'prodi') {
                $this->session->set_userdata('ses_email', $email);
                $this->session->set_userdata('ses_masuk', TRUE);
                $this->session->set_userdata('ses_akses', 'prodi');
                //echo "Halaman prodi";
                echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/Welcome'>";
            } else {
                echo "Password salah";
            }
        }
        // Login dosen
        else if ($email == 'dosen@gmail.com') {
            if ($pswd == 'dosen') {
                $this->session->set_userdata('ses_email', $email);
                $this->session->set_userdata('ses_masuk', TRUE);
                $this->session->set_userdata('ses_akses', 'dosen');
                //echo "Halaman prodi";
                echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/Welcome'>";
            } else {
                echo "User tidak terdaftar";
            }
        }
        // login mahasiswa
        else if ($email == 'mahasiswa@gmail.com') {
            if ($pswd == 'mahasiswa') {
                $this->session->set_userdata('ses_email', $email);
                $this->session->set_userdata('ses_masuk', TRUE);
                $this->session->set_userdata('ses_akses', 'mahasiswa');
                //echo "Halaman prodi";
                echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/Welcome'>";
            } else {
                echo "Userlgoin tidak ditemukan";
            }
        }*/
    }
}
