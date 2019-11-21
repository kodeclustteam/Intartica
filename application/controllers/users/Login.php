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
			return redirect('users/dashboard');

		$this->load->view('users/login');
	}

	public function validate_user()
	{
		$username 	= $this->input->post('email');
		$password 	= $this->input->post('password');
		$user_type 	= $this->input->post('user_type');

		// check the user type
		if($user_type == "employee")
		{
			$this->db->where(['email'=>$username, 'password'=>$password]);
			$row = $this->db->get('employees');
		}
		else if($user_type == "customer")
		{
			$this->db->where(['email'=>$username, 'password'=>$password]);
			$row = $this->db->get('customers');
		}
		else if($user_type == "vendor")
		{
			$this->db->where(['email'=>$username, 'password'=>$password]);
			$row = $this->db->get('vendors');
		}
		else
		{
			return redirect('users/login');
		}

		if($row->num_rows() == 1)
		{
			$result = $row->row();
			
			if($user_type == "customer")
			{
				if($result->customer_status == 'Active')
				{
					$sessData['profession'] = $result->profession;
				}
				else
				{
					$error = "<div class='alert alert-danger'>Customer:Your account is <strong><i>In-active</i></strong>. Please contact admin @ <strong><i>info@kodeclust.com</i></strong></div>";
				}
			}
			else if($user_type == "employee")
			{
				if($result->emp_status == 'Active')
				{
					$sessData['dept_id'] = $result->dept_id;
				}
				else
				{
					$error = "<div class='alert alert-danger'>Employee:Your account is <strong><i>In-active</i></strong>. Please contact admin @ <strong><i>info@kodeclust.com</i></strong></div>";
				}
			}
			else if($user_type == "vendor")
			{
				if($result->vendor_status == 'Active')
				{
					$sessData['gstin_tin_number'] = $result->gstin_tin_number;
				}
				else
				{
					$error = "<div class='alert alert-danger'>Vendor:Your account is <strong><i>In-active</i></strong>. Please contact admin @ <strong><i>info@kodeclust.com</i></strong></div>";
				}
			}
				$sessData['uid'] 		= $result->id;
				$sessData['email']		= $result->email;
				$sessData['fname']		= $result->fname;
				$sessData['lname']		= $result->lname;
				$sessData['user_type']	= $user_type;

			if(empty($error))
			{
				$this->session->set_userdata($sessData);
				return redirect('users/dashboard');
			}
			else
			{
				$this->session->set_flashdata('error', $error);
				return redirect('users/login');
			}
		}
		else
		{
			$this->session->set_flashdata('error',"<div class='alert alert-danger'>Email or Password may be incorrect.</div>");
			return redirect('users/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata($sessData);
		$this->session->sess_destroy();
		return redirect('users/login');
	}
}