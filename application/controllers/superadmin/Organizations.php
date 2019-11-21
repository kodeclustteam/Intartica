<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizations extends CI_Controller 
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
		$this->db->order_by('created_datetime', 'DESC');
		$data['rows'] = $this->db->get('organizations')->result();
		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/organization/all-organization', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add()
	{
		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/organization/add-organization');
		$this->load->view('superadmin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'org_name'			=> trim(strtolower($this->input->post('org_name'))),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		// check organization existance 
		$this->db->where('org_name', $data['org_name']);
		$num = $this->db->get('organizations')->num_rows();

		if($num > 0)
		{
			$this->session->set_flashdata('error', "<div class='alert alert-warning'>Organization allready exists. Please add another one.</div>");
		}
		else
		{
			$this->db->insert('organizations', $data);
        	$this->session->set_flashdata('error', "<div class='alert alert-success'>Organization added successfully.</div>");
		}
		
        return redirect('superadmin/organizations');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('organizations');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Organization deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Organization not deleted successfully.</div>");

		return redirect('superadmin/organizations');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('organizations')->row();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/organization/edit-organization', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'org_name'			=> $this->input->post('org_name'),
			'org_status'		=> $this->input->post('org_status'),
			'updated_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('organizations', $data);

		if($this->db->affected_rows() > 0)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Organization updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Organization not updated successfully.</div>");
		return redirect('superadmin/organizations');
	}
}
