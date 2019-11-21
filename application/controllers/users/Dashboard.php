<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('uid'))
			return redirect('users/login');
	}

	public function index()
	{
		$this->load->view('users/includes/header');
		$this->load->view('users/index');
		$this->load->view('users/includes/footer');
	}

}
