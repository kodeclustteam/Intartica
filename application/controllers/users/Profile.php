<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
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
		$uid 		= $this->session->userdata('uid');
		$user_type 	= $this->session->userdata('user_type');
		if($user_type == 'employee')
		{
			$this->db->where('org_status', 'Active');
			$data['organizations'] 	= $this->db->get('organizations')->result();

			$data['departments'] 	= $this->db->get('departments')->result();

			$this->db->where('branch_status', 'Active');
			$data['branches'] 		= $this->db->get('branches')->result();

			$data['row'] 	= $this->db->get_where('employees', ['id'=>$uid])->row();
			$data['user_type'] 	= $user_type;
		}
		else if($user_type == 'customer')
		{
			$data['row'] 	= $this->db->get_where('customers', ['id'=>$uid])->row();
			$data['user_type'] 	= $user_type;
		}
		else
		{
			$data['row'] 	= $this->db->get_where('vendors', ['id'=>$uid])->row();
			$data['user_type'] 	= $user_type;
		}

		$this->load->view('users/includes/header');
		$this->load->view('users/profile', $data);
		$this->load->view('users/includes/footer');
	}

	public function edit_submit($id)
	{
		$uid 		= $this->session->userdata('uid');
		$user_type 	= $this->session->userdata('user_type');

		if($user_type == 'employee')
		{
			$data = array(
				'fname'					=> $this->input->post('fname'),
				'lname'					=> $this->input->post('lname'),
				'dob'					=> $this->input->post('dob'),
				'primary_mobile'		=> $this->input->post('primary_mobile'),
				'alternate_mobile'		=> $this->input->post('alternate_mobile'),
				'password'				=> $this->input->post('password'),
				'address'				=> $this->input->post('address'),
				'updated_datetime'		=> date('Y-m-d H:i:s')
			);
			$this->db->where('id', $uid);
			$this->db->update('employees', $data);

			$this->session->set_flashdata('error', "<div class='alert alert-success'>Employee info updated successfully.</div>");
		}
		else if($user_type == 'customer')
		{
			$data = array(
				'name'					=> $this->input->post('name'),
				'profession'			=> $this->input->post('profession'),
				'fname'					=> $this->input->post('fname'),
				'lname'					=> $this->input->post('lname'),
				'password'				=> $this->input->post('password'),
				'dob'					=> $this->input->post('dob'),
				'address'				=> $this->input->post('address'),
				'primary_mobile'		=> $this->input->post('primary_mobile'),
				'alternate_mobile'		=> $this->input->post('alternate_mobile'),
				'updated_datetime'		=> date('Y-m-d H:i:s')
			);
			$this->db->where('id', $uid);
			$this->db->update('customers', $data);
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Customer info updated successfully.</div>");
		}
		else if($user_type == 'vendor')
		{
			$data = array(
				'name'					=> $this->input->post('name'),
				'gstin_tin_number'		=> $this->input->post('gstin_tin_number'),
				'fname'					=> $this->input->post('fname'),
				'lname'					=> $this->input->post('lname'),
				'password'				=> $this->input->post('password'),
				'address'				=> $this->input->post('address'),
				'primary_mobile'		=> $this->input->post('primary_mobile'),
				'alternate_mobile'		=> $this->input->post('alternate_mobile'),
				'updated_datetime'		=> date('Y-m-d H:i:s')
			);
			$this->db->where('id', $uid);
			$this->db->update('vendors', $data);
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Vendor info updated successfully.</div>");
		}

		return redirect('users/profile');
	}

}
