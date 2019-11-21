<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('admin/login');
	}

	public function index()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/index');
		$this->load->view('admin/includes/footer');
	}

	public function profile()
	{
		$id = $this->session->userdata('id');

		$this->db->where('id', $id);
		$data['row'] = $this->db->get('admins')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'fname'				=> $this->input->post('fname'),
			'lname'				=> $this->input->post('lname'),
			'email'				=> $this->input->post('email'),
			'password'			=> $this->input->post('password'),
			'updated_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('admins', $data);

		return redirect('admin/dashboard/profile');
	}

}
