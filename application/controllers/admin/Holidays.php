<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holidays extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('admin/login');

		$roles_array = explode(',', $this->session->userdata('roles'));
		if(!in_array('hrms', $roles_array))
			return redirect('admin/dashboard');
	}

	public function index()
	{
		$this->db->order_by('created_datetime', 'DESC');
		$data['rows'] = $this->db->get('holidays')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/holiday/all-holiday', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{
		$data['calender'] = $this->db->get_where('calender', ['status'=> 'Active'])->row();

		// checking active calender year
		if(empty($data['calender']))
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>There is no active calender year set. Please Contact System Administrator.</div>");
			return redirect('admin/leaves');
		}
		else
		{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/holiday/add-holiday', $data);
			$this->load->view('admin/includes/footer');
		}
	}

	public function add_submit()
	{
		$data = array(
			'holiday_name'			=> $this->input->post('holiday_name'),
			'holiday_date'			=> $this->input->post('holiday_date'),
			'calender_year'			=> $this->input->post('calender_year'),
			'status'				=> $this->input->post('status'),
			'created_by'			=> $this->session->userdata('id'),
			'created_datetime'		=> date('Y-m-d H:i:s')
		);
		
		$this->db->insert('holidays', $data);
		if($this->db->affected_rows() > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Holiday added successfully.</div>");
		}
		else
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Holiday not added successfully.</div>");
		}

        return redirect('admin/holidays');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('holidays');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Holiday deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Holiday not deleted successfully.</div>");

		return redirect('admin/holidays');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('holidays')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/holiday/edit-holiday', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'holiday_name'			=> $this->input->post('holiday_name'),
			'holiday_date'			=> $this->input->post('holiday_date'),
			'calender_year'			=> $this->input->post('calender_year'),
			'status'				=> $this->input->post('status'),
			'updated_by'			=> $this->session->userdata('id'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('holidays', $data);

		if($this->db->affected_rows() > 0 )
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Holiday updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Holiday not updated successfully.</div>");

		return redirect('admin/holidays');
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
