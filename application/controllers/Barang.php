<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
	public function index()
	{
		$this->load->model('Barang_model');
		/* $data['kode_barang']    = "B001";
        $data['nama']           = "GULA";
        $data['harga']          = "16000";

        $data['barang']         = $this->db->get('barang')->result();*/
		$data['barang_model']   = $this->Barang_model->Get_barang();
		$this->load->view('Barang_view', $data);
	}

	public function Add()
	{
		$data['group'] = $this->db->get('barang_group')->result();
		$this->load->view('barang_add', $data);
	}

	public function Save()
	{
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');

		// Menangkap ID dari group barang
		$id_group = $this->input->post('id_group');

		$data = array(
			'kode_barang' 	=> $kode_barang,
			'nama_barang' 	=> $nama_barang,
			'harga'			=> $harga,
			'id_group'		=> $id_group
		);

		///print_r($data);
		$this->db->insert('barang', $data);
		redirect('Barang');
	}

	public function Edit()
	{
		$kode_barang = $this->uri->segment(3);
		$data['group'] = $this->db->get('barang_group')->result();
		$data['barang'] = $this->db->get_where('barang', array('kode_barang' => $kode_barang))->result();
		$this->load->view('barang_update', $data);
	}

	public function Update()
	{
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');

		// Menangkap ID dari group barang
		$id_group = $this->input->post('id_group');

		$data = array(
			'nama_barang' 	=> $nama_barang,
			'harga'			=> $harga,
			'id_group'		=> $id_group
		);

		$this->db->where('kode_barang', $kode_barang);
		$this->db->update('barang', $data);
		redirect('Barang');
	}

	public function Hapus()
	{
		$kode_barang = $this->uri->segment(3);

		$this->db->where('kode_barang', $kode_barang);
		$this->db->delete('barang');
		redirect('Barang');
	}

	/** Fnction untuk proses transaksi pembelian */
	public function Beli()
	{
		$data['barang'] = $this->db->get('barang')->result();
		$this->load->view('barang_beli', $data);
	}

	public function Save_pembelian()
	{
		$nofaktur 		= $this->input->post('nofaktur');
		$tanggal		= $this->input->post('tanggal');
		$kode_barang	= $this->input->post('kode_barang');
		$qty			= $this->input->post('qty');
		$harga			= $this->input->post('harga');

		$data = array(
			'nofaktur' => $nofaktur,
			'tanggal' => $tanggal,
			'kode_barang' => $kode_barang,
			'qty' => $qty,
			'harga' => $harga
		);
		$this->db->insert('pembelian', $data);

		// Update stock pada tabel barang
		/*$ambilStock = $this->db->get_where('barang', ['kode_barang' => $kode_barang])->result_array();
		foreach ($ambilStock as $_row);
		//$ambilStock = $this->db->get_where('barang', ['kode_barang' => $kode_barang])->result();
		// $stock = $_row->stock
		$stock = $_row['stock'] + $qty;
		//echo $stock;
		$update = array(
			'stock'			=> $stock
		);
		$this->db->where('kode_barang', $kode_barang);
		$this->db->update('barang', $update);*/
		redirect('Barang');

		//print_r($data);
	}
}
