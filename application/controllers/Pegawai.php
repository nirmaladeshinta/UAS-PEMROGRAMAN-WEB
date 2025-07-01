<?php
class Pegawai extends CI_Controller
{

	public function index()
	{
		$this->load->model('Pegawai_model');
		$data['nip'] = "NIP.0001";
		$data['nama'] = "Yulia Handayani";
		$data['no_telp'] = "08123324234324";

		//$pegawai = $this->db->get('pegawai')->result();// SELECT * FROM `pegawai`
		// print_r($pegawai) . "<br>";
		//echo $this->db->last_query();
		$data['pegawai'] = $this->db->get('pegawai')->result();
		$data['pegawai_model'] = $this->Pegawai_model->Get_pegawai();
		$this->load->view('pegawai_view', $data);
	}

	public function Add()
	{
		$data['jabatan']	=	$this->db->get('jabatan')->result();
		$this->load->view('pegawai_add', $data);
	}

	public function Save()
	{
		$this->load->model('Pegawai_model');

		$nip 		= $this->input->post('nip');
		$nama 		= $this->input->post('nama');
		$no_telp 	= $this->input->post('no_telp');
		$id_jabatan	= $this->input->post('id_jabatan');

		$data = array(
			'nip' 			=> $nip,
			'nama' 			=> $nama,
			'no_telp' 		=> $no_telp,
			'id_jabatan'	=> $id_jabatan
		);

		$this->Pegawai_model->Post_data($data);
		//$this->db->insert('pegawai',$data);
		redirect('Pegawai');
	}

	public function Edit()
	{
		// http://127.0.0.1/web_ci/index.php/Pegawai/Edit/NIP.001
		$nip = $this->uri->segment(3);
		$data['jabatan'] = $this->db->get('jabatan')->result();
		$data['pegawai'] = $this->db->get_where('pegawai', array('nip' => $nip))->result();
		$this->load->view('pegawai_edit', $data);
	}

	public function Update()
	{
		$nip 		= $this->input->post('nip');
		$nama 		= $this->input->post('nama');
		$no_telp 	= $this->input->post('no_telp');
		$id_jabatan	= $this->input->post('id_jabatan');
		$data = array(
			'nama' 			=> $nama,
			'no_telp' 		=> $no_telp,
			'id_jabatan'	=> $id_jabatan
		);

		$this->db->where('nip', $nip);
		$this->db->update('pegawai', $data);
		redirect('Pegawai');
	}

	public function Delete()
	{
		$segment1 = $this->uri->segment(1);
		$segment2 = $this->uri->segment(2);
		$nip = $this->uri->segment(3);

		//echo $segment1."<br>".$segment2."<br>".$nip;

		$this->db->where('nip', $nip);
		$this->db->delete('pegawai');

		redirect('pegawai');
	}
}
