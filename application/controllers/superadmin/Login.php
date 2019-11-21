<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
	}

	public function index()
	{
		if($this->session->has_userdata('id'))
			return redirect('superadmin/dashboard');

		$this->load->view('superadmin/login');
	}

	public function validate_admin()
	{
		$username = $this->input->post('email');
		$password = $this->input->post('password');

		$this->db->where(['email'=>$username, 'password'=>$password]);
		$row = $this->db->get('superadmin');

		if($row->num_rows() == 1)
		{
			$result = $row->row();
			
			if($result->super_admin_status == 'Active')
			{
				$sessData = array(
					'id'		=> $result->id,
					'email'		=> $result->email,
					'name'		=> $result->name,
				);

				$this->session->set_userdata($sessData);
				return redirect('superadmin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('error',"<div class='alert alert-danger'>Your account is <strong><i>In-active</i></strong>. Please contact admin @ <strong><i>info@kodeclust.com</i></strong></div>");
				return redirect('superadmin/login');
			}
		}
		else
		{
			$this->session->set_flashdata('error',"<div class='alert alert-danger'>Email or Password may be incorrect.</div>");
			return redirect('superadmin/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata($sessData);
		$this->session->sess_destroy();
		return redirect('superadmin/login');
	}
}