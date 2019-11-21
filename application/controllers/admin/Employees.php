<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller 
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
		$data['rows'] = $this->db->get('employees')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/employee/all-employee', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{	
		$this->db->where('org_status', 'Active');
		$data['organizations'] 	= $this->db->get('organizations')->result();

		$data['departments'] 	= $this->db->get('departments')->result();

		$this->db->where('branch_status', 'Active');
		$data['branches'] 		= $this->db->get('branches')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/employee/add-employee', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'org_id'				=> $this->input->post('org_id'),
			'branch_id'				=> $this->input->post('branch_id'),
			'dept_id'				=> implode(',', $this->input->post('dept_id')),
			'fname'					=> $this->input->post('fname'),
			'lname'					=> $this->input->post('lname'),
			'dob'					=> $this->input->post('dob'),
			'pan_number'			=> $this->input->post('pan_number'),
			'adhaar_number'			=> $this->input->post('adhaar_number'),
			'primary_mobile'		=> $this->input->post('primary_mobile'),
			'alternate_mobile'		=> $this->input->post('alternate_mobile'),
			'email'					=> $this->input->post('email'),
			'password'				=> $this->input->post('password'),
			'salary_structure'		=> $this->input->post('salary_structure'),
			'proof_type'			=> $this->input->post('proof_type'),
			'address'				=> $this->input->post('address'),
			'emp_id'				=> 'EMP'.mt_rand(100,999),
			'created_by'			=> $this->session->userdata('id'),
			'created_datetime'		=> date('Y-m-d H:i:s')
		);
		
		$this->db->where('email', $data['email']);
		$num_rows = $this->db->get('employees')->num_rows();

		if($num_rows > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-warning'>Email already exists. Please use another one.</div>");
		}
		else
		{
			$this->db->insert('employees', $data);
			$insert_id = $this->db->insert_id();

			$config['upload_path']          = './admin_uploads/employees_proof/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']			= $insert_id.'.jpg';

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('proof_type_image'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "<div class='alert alert-danger'>Proof image error: ".$error."</div>");
            }

            $config['upload_path']          = './admin_uploads/employees_profiles/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']			= $insert_id.'.jpg';

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('profile_pic'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "<div class='alert alert-danger'>Employee profile picture error: ".$error."</div>");
            }
            else
            {
            	$this->session->set_flashdata('error', "<div class='alert alert-success'>Employee added successfully.</div>");
            }
		}

        return redirect('admin/employees');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('employees');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Employee deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Employee not deleted successfully.</div>");

		return redirect('admin/employees');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('employees')->row();

		$this->db->where('org_status', 'Active');
		$data['organizations'] 	= $this->db->get('organizations')->result();

		$data['departments'] 	= $this->db->get('departments')->result();

		$this->db->where('branch_status', 'Active');
		$data['branches'] 		= $this->db->get('branches')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/employee/edit-employee', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'org_id'				=> $this->input->post('org_id'),
			'branch_id'				=> $this->input->post('branch_id'),
			'dept_id'				=> implode(',', $this->input->post('dept_id')),
			'fname'					=> $this->input->post('fname'),
			'lname'					=> $this->input->post('lname'),
			'dob'					=> $this->input->post('dob'),
			'pan_number'			=> $this->input->post('pan_number'),
			'adhaar_number'			=> $this->input->post('adhaar_number'),
			'primary_mobile'		=> $this->input->post('primary_mobile'),
			'alternate_mobile'		=> $this->input->post('alternate_mobile'),
			'email'					=> $this->input->post('email'),
			'password'				=> $this->input->post('password'),
			'salary_structure'		=> $this->input->post('salary_structure'),
			'proof_type'			=> $this->input->post('proof_type'),
			'address'				=> $this->input->post('address'),
			// 'emp_id'				=> 'EMP'.mt_rand(100,999),
			'emp_status'			=> $this->input->post('emp_status'),
			'updated_by'			=> $this->session->userdata('id'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		if(!empty($_FILES['proof_type_image']['name']))
		{
			$config['upload_path']          = './admin_uploads/employees_proof/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']			= $id.'.jpg';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('proof_type_image'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "<div class='alert alert-danger'>Proof image error: ".$error."</div>");
            }	
		}
		if(!empty($_FILES['profile_pic']['name']))
		{
			$config['upload_path']          = './admin_uploads/employees_profiles/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']			= $id.'.jpg';
            $config['overwrite']			= TRUE;

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('profile_pic'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "<div class='alert alert-danger'>Employee profile picture error: ".$error."</div>");
            }
		}

		$this->db->where('id', $id);
		$this->db->update('employees', $data);

		if($this->db->affected_rows() > 0 )
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Employee updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Employee not updated successfully.</div>");

		return redirect('admin/employees');
	}

	public function view($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('employees')->row();

		$this->db->where('org_status', 'Active');
		$data['organizations'] 	= $this->db->get('organizations')->result();

		$data['departments'] 	= $this->db->get('departments')->result();

		$this->db->where('branch_status', 'Active');
		$data['branches'] 		= $this->db->get('branches')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/employee/view-employee', $data);
		$this->load->view('admin/includes/footer');
	}
}
