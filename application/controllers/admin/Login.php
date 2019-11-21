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
			return redirect('admin/dashboard');

		$this->load->view('admin/login');
	}

	public function validate_admin()
	{
		$username = $this->input->post('email');
		$password = $this->input->post('password');

		$this->db->where(['email'=>$username, 'password'=>$password]);
		$row = $this->db->get('admins');

		if($row->num_rows() == 1)
		{
			$result = $row->row();
			
			if($result->admin_status == 'Active')
			{
				$sessData = array(
					'id'		=> $result->id,
					'email'		=> $result->email,
					'fname'		=> $result->fname,
					'lname'		=> $result->lname,
					'roles'		=> $result->roles
				);

				$this->session->set_userdata($sessData);
				return redirect('admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('error',"<div class='alert alert-danger'>Your account is <strong><i>In-active</i></strong>. Please contact admin @ <strong><i>info@kodeclust.com</i></strong></div>");
				return redirect('admin/login');
			}
		}
		else
		{
			$this->session->set_flashdata('error',"<div class='alert alert-danger'>Email or Password may be incorrect.</div>");
			return redirect('admin/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata($sessData);
		$this->session->sess_destroy();
		return redirect('admin/login');
	}

	public function differenttab()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/blank-page');
		$this->load->view('admin/includes/footer');
	}
}