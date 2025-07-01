<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testgeneratehtml extends CI_Controller
{
	public function index()
	{
		$this->load->view('penduduk_add');
	}

}
