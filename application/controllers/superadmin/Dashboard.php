<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('superadmin/login');
	}

	public function index()
	{
		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/index');
		$this->load->view('superadmin/includes/footer');
	}

	public function profile()
	{
		$id = $this->session->userdata('id');

		$this->db->where('id', $id);
		$data['row'] = $this->db->get('superadmin')->row();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/profile', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'name'				=> $this->input->post('name'),
			'email'				=> $this->input->post('email'),
			'password'			=> $this->input->post('password')
		);

		$this->db->where('id', $id);
		$this->db->update('superadmin', $data);

		return redirect('superadmin/dashboard/profile');
	}

}
