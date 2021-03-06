<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('admin/login');

		$roles_array = explode(',', $this->session->userdata('roles'));
		if(!in_array('crm', $roles_array))
			return redirect('admin/dashboard');
	}

	public function index()
	{
		$this->db->order_by('created_datetime', 'DESC');
		$data['rows'] = $this->db->get('customers')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/customer/all-customer', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/customer/add-customer');
		$this->load->view('admin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'name'					=> $this->input->post('name'),
			'profession'			=> $this->input->post('profession'),
			'fname'					=> $this->input->post('fname'),
			'lname'					=> $this->input->post('lname'),
			'email'					=> $this->input->post('email'),
			'password'				=> $this->input->post('password'),
			'dob'					=> $this->input->post('dob'),
			'address'				=> $this->input->post('address'),
			'primary_mobile'		=> $this->input->post('primary_mobile'),
			'alternate_mobile'		=> $this->input->post('alternate_mobile'),
			'created_by'			=> $this->session->userdata('id'),
			'created_datetime'		=> date('Y-m-d H:i:s')
		);
		
		$this->db->where('email', $data['email']);
		$num_rows = $this->db->get('customers')->num_rows();

		if($num_rows > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-warning'>Email already exists. Please use another one.</div>");
		}
		else
		{
			$this->db->insert('customers', $data);
			if($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Customer added successfully.</div>");
			}
			else
			{
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Customer not added successfully.</div>");
			}
		}

        return redirect('admin/customers');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('customers');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Customer deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Customer not deleted successfully.</div>");

		return redirect('admin/customers');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('customers')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/customer/edit-customer', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'name'					=> $this->input->post('name'),
			'profession'			=> $this->input->post('profession'),
			'fname'					=> $this->input->post('fname'),
			'lname'					=> $this->input->post('lname'),
			'email'					=> $this->input->post('email'),
			'password'				=> $this->input->post('password'),
			'dob'					=> $this->input->post('dob'),
			'address'				=> $this->input->post('address'),
			'primary_mobile'		=> $this->input->post('primary_mobile'),
			'alternate_mobile'		=> $this->input->post('alternate_mobile'),
			'customer_status'		=> $this->input->post('customer_status'),
			'updated_by'			=> $this->session->userdata('id'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('customers', $data);

		if($this->db->affected_rows() > 0 )
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Customer updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Customer not updated successfully.</div>");
		return redirect('admin/customers');
	}

	public function view($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('customers')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/customer/view-customer', $data);
		$this->load->view('admin/includes/footer');
	}
}
