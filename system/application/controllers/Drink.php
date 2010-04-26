<?php
class Drink extends Controller {

	function show_all()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->model('Drink_model');
		$data['result'] = $this->Drink_model->get_all_drinks();
		$this->load->view('header');
		$this->load->view('Drink/Drink_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('Drink_model');
		$this->load->model('image_model');
		$data['result'] = $this->Drink_model->get_all_drinks_with_ratings();
		$images = array();
		foreach ($data['result']->result() as $row)
		{
			$images[] = $this->image_model->get_scale_image_string($row->image_id,150,150);
		}
		$data['images'] = $images;
		$this->load->view('header');
		$this->load->view('Drink/Drink_view_all', $data);
		$this->load->view('footer');
	}

	function insert()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->view('header');
		$this->load->view('Drink/Drink_insert_form');
		$this->load->view('footer');
	}
	
	function viewDrink($name)
	{
		$this->load->model('Drink_model');
		$this->load->model('drink_review_model');
		$this->load->model('image_model');
		$data['result'] = $this->Drink_model->get_drink($name);
		$drink = $data['result']->row();
		$data['image'] = $this->image_model->get_scale_image_string($drink->image_id,300,500);
        $data['reviews'] = $this->drink_review_model->get_reviews_for_drink($name);
		$data['rating'] = $this->drink_review_model->get_average_for_drink($name);
		$data['other_drinks'] = $this->Drink_model->get_drinks_also_liked($name);
		/* User has not just submitted a review, set reviewed to false
		* so that it displays the review form */
		$data['reviewed'] = FALSE;
		$this->load->view('header');
		$this->load->view('Drink/Drink_single_view', $data);
		$this->load->view('footer');
	}
	
	function create()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->model('Drink_model');
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$this->Drink_model->create_drink($name, $description);
		
		$data['result'] = $this->Drink_model->get_all_drinks();
		$this->load->view('header');
		$this->load->view('Drink/Drink_view', $data);
		$this->load->view('footer');
	}
	
	function delete($name)
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->model('Drink_model');
		$this->Drink_model->delete_drink($name);
		$data['result'] = $this->Drink_model->get_all_drinks();
		$this->load->view('header');
		$this->load->view('Drink/Drink_view', $data);
		$this->load->view('footer');
	}
	
	function search($name = "")
	{
		$this->load->model('Drink_model');
		
		$name = $name ? $name : $this->input->post('drink');
		
		$data['result'] = $this->Drink_model->search_drink($name);
		$this->load->view('header');
		$this->load->view('Drink/Drink_view', $data);
		$this->load->view('footer');
	}
	
	function view_drink_reviewed($name)
	{
		$this->load->model('Drink_model');
		$this->load->model('drink_review_model');
		$this->load->model('image_model');
		$data['result'] = $this->Drink_model->get_drink($name);
		$drink = $data['result']->row();
		$data['image'] = $this->image_model->get_scale_image_string($drink->image_id,300,500);
        $data['reviews'] = $this->drink_review_model->get_reviews_for_drink($name);
		$data['rating'] = $this->drink_review_model->get_average_for_drink($name);
		$data['other_drinks'] = $this->Drink_model->get_drinks_also_liked($name);
		/* User has not just submitted a review, set reviewed to false
		* so that it displays the review form */
		$data['reviewed'] = TRUE;
		$this->load->view('header');
		$this->load->view('Drink/Drink_single_view', $data);
		$this->load->view('footer');
	}
}
?>