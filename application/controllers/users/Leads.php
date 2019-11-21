<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
		if(! $this->session->has_userdata('uid'))
			return redirect('users/login');

		if($this->session->userdata('user_type') != 'employee' )
			return redirect('users/dashboard');
	}

	public function index()
	{
		// get all quotes or leads from quote_leads table
		$data['rows'] = $this->db->select('quote_leads.*, CONCAT(fname," ",lname) as assigned_to')
									->from('quote_leads')
									->join('employees', 'employees.id=quote_leads.emp_id_with_crm_dept','left')
										->group_start()
											->where('quote_leads.status', 'pending_pm')
											->or_where('quote_leads.status', 'pending_csr')
										->group_end()
									->where('quote_leads.emp_id_with_crm_dept', $this->session->userdata('uid'))
									->order_by('quote_leads.created_datetime', 'DESC')
									->get()->result();
		// echo $this->db->last_query();die;
		// echo "<pre>";
		// print_r($data);die;
		$this->load->view('users/includes/header');
		$this->load->view('users/lead/assinged-leads', $data);
		$this->load->view('users/includes/footer');
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

	public function view($id)
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

									$this->db->where('emp_id_with_crm_dept', $this->session->userdata('uid'));
									$this->db->where('id', $id);
		$data['row'] 				= $this->db->get('quote_leads')->row();

		$this->load->view('users/includes/header');
		$this->load->view('users/lead/view-leads', $data);
		$this->load->view('users/includes/footer');
	}

	public function handle_status()
	{
		$status = $this->input->post('status');
		$data = [];

		if($status == 'pending_csr')
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

	public function edit_submit($lead_id)
	{
		$data['status'] = $this->input->post('status');
		
		$this->db->where('id', $lead_id);
		$this->db->update('quote_leads', $data);

		if($this->db->affected_rows() > 0 )
		{
			$this->session->set_flashdata('error', "<div class='alert alert-success'>Lead status updated successfully.</div>");
		}
		else
		{
			$this->session->set_flashdata('error', "<div class='alert alert-danger'>Lead status not updated successfully.</div>");
		}
		return redirect('users/leads');

	}
}