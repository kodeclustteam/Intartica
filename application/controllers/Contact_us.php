<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
	}

	public function index()
	{
		$data['setting'] = $this->db->get('settings')->row();
		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/contact-us', $data);
		$this->load->view('front-end/includes/footer');
	}

	public function contact_submit()
	{
		$data = array(
			'name'				=> $this->input->post('name'),
			'email'				=> $this->input->post('email'),
			'phone'				=> $this->input->post('phone'),
			'message'			=> $this->input->post('message'),
			'ip_address'		=> $this->input->ip_address(),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('contact_queries', $data);

		if($this->db->affected_rows() > 0 )
		{
			$message = '';
			$message .= '<b>Contact Submission:-</b>';
			$message .= '<br><b>Details are beow:-</b>';
			$message .= '<br>Name : '.$this->input->post('name');
			$message .= '<br>Email : '.$this->input->post('email');
			$message .= '<br>Phone : '.$this->input->post('phone');
			$message .= '<br>Message : '.$this->input->post('message');
			$message .= '<br>IP : '.$this->input->ip_address();


			$this->email->from('info@intartica.com', 'INTARTICA.COM');
			$this->email->to('sadaqatali890@gmail.com');
			$this->email->subject('Contact Query');
			$this->email->message($message);
			$this->email->set_mailtype('html');

			if($this->email->send())
			{
				$this->session->set_flashdata('error',"<div class='alert alert-success'>Thanks! we will contact you soon.</div>");
			}
			else
			{
				$this->session->set_flashdata('error',"<div class='alert alert-danger'>Sorry! some problem occurs.</div>");
			}
		}
		else
		{
			$this->session->set_flashdata('error',"<div class='alert alert-danger'>Sorry! data is not submitted.</div>");
		}

		return redirect('contact-us');
	}

	public function newsletter()
	{
		$data = array(
			'email'				=> $this->input->post('EMAIL'),
			'ip_address'		=> $this->input->ip_address(),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('newsletter', $data);

		if($this->db->affected_rows() > 0 )
		{
			$message = '';
			$message .= '<b>Subscription Request:-</b>';
			$message .= '<br><b>Details are beow:-</b>';
			$message .= '<br>Email : '.$this->input->post('EMAIL');
			$message .= '<br>IP : '.$this->input->ip_address();


			$this->email->from('info@intartica.com', 'INTARTICA.COM');
			$this->email->to('sadaqatali890@gmail.com');
			$this->email->subject('Subscription Request');
			$this->email->message($message);
			$this->email->set_mailtype('html');

			if($this->email->send())
			{
				$this->session->set_flashdata('error',"<div class='alert alert-success'>Thanks! for your subscription.</div>");
			}
			else
			{
				$this->session->set_flashdata('error',"<div class='alert alert-danger'>Sorry! some problem occurs.</div>");
			}
		}
		else
		{
			$this->session->set_flashdata('error',"<div class='alert alert-danger'>Sorry! data is not submitted.</div>");
		}

		return redirect('contact-us');
	}

}
