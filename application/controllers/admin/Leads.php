<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('id'))
			return redirect('admin/login');

		$roles_array = explode(',', $this->session->userdata('roles'));
		if(!in_array('crm', $roles_array))
			return redirect('admin/dashboard');
	}

	public function index()
	{
		// get all quotes or leads from quote_leads table
		$this->db->select('quote_leads.*, CONCAT(fname," ",lname) as assigned_to');
		$this->db->from('quote_leads');
		$this->db->join('employees', 'employees.id=quote_leads.emp_id_with_crm_dept','left');
		$this->db->order_by('quote_leads.created_datetime', 'DESC');
		$data['rows'] = $this->db->get()->result();


		$this->load->view('admin/includes/header');
		$this->load->view('admin/lead/all-lead', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{
		$data['employees'] = $this->db->select('*')->from('employees')
					        ->group_start()
					                        ->like('dept_id','1','both')
					                        ->or_like('dept_id','1','after')
					                        ->or_like('dept_id','1','before')
					        ->group_end()
					        ->where(['emp_status'=>'Active'])
							->get()->result();

		$data['employees_with_project'] = $this->db->select('*')->from('employees')
									        ->group_start()
									                        ->like('dept_id','2','both')
									                        ->or_like('dept_id','2','after')
									                        ->or_like('dept_id','2','before')
									        ->group_end()
									        ->where(['emp_status'=>'Active'])
											->get()->result();

		$data['house_types'] 		= $this->db->get('house_types')->result();
		$data['project_budgets'] 	= $this->db->get('project_budgets')->result();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/lead/add-lead', $data);
		$this->load->view('admin/includes/footer');
	}

	public function handle_status()
	{
		$status = $this->input->post('status');
		$data = [];

		if($status == 'new')
		{
			$data['status'] 		= "<option value='new' selected>New</option>";
			$data['instruction'] 	= "Dear CRM Admin : Please add CSR to follow up with customer";
			$data['buttons']		= '<button class="btn btn-success btn-sm changeStatus" data-status="pending_csr" type="button">Pending CSR</button><button class="btn btn-danger btn-sm changeStatus" data-status="disqualified_closed" type="button">Disqualified - Closed</button>';
		}
		else if($status == 'pending_csr')
		{
			$data['status'] 		= "<option value='pending_csr' selected>Pending CSR</option>";
			$data['instruction'] 	= "Dear CSR : Please talk to customer. Get floor plans and interior requirements";
			$data['buttons']		= '<button class="btn btn-success btn-sm changeStatus" data-status="needs_quotation" type="button">Needs Quotation</button><button class="btn btn-danger btn-sm changeStatus" data-status="disqualified_closed" type="button">Disqualified - Closed</button>';
		}
		else if($status == 'needs_quotation')
		{
			$data['status'] 		= "<option value='needs_quotation' selected>Needs Quotation</option>";
			$data['instruction'] 	= "Dear CSR Admin : Please add Project Manager to prepare quotation";
			$data['buttons']		= '<button class="btn btn-success btn-sm changeStatus" data-status="pending_pm" type="button">Pending PM</button><button class="btn btn-danger btn-sm changeStatus" data-status="disqualified_closed" type="button">Disqualified - Closed</button>';
		}
		else if($status == 'pending_pm')
		{
			$data['status'] 		= "<option value='pending_pm' selected>Pending PM</option>";
			$data['instruction'] 	= "Dear PM : Please talk to customer. Get his views and convert the project";
			$data['buttons']		= '<button class="btn btn-success btn-sm changeStatus" data-status="new_project" type="button">New Project</button><button class="btn btn-danger btn-sm changeStatus" data-status="disqualified_closed" type="button">Disqualified - Closed</button>';
		}
		else if($status == 'disqualified_closed')
		{
			$data['status'] 		= "<option value='disqualified_closed' selected>Disqualified Closed</option>";
			$data['instruction'] 	= "No action. Better luck next time";
			$data['buttons']		= 'no';
		}
		else
		{
			$data['status'] 		= "<option value='new_project' selected>New Project</option>";
			$data['instruction'] 	= "Dear CRM : Please create project";
			$data['buttons']		= '<button class="btn btn-success btn-sm changeStatus" data-status="new_project" type="button">New Project</button><button class="btn btn-danger btn-sm changeStatus" data-status="disqualified_closed" type="button">Disqualified - Closed</button>';
		}

		echo json_encode($data);
	}

	public function fetch_furnished_items()
	{
		$house_type_id 		= $this->input->post('house_type_id');

		$this->db->where('house_type_id', $house_type_id);
		$items = $this->db->get('furnished_items');

		if($this->input->post('item_id') != '')
		{
			$item_id = $this->input->post('item_id');
			$string = $this->db->get_where('quote_leads', ['id'=>$item_id])->row();
			$arrays = explode(',', $string->all_items);
		}
		else
		{
			$arrays = [];
		}

		if($items->num_rows() > 0 )
		{
			$output = '';
			$output .= '<div class="row">';
			foreach($items->result() as $item)
			{
				$output .= '<div class="col-sm-3">';
				$output .= '<br><label style="color:red;">'.$item->item_group.'</label><br>';

				$item_names = explode(',', $item->item_name);
				foreach($item_names as $single)
				{
					if(in_array(first_char_of_every_word($item->item_group).'_'.replace_space_with_underscore($single), $arrays))
					{
						$x = 'checked';
					}
					else
					{
						$x = '';
					}

					$output .= '<input type="checkbox" value="'.first_char_of_every_word($item->item_group).'_'.replace_space_with_underscore($single).'" name="all_items[]" '.$x.' /> '.$single.'<br>';
				}
				$output .= '</div>';
			}
			$output .= '</div>';

			echo $output;
		}
		else
		{
			echo '<p class="alert alert-danger">Sorry! Item not Found. Select Other combination.</p>';
		}
	}

	public function add_submit()
	{
		if(empty($this->input->post('all_items')))
		{
			echo "<script>
				alert('Please select atleast one item.');
				window.location.href='".base_url('admin/leads')."';
			</script>";
			exit;
		}
		else
		{
				$data = array(
				'source'					=> $this->input->post('source'),
				'full_name'					=> $this->input->post('full_name'),
				'address'					=> $this->input->post('address'),
				'city'						=> $this->input->post('city'),
				'email'						=> $this->input->post('email'),
				'mobile'					=> $this->input->post('mobile'),
				'status'					=> $this->input->post('status'),
				'emp_id_with_crm_dept'		=> $this->input->post('emp_id_with_crm_dept'),
				'emp_id_with_project_dept'	=> $this->input->post('emp_id_with_project_dept'),
				'house_type_id'				=> $this->input->post('bhk_select'),
				'budget_id'					=> $this->input->post('budget'),
				'addl_desc'					=> $this->input->post('addl_desc'),
				'complete_date'				=> $this->input->post('complete_date'),
				'all_items'					=> implode(',', $this->input->post('all_items')),
				'created_datetime'			=> date('Y-m-d H:i:s'),
				'created_by'				=> $this->session->userdata('id')
			);
		}

		$this->db->insert('quote_leads', $data);
		$insertid = $this->db->insert_id();

		if(!empty($_FILES['quotes_image']['name']))
		{
			$config['upload_path']          = './quotes_images/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']             = $insertid.'.jpg';

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('quotes_image'))
            {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', "<div class='alert alert-danger'>".$error."</div>");
            }
            else
            {
            	$this->session->set_flashdata('error', "<div class='alert alert-success'>New Leads added successfully.</div>");
            }
		}

        return redirect('admin/leads');
	}

	public function delete($id)
	{
		if(FCPATH.'quotes_images/'.$id.'.jpg' != '')
			unlink(FCPATH.'quotes_images/'.$id.'.jpg');

		$this->db->where('id', $id);
		$rs = $this->db->delete('quote_leads');
		if($rs)
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Leads deleted successfully.</div>");
		else
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Leads not deleted successfully.</div>");

		return redirect('admin/leads');
	}

	public function edit($id)
	{
		$data['employees'] = $this->db->select('*')->from('employees')
					        ->group_start()
					                        ->like('dept_id','1','both')
					                        ->or_like('dept_id','1','after')
					                        ->or_like('dept_id','1','before')
					        ->group_end()
					        ->where(['emp_status'=>'Active'])
							->get()->result();

		$data['employees_with_project'] = $this->db->select('*')->from('employees')
									        ->group_start()
									                        ->like('dept_id','2','both')
									                        ->or_like('dept_id','2','after')
									                        ->or_like('dept_id','2','before')
									        ->group_end()
									        ->where(['emp_status'=>'Active'])
											->get()->result();

		$data['house_types'] 		= $this->db->get('house_types')->result();
		$data['project_budgets'] 	= $this->db->get('project_budgets')->result();
		$data['row'] 				= $this->db->get_where('quote_leads', ['id'=>$id])->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/lead/edit-lead', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_submit($id)
	{
		if(empty($this->input->post('all_items')))
		{
			echo "<script>
				alert('Please select atleast one item.');
				window.location.href='".base_url('admin/leads')."';
			</script>";
			die;
		}
		else
		{
				$data = array(
				'source'					=> $this->input->post('source'),
				'full_name'					=> $this->input->post('full_name'),
				'address'					=> $this->input->post('address'),
				'city'						=> $this->input->post('city'),
				'email'						=> $this->input->post('email'),
				'mobile'					=> $this->input->post('mobile'),
				'status'					=> $this->input->post('status'),
				'emp_id_with_crm_dept'		=> $this->input->post('emp_id_with_crm_dept'),
				'emp_id_with_project_dept'	=> $this->input->post('emp_id_with_project_dept'),
				'house_type_id'				=> $this->input->post('bhk_select'),
				'budget_id'					=> $this->input->post('budget'),
				'addl_desc'					=> $this->input->post('addl_desc'),
				'complete_date'				=> $this->input->post('complete_date'),
				'all_items'					=> implode(',', $this->input->post('all_items')),
				'updated_datetime'			=> date('Y-m-d H:i:s'),
				'updated_by'				=> $this->session->userdata('id')
			);
		}

		if(!empty($_FILES['quotes_image']['name']))
		{
			$config['upload_path']          = './quotes_images/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']            = $id.'.jpg';
            $config['overwrite']            = TRUE;

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('quotes_image'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "<div class='alert alert-danger'>".$error."</div>");
            }
		}

		$this->db->where('id', $id);
		$this->db->update('quote_leads',$data);

		if($this->db->affected_rows() > 0 && empty($error))
		{
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Leads updated successfully.</div>");
		}
		else
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Leads updated but may be floor plan not uploaded successfully.</div>");
		}
		return redirect('admin/leads');
	}

	public function view($id)
	{
		$data['employees'] 			= $this->db->get_where('employees', ['emp_status'=>'Active'])->result();
		$data['house_types'] 		= $this->db->get('house_types')->result();
		$data['project_budgets'] 	= $this->db->get('project_budgets')->result();
		$data['row'] 				= $this->db->get_where('quote_leads', ['id'=>$id])->row();

		$this->load->view('admin/includes/header');
		$this->load->view('admin/lead/view-lead', $data);
		$this->load->view('admin/includes/footer');
	}
}
