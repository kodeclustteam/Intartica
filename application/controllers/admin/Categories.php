<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('admin/login');

		$roles_array = explode(',', $this->session->userdata('roles'));
		if(!in_array('invm', $roles_array))
			return redirect('admin/dashboard');
	}

	public function index()
	{
		$this->db->order_by('created_datetime', 'DESC');
		$data['rows'] = $this->db->get('categories')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/category/all-category', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/category/add-category');
		$this->load->view('admin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'cat_name'				=> trim(strtolower($this->input->post('cat_name'))),
			'cat_description'		=> $this->input->post('cat_description'),
			'status'				=> $this->input->post('status'),
			'created_by'			=> $this->session->userdata('id'),
			'created_datetime'		=> date('Y-m-d H:i:s')
		);
		// checking for duplicate cat_name

		$this->db->where('cat_name', $data['cat_name']);
		$cat_name_row = $this->db->get('categories')->num_rows();

		if($cat_name_row > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Category Name already added.</div>");
		}
		else
		{
			$this->db->insert('categories', $data);
			if($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Category added successfully.</div>");
			}
			else
			{
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Category not added successfully.</div>");
			}
		}

        return redirect('admin/categories');
	}

	public function delete($id)
	{
		$this->db->where('cat_id', $id);
		$cat_count = $this->db->get('sub_categories')->num_rows();

		if($cat_count > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Category is availaible in sub_categories table.</div>");
		}
		else
		{
			$this->db->where('id', $id);
			$rs = $this->db->delete('categories');
			if($rs)
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Category deleted successfully.</div>");
			else
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Category not deleted successfully.</div>");
		}

		return redirect('admin/categories');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('categories')->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/category/edit-category', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'cat_name'				=> trim(strtolower($this->input->post('cat_name'))),
			'cat_description'		=> $this->input->post('cat_description'),
			'status'				=> $this->input->post('status'),
			'updated_by'			=> $this->session->userdata('id'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		// checking for duplicate cat_name

		$this->db->where(['id'=>$id, 'cat_name'=>$data['cat_name']]);
		$cat_name_row = $this->db->get('categories')->num_rows();

		// checking for others cat_name

		$this->db->where(['id!='=>$id, 'cat_name'=>$data['cat_name']]);
		$other_cat_name = $this->db->get('categories')->num_rows();

		if($cat_name_row == 1 )
		{
			$this->updateTable($id, $data);
		}
		else if($other_cat_name > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Category Name already added.</div>");
		}
		else
		{
			$this->updateTable($id, $data);
		}

		return redirect('admin/categories');
	}

	public function updateTable($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('categories', $data);

		if($this->db->affected_rows() > 0 )
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Category updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Category not updated successfully.</div>");
	}

	public function view_subcategory($id)
	{
		$this->db->select('sub_categories.*, categories.cat_name');
		$this->db->from('sub_categories');
		$this->db->join('categories', 'categories.id=sub_categories.cat_id', 'inner');
		$this->db->where('categories.id', $id);
		$data['rows'] = $this->db->get()->result();
		$data['cat_id'] = $id;

		$this->load->view('admin/includes/header');
		$this->load->view('admin/category/view-subcategory', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add_subcategory($cat_id)
	{
		$data['cat_id'] = $cat_id;

		$this->load->view('admin/includes/header');
		$this->load->view('admin/category/add-subcategory', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add_subcatsubmit($cat_id)
	{
		$data = array(
			'cat_id'				=> $cat_id,
			'subcat_name'			=> trim(strtolower($this->input->post('subcat_name'))),
			'subcat_desc'			=> $this->input->post('subcat_desc'),
			'status'				=> $this->input->post('status'),
			'created_by'			=> $this->session->userdata('id'),
			'created_datetime'		=> date('Y-m-d H:i:s')
		);
		// checking for duplicate subcat_name

		$this->db->where('subcat_name', $data['subcat_name']);
		$cat_name_row = $this->db->get('sub_categories')->num_rows();

		if($cat_name_row > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Sub Category Name already added.</div>");
		}
		else
		{
			$this->db->insert('sub_categories', $data);
			if($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Sub Category added successfully.</div>");
			}
			else
			{
				$this->session->set_flashdata('error', "<div class='alert alert-danger'>Sub Category not added successfully.</div>");
			}
		}

		return redirect('admin/categories/view_subcategory/'.$cat_id);
	}

	public function delete_subcategory($id, $cat_id)
	{
		$this->db->where('id', $id);
		$rs = $this->db->delete('sub_categories');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Sub Category deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Sub Category not deleted successfully.</div>");

		return redirect('admin/categories/view_subcategory/'.$cat_id);
	}

	public function edit_subcategory($id, $cat_id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('sub_categories')->row();
		$data['cat_id'] = $cat_id;

		$this->load->view('admin/includes/header');
		$this->load->view('admin/category/edit-subcategory', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_subcatsubmit($id, $cat_id)
	{
		$data = array(
			'subcat_name'			=> trim(strtolower($this->input->post('subcat_name'))),
			'subcat_desc'			=> $this->input->post('subcat_desc'),
			'status'				=> $this->input->post('status'),
			'updated_by'			=> $this->session->userdata('id'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		// checking for duplicate subcat_name

		$this->db->where(['id'=>$id, 'subcat_name'=>$data['subcat_name']]);
		$subcat_name_row = $this->db->get('sub_categories')->num_rows();

		// checking for others subcat_name

		$this->db->where(['id!='=>$id, 'subcat_name'=>$data['subcat_name']]);
		$other_subcat_name = $this->db->get('sub_categories')->num_rows();

		if($subcat_name_row == 1 )
		{
			$this->updateSubCatTable($id, $data);
		}
		else if($other_subcat_name > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Sub Category Name already added.</div>");
		}
		else
		{
			$this->updateSubCatTable($id, $data);
		}

		return redirect('admin/categories/view_subcategory/'.$cat_id);
	}

	public function updateSubCatTable($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('sub_categories', $data);

		if($this->db->affected_rows() > 0 )
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Sub Category updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Sub Category not updated successfully.</div>");
	}

	public function import()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/category/import-category');
		$this->load->view('admin/includes/footer');
	}

	public function import_submit()
	{
		$this->load->library('excel');

		$categories = $this->db->get('categories')->result();
		$duplicate_cat = '';

		foreach($categories as $cat)
		{
			$cat_names[] = $cat->cat_name;
		}

		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);

			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=2; $row<=$highestRow; $row++)
				{
					$cat_name = trim(strtolower($worksheet->getCellByColumnAndRow(0, $row)->getValue()));

					$cat_description = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

					$status = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					
					// checking for duplicate cat_name
					if(in_array($cat_name, $cat_names))
					{
						$duplicate_cat .= $cat_name.',';
						$this->session->set_flashdata('cat_error', "<div class='alert alert-danger'>Thease Category(s) are already added : ".$duplicate_cat.".</div>");
					}
					else
					{
						$data[] = array(
							'cat_name'				=>	$cat_name,
							'cat_description'		=>	$cat_description,
							'status'				=>	$status,
							'created_datetime'		=>	date('Y-m-d H:i:s'),
							'created_by'			=>	$this->session->userdata('id')
						);
					}
				}
			}
			if(!empty($data))
			{
				$this->db->insert_batch('categories', $data);
				
				if($this->db->affected_rows() > 0 )
				$this->session->set_flashdata('error', "<div class='alert alert-success'>Category added successfully.</div>");
			}
		}
		return redirect('admin/categories');
	}
}
