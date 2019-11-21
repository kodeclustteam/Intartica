<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends CI_Controller 
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
		$data['rows'] = $this->db->get('leaves')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/leave/all-leave', $data);
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
			$this->load->view('admin/leave/add-leave', $data);
			$this->load->view('admin/includes/footer');
		}
	}

	public function add_submit()
	{
		$data = array(
			'active_calender_year'			=> $this->input->post('active_calender_year'),
			'leave_type'					=> $this->input->post('leave_type'),
			'leave_limit'					=> $this->input->post('leave_limit'),
			'status'						=> $this->input->post('status'),
			'created_by'					=> $this->session->userdata('id'),
			'created_datetime'				=> date('Y-m-d H:i:s')
		);
		// checking for duplicate leave_type

		$this->db->where('leave_type', $data['leave_type']);
		$leave_type_row = $this->db->get('leaves')->num_rows();

		if($leave_type_row > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Leave type is already added.</div>");
		}
		else
		{
			$this->db->insert('leaves', $data);
			if($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Leave Type added successfully.</div>");
			}
			else
			{
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Leave Type not added successfully.</div>");
			}
		}

        return redirect('admin/leaves');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('leaves');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Leave deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Leave not deleted successfully.</div>");

		return redirect('admin/leaves');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('leaves')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/leave/edit-leave', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'active_calender_year'			=> $this->input->post('active_calender_year'),
			'leave_type'					=> $this->input->post('leave_type'),
			'leave_limit'					=> $this->input->post('leave_limit'),
			'status'						=> $this->input->post('status'),
			'updated_by'					=> $this->session->userdata('id'),
			'updated_datetime'				=> date('Y-m-d H:i:s')
		);

		// checking for duplicate leave_type

		$this->db->where(['id'=>$id, 'leave_type'=>$data['leave_type']]);
		$leave_type_row = $this->db->get('leaves')->num_rows();

		// checking for id!=$id and leave_type = $data['leave_type']
		$this->db->where(['id!='=>$id, 'leave_type'=>$data['leave_type']]);
		$other_row = $this->db->get('leaves')->num_rows();

		if($leave_type_row == 1 )
		{
			$this->update_table($id, $data);
		}
		else if($other_row > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Leave Type already added.</div>");
		}
		else
		{
			$this->update_table($id, $data);
		}

		return redirect('admin/leaves');
	}

	public function update_table($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('leaves', $data);

		if($this->db->affected_rows() > 0 )
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Leave Type updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Leave Type not updated successfully.</div>");
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
