<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/kolkata');
	}

	public function index()
	{
		$data['house_types'] 		= $this->db->get('house_types')->result();
		$data['project_budgets'] 	= $this->db->get('project_budgets')->result();

		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/quotes', $data);
		$this->load->view('front-end/includes/footer');
	}

	public function fetch_items()
	{
		$house_type 		= $this->input->post('house_type');

		$this->db->where('house_type_id', $house_type);
		$items = $this->db->get('furnished_items');

		if($items->num_rows() > 0 )
		{
			$output = '';
			foreach($items->result() as $item)
			{
				$output .= '<br><label>'.$item->item_group.'</label><br>';

				$item_names = explode(',', $item->item_name);
				foreach($item_names as $single)
				{
					$output .= '<input type="checkbox" value="'.first_char_of_every_word($item->item_group).'_'.replace_space_with_underscore($single).'" name="all_items[]" /> '.$single.'<br>';
				}
			}

			echo $output;
		}
		else
		{
			echo '<p class="alert alert-danger">Sorry! Item not Found. Select Other combination.</p>';
		}
	}

	public function quotes_submit()
	{
		if($this->input->post('NEXT'))
		{
			if(empty($this->input->post('all_items')))
			{
				echo "<script>
					alert('Please select atleast one item.');
					window.location.href='".base_url('quotes')."';
				</script>";
			}
			else
			{
					$data = array(
					'house_type_id'			=> $this->input->post('bhk_select'),
					'budget_id'				=> $this->input->post('budget'),
					'budget_id'				=> $this->input->post('budget'),
					'all_items'				=> implode(',', $this->input->post('all_items')),
					'complete_date'			=> $this->input->post('complete_date'),
				);
			}

			$this->db->insert('quote_leads', $data);
			$insertid = $this->db->insert_id();

			$this->session->set_userdata('insertid', $insertid);

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
			}

			return redirect('quotes/more_info');
		}
		else
		{
			return redirect('quotes');
		}
	}

	public function more_info()
	{
		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/more-info');
		$this->load->view('front-end/includes/footer');
	}

	public function more_info_submit()
	{
		$data = array(
			'addl_desc'		=> $this->input->post('addl_desc')
		);


		$this->db->where('id', $this->session->userdata('insertid'));
		$this->db->update('quote_leads', $data);

		return redirect('quotes/details');
	}

	public function details()
	{
		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/details');
		$this->load->view('front-end/includes/footer');
	}

	public function details_submit()
	{
		$data = array(
			'full_name'			=> $this->input->post('name'),
			'address'			=> $this->input->post('address'),
			'city'				=> $this->input->post('city'),
			'country_code'		=> $this->input->post('country_code'),
			'mobile'			=> $this->input->post('mobile'),
			'email'				=> $this->input->post('email'),
			'created_datetime'	=> date('Y-m-d H:i:s')
		);

		$this->db->where('id', $this->session->userdata('insertid'));
		$this->db->update('quote_leads', $data);

		return redirect('quotes/thank_you');
	}

	public function thank_you()
	{
		$this->session->unset_userdata('insertid');
		$this->load->view('front-end/includes/header');
		$this->load->view('front-end/thank-you');
		$this->load->view('front-end/includes/footer');
	}
}