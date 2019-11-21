<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
	}

	public function index($category_id)
	{
		if($category_id == 1)
			$data['category_name'] = "Budget Projects";
		elseif($category_id == 2)
			$data['category_name'] = "Premium Projects";
		elseif($category_id == 3)
			$data['category_name'] = "Luxury Projects";

		$data['projects'] = $this->db->where('project_category_id', $category_id)
										->get('project_items')
										->result();

		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/project-details', $data);
		$this->load->view('front-end/includes/footer');
	}

	public function project_details($item_id)
	{
		$data['project_details'] = $this->db->select('project_images.*, project_items.cus_name, project_items.house_type, project_items.apart_name')
											->from('project_images')
											->join('project_items', 'project_items.id=project_images.project_item_id', 'inner')
											->where('project_images.project_item_id', $item_id)
											->get()
											->result();

		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/project-design', $data);
		$this->load->view('front-end/includes/footer');
	}

}
