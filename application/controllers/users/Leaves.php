<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class leaves extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('uid'))
			return redirect('users/login');

		$user_type = $this->session->userdata('user_type');
		if($user_type != 'employee')
			return redirect('users/dashboard');
	}

	public function index()
	{
		$this->db->where('status', 'Active');
		$this->db->order_by('created_datetime', 'DESC');
		$data['rows'] = $this->db->get('holidays')->result();

		$this->load->view('users/includes/header');
		$this->load->view('users/leave/all-leave', $data);
		$this->load->view('users/includes/footer');
	}
}