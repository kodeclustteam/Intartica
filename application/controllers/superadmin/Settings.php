<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller 
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
		$this->db->order_by('created_datetime', 'DESC');
		$data['rows'] = $this->db->get('settings')->result();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/setting/all_settings', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function add_submit()
	{
		$data = array(
			'phone'				=> $this->input->post('phone'),
			'email'				=> $this->input->post('email'),
			'map'				=> $this->input->post('map'),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('settings', $data);
		$id = $this->db->insert_id();

		$config['upload_path']          = './settings/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']			= $id.'.jpg';

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', "<div class='alert alert-danger'>".$error."</div>");
        }
        else
        {
        	$this->session->set_flashdata('error', "<div class='alert alert-success'>Setting added successfully.</div>");
        }
        return redirect('superadmin/settings');
	}

	public function delete($id)
	{
		unlink(FCPATH.'settings/'.$id.'.jpg');
		$this->db->where('id', $id);
		$rs = $this->db->delete('settings');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Setting deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Setting not deleted successfully.</div>");

		return redirect('superadmin/settings');
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['row'] = $this->db->get('settings')->row();

		$this->load->view('superadmin/includes/header');
		$this->load->view('superadmin/setting/edit_settings', $data);
		$this->load->view('superadmin/includes/footer');
	}

	public function edit_submit($id)
	{
		$data = array(
			'phone'				=> $this->input->post('phone'),
			'email'				=> $this->input->post('email'),
			'map'				=> $this->input->post('map'),
			'updated_datetime'	=> date('Y-m-d H:i:s')
		);

		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path']          = './settings/';
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
		$this->db->update('settings', $data);

		if($this->db->affected_rows() > 0 && empty($error))
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Setting updated successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Setting not updated successfully.</div>");
		return redirect('superadmin/settings');
	}
}