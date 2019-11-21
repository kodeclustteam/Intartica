<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller 
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
		$this->db->select('admins.*, organizations.org_name');
		$this->db->from('admins');
		$this->db->join('organizations', 'admins.org_id = organizations.id', 'inner');
		$this->db->order_by('admins.created_datetime', 'DESC');
		$data['rows'] = $this->db->get()->result();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/admin/all-admin', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add()
	{
		// get all roles from roles table
		$data['roles'] = $this->db->get('roles')->result();

		// get all organizations from organizations table
		$this->db->where('org_status', 'Active');
		$data['organizations'] = $this->db->get('organizations')->result();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/admin/add-admin', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'org_id'			=> $this->input->post('org_id'),
			'fname'				=> trim($this->input->post('fname')),
			'lname'				=> trim($this->input->post('lname')),
			'email'				=> trim($this->input->post('email')),
			'password'			=> trim($this->input->post('password')),
			'roles'				=> implode(',', $this->input->post('roles')),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		// check admin existance 
		$this->db->where('email', $data['email']);
		$num = $this->db->get('admins')->num_rows();

		if($num > 0)
		{
			$this->session->set_flashdata('error', "<div class='alert alert-warning'>Email allready exists. Please add another one.</div>");
		}
		else
		{
			$this->db->insert('admins', $data);
        	$this->session->set_flashdata('error', "<div class='alert alert-success'>Admin added successfully.</div>");
		}
		
        return redirect('superadmin/admins');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('admins');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Admin deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Admin not deleted successfully.</div>");

		return redirect('superadmin/admins');
	}

	public function edit($id)
	{
		// get all roles from roles table
		$data['roles'] = $this->db->get('roles')->result();

		// get all organizations
		$this->db->where('org_status', 'Active');
		$data['organizations'] = $this->db->get('organizations')->result();

		$this->db->where('id', $id);
		$data['row'] = $this->db->get('admins')->row();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/admin/edit-admin', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'org_id'			=> $this->input->post('org_id'),
			'fname'				=> trim($this->input->post('fname')),
			'lname'				=> trim($this->input->post('lname')),
			'email'				=> trim($this->input->post('email')),
			'password'			=> trim($this->input->post('password')),
			'roles'				=> implode(',', $this->input->post('roles')),
			'admin_status'		=> $this->input->post('admin_status'),
			'updated_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('admins', $data);

		if($this->db->affected_rows() > 0)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Admin updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Admin not updated successfully.</div>");
		return redirect('superadmin/admins');
	}
}
