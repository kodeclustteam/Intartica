<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calender extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('admin/login');

		$roles_array = explode(',', $this->session->userdata('roles'));
		if(!in_array('finm', $roles_array))
			return redirect('admin/dashboard');
	}

	public function index()
	{
		$this->db->order_by('created_datetime', 'DESC');
		$data['rows'] = $this->db->get('calender')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/calender/all-calender', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/calender/add-calender');
		$this->load->view('admin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'calender_year'			=> $this->input->post('calender_year'),
			'status'				=> $this->input->post('status'),
			'created_by'			=> $this->session->userdata('id'),
			'created_datetime'		=> date('Y-m-d H:i:s')
		);
		// checking for duplicate calender_year

		$this->db->where('calender_year', $data['calender_year']);
		$calender_year_row = $this->db->get('calender')->num_rows();

		// checking for active calender_year
		if($data['status'] == 'Active')
		{
			$this->db->where(['status'=>'Active']);
			$calender_year_active = $this->db->get('calender')->num_rows();
		}
		else
		{
			$calender_year_active = 0;
		}

		if($calender_year_row > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Calender year already added.</div>");
		}
		else if($calender_year_active > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>You can not have multiple active Calender Year.</div>");
		}
		else
		{
			$this->db->insert('calender', $data);
			if($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Calender Year added successfully.</div>");
			}
			else
			{
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Calender Year not added successfully.</div>");
			}
		}

        return redirect('admin/calender');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('calender');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Calender Year deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Calender Year not deleted successfully.</div>");

		return redirect('admin/calender');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('calender')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/calender/edit-calender', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'calender_year'			=> $this->input->post('calender_year'),
			'status'				=> $this->input->post('status'),
			'updated_by'			=> $this->session->userdata('id'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		// checking for duplicate calender_year

		$this->db->where('calender_year', $data['calender_year']);
		$calender_year_row = $this->db->get('calender')->num_rows();

		// checking for active calender_year

		$this->db->where(['status'=>'Active']);
		$calender_year_active = $this->db->get('calender')->num_rows();

		if($calender_year_row > 1 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Calender year already added.</div>");
		}
		else if($calender_year_active > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>You can not have multiple active Calender Year.</div>");
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->update('calender', $data);

			if($this->db->affected_rows() > 0 )
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Calender Year updated successfully.</div>");
			else
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Calender Year not updated successfully.</div>");
		}

		return redirect('admin/calender');
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
