<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('superadmin/login');
	}

	public function index()
	{
		$this->db->select('project_items.*, project_category.category_title');
		$this->db->from('project_items');
		$this->db->join('project_category', 'project_category.id = project_items.project_category_id');
		$this->db->order_by('project_items.created_datetime', 'DESC');
		$data['rows'] = $this->db->get()->result();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/project/all-projects', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add()
	{
		$data['categories'] = $this->db->get('project_category')->result();
		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/project/add-projects', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'project_category_id'	=> $this->input->post('project_category_id'),
			'cus_name'				=> $this->input->post('cus_name'),
			'house_type'			=> $this->input->post('house_type'),
			'apart_name'			=> $this->input->post('apart_name'),
			'photo_type'			=> $this->input->post('photo_type')[0],
			'created_datetime'	=> date('Y-m-d H:i:s')
		);
		
		static $project_item_id;
		if(!empty($_FILES['image']['name']) && !empty($this->input->post('photo_type')))
		{
			$filesCount = count($_FILES['image']['name']);
            for($i = 0; $i < $filesCount; $i++)
            {
            	$_FILES['file']['name']     	= $_FILES['image']['name'][$i];
                $_FILES['file']['type']     	= $_FILES['image']['type'][$i];
                $_FILES['file']['tmp_name'] 	= $_FILES['image']['tmp_name'][$i];
                $_FILES['file']['error']     	= $_FILES['image']['error'][$i];
                $_FILES['file']['size']     	= $_FILES['image']['size'][$i];

            	if($i == 0)
            	{
            		$this->db->insert('project_items', $data);
					$project_item_id = $this->db->insert_id();

					$config['upload_path']          = './projects-images/';
					$config['allowed_types']        = 'jpeg|jpg|png';
					$config['file_name']			= $project_item_id.'.jpg';
            	}
            	else
            	{
            		$data = array(
						'project_item_id'	=> $project_item_id,
						'photo_type'		=> $this->input->post('photo_type')[$i],
						'created_datetime'	=> date('Y-m-d H:i:s')
					);

					$this->db->insert('project_images', $data);
					$id = $this->db->insert_id();
					
					$config['upload_path']          = './projects-images/gallery/';
					$config['allowed_types']        = 'jpeg|jpg|png';
					$config['file_name']			= $id.'.jpg';
            	}
        

		        $this->upload->initialize($config);

		        if ( ! $this->upload->do_upload('file'))
		        {
		            $error = $this->upload->display_errors();
		            $this->session->set_flashdata('error', "<div class='alert alert-danger'>".$error."</div>");
		        }
		        else
		        {
		        	$this->session->set_flashdata('error', "<div class='alert alert-success'>Project added successfully.</div>");
		        }
            }
		}

        return redirect('superadmin/projects');
	}

	public function delete($id)
	{
		unlink(FCPATH.'projects-images/'.$id.'.jpg');
		$this->db->where('id', $id);
		$rs = $this->db->delete('project_items');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Project deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Project not deleted successfully.</div>");

		return redirect('superadmin/projects');
	}

	public function edit($id)
	{
		$data['categories'] = $this->db->get('project_category')->result();
		$this->db->where('id', $id);
		$data['data'] = $this->db->get('project_items')->row();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/project/edit-project', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'project_category_id'	=> $this->input->post('project_category_id'),
			'cus_name'				=> $this->input->post('cus_name'),
			'house_type'			=> $this->input->post('house_type'),
			'apart_name'			=> $this->input->post('apart_name'),
			'photo_type'			=> $this->input->post('photo_type'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path']          = './projects-images/';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['file_name']			= $id.'.jpg';
	        $config['overwrite']			= TRUE;

	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('image'))
	        {
	            $error = $this->upload->display_errors();
	            $this->session->set_flashdata('error', "<div class='alert alert-danger'>".$error."</div>");
	        }
		}

		$this->db->where('id', $id);
		$this->db->update('project_items', $data);

		if($this->db->affected_rows() > 0 && empty($error))
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Project updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Project not updated successfully.</div>");
		return redirect('superadmin/projects');
	}

// adding the gallery start
	public function add_images($id)
	{
		$data['id'] = $id;
		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/project/add-images', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add_image_submit($id)
	{
		$data = array(
			'project_item_id'	=> $id,
			'photo_type'		=> $this->input->post('photo_type'),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->select('COUNT(id) as total_images');
		$this->db->where('project_item_id', $id);
		$images_count = $this->db->get('project_images')->row();
		
		if($images_count->total_images > 15)
		{
			$this->session->set_flashdata('error', "<div class='alert alert-warning'>Only 15 images are allowed.</div>");
		}
		else
		{
			$this->db->insert('project_images', $data);
			$insert_id = $this->db->insert_id();

			$config['upload_path']          = './projects-images/gallery';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['file_name']			= $insert_id.'.jpg';

	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('image'))
	        {
	            $error = $this->upload->display_errors();
	            $this->session->set_flashdata('error', "<div class='alert alert-danger'>".$error."</div>");
	        }
	        else
	        {
	        	$this->session->set_flashdata('error', "<div class='alert alert-success'>Project images added successfully.</div>");
	        }
		}

        return redirect('superadmin/projects/all_images/'.$id);
	}

	public function all_images($id)
	{
		$data['project_item_id'] = $id;
		$this->db->where('project_item_id', $id);
		$data['images'] = $this->db->get('project_images')->result();
		
		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/project/all-images', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function delete_images($id)
	{
		unlink(FCPATH.'projects-images/gallery/'.$id.'.jpg');
		$this->db->where('id', $id);
		$rs = $this->db->delete('project_images');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Project images deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Project images not deleted successfully.</div>");

		return redirect('superadmin/projects');
	}

	public function edit_images($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('project_images')->row();
		
		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/project/edit-images', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function edit_image_submit($id)
	{
		$data = array(
			'photo_type'			=> $this->input->post('photo_type'),
			'updated_datetime'		=> date('Y-m-d H:i:s')
		);

		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path']          = './projects-images/gallery/';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['file_name']			= $id.'.jpg';
	        $config['overwrite']			= TRUE;

	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('image'))
	        {
	            $error = $this->upload->display_errors();
	            $this->session->set_flashdata('error', "<div class='alert alert-danger'>".$error."</div>");
	        }
		}

		$this->db->where('id', $id);
		$this->db->update('project_images', $data);

		if($this->db->affected_rows() > 0 && empty($error))
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Projects images are updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Projects images are not updated successfully.</div>");
		return redirect('superadmin/projects');
	}
}
