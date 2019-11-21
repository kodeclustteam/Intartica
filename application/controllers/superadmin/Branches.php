<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller 
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
		$this->db->select('branches.*, organizations.org_name');
		$this->db->from('branches');
		$this->db->join('organizations', 'branches.org_id = organizations.id', 'inner');
		$this->db->order_by('branches.created_datetime', 'DESC');
		$data['rows'] = $this->db->get()->result();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/branch/all-branch', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add()
	{
		$this->db->where('org_status', 'Active');
		$data['organizations'] = $this->db->get('organizations')->result();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/branch/add-branch', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'org_id'			=> $this->input->post('org_id'),
			'branch_name'		=> trim(strtolower($this->input->post('branch_name'))),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		// check branch existance 
		$this->db->where('branch_name', $data['branch_name']);
		$num = $this->db->get('branches')->num_rows();

		if($num > 0)
		{
			$this->session->set_flashdata('error', "<div class='alert alert-warning'>Branch allready exists. Please add another one.</div>");
		}
		else
		{
			$this->db->insert('branches', $data);
        	$this->session->set_flashdata('error', "<div class='alert alert-success'>Branch added successfully.</div>");
		}
		
        return redirect('superadmin/branches');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('branches');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Branch deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Branch not deleted successfully.</div>");

		return redirect('superadmin/branches');
	}

	public function edit($id)
	{
		$this->db->where('org_status', 'Active');
		$data['organizations'] = $this->db->get('organizations')->result();

		$this->db->where('id', $id);
		$data['row'] = $this->db->get('branches')->row();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/branch/edit-branch', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'org_id'			=> $this->input->post('org_id'),
			'branch_name'		=> trim(strtolower($this->input->post('branch_name'))),
			'branch_status'		=> $this->input->post('branch_status'),
			'updated_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('branches', $data);

		if($this->db->affected_rows() > 0)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Branch updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Branch not updated successfully.</div>");
		return redirect('superadmin/branches');
	}
}
