<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends CI_Controller 
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
		$data['rows'] = $this->db->get('newsletter')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/subscriber/all-subscriber', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vendor/add-vendor');
		$this->load->view('admin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'name'					=> $this->input->post('name'),
			'gstin_tin_number'		=> $this->input->post('gstin_tin_number'),
			'fname'					=> $this->input->post('fname'),
			'lname'					=> $this->input->post('lname'),
			'email'					=> $this->input->post('email'),
			'password'				=> $this->input->post('password'),
			'address'				=> $this->input->post('address'),
			'primary_mobile'		=> $this->input->post('primary_mobile'),
			'alternate_mobile'		=> $this->input->post('alternate_mobile'),
			'created_by'			=> $this->session->userdata('id'),
			'created_datetime'		=> date('Y-m-d H:i:s')
		);
		
		$this->db->where('email', $data['email']);
		$num_rows = $this->db->get('vendors')->num_rows();

		if($num_rows > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-warning'>Email already exists. Please use another one.</div>");
		}
		else
		{
			$this->db->insert('vendors', $data);
			if($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Vendor added successfully.</div>");
			}
			else
			{
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Vendor not added successfully.</div>");
			}
		}

        return redirect('admin/vendors');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('newsletter');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Subscriber deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Subscriber not deleted successfully.</div>");

		return redirect('admin/subscribers');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('newsletter')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/subscriber/edit-subscriber', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'email'					=> $this->input->post('email'),
			'updated_by'			=> $this->session->userdata('id'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('newsletter', $data);

		if($this->db->affected_rows() > 0 )
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Subscriber updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Subscriber not updated successfully.</div>");
		return redirect('admin/subscribers');
	}

	public function view($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('vendors')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/vendor/view-vendor', $data);
		$this->load->view('admin/includes/footer');
	}
}
