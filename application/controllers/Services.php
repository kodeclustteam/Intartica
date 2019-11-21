<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
	}

	public function index()
	{
		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/services');
		$this->load->view('front-end/includes/footer');
	}

}
