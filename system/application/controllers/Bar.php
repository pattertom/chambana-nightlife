<?php
class Bar extends Controller {

	/**
	 * Show_all
	 *
	 * Display every bar on a single page
	 */	
	function show_all()
	{
		$this->load->model('Bar_model');
		$data['result'] = $this->Bar_model->get_all_bars();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
	
	/**
	 * index
	 *
	 * Display every bar on a single page
	 */	
	function index()
	{
		$this->load->model('Bar_model');
		$this->load->model('image_model');
		$data['result'] = $this->Bar_model->get_all_bars_with_ratings();
		$images = array();
		foreach ($data['result']->result() as $row)
		{
			$images[] = $this->image_model->get_scale_image_string($row->image_id,200,500);
		}
		$data['images'] = $images;
		$this->load->view('header');
		$this->load->view('Bar/Bar_view_all', $data);
		$this->load->view('footer');
	}

	/**
	 * insert
	 *
	 * Displays the form for creating a new bar
	 */	
	function insert()
	{
		$this->load->view('header');
		$this->load->view('Bar/Bar_insert_form');
		$this->load->view('footer');
	}
	
	/**
	 * viewBar
	 *
	 * This is the main display page for a bar.
	 * It the contents of a single bar tuple
	 * from the bar table as well as its specials
	 * and user reviews.
	 */		
	function viewBar($name)
	{
		$this->load->model('Bar_model');
		$this->load->model('BarSpecial_model');
		$this->load->model('BarReview_model');
		$this->load->model('image_model');
		$data['result'] = $this->Bar_model->get_bar($name);
		$bar = $data['result']->row();
		$data['image'] = $this->image_model->get_scale_image_string($bar->image_id,300,500);
		$data['specials'] = $this->BarSpecial_model->get_bar_specials($name);
		$data['reviews'] = $this->BarReview_model->get_reviews_for_bar($name);
		$data['rating'] = $this->BarReview_model->get_average_for_bar($name);
		/* User has not just submitted a review, set reviewed to false
		* so that it displays the review form */
		$data['reviewed'] = FALSE;
		$this->load->view('header');
		$this->load->view('Bar/Bar_single_view', $data);
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('Bar_model');
		$name = $this->input->post('name');
        $rating = $this->input->post('rating');
		$description = $this->input->post('description');
		$description = nl2br($description);
		$description = quotes_to_entities($description);
        $specials = $this->input->post('specials');
        $address = $this->input->post('address');
        
		if($name && $rating && $description && $specials && $address) {
			$this->Bar_model->create_bar($name, $rating, $description, $specials, $address);
		}
		$data['result'] = $this->Bar_model->get_all_bars();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
	
	function delete($name)
	{
		$this->load->model('Bar_model');
		$this->Bar_model->delete_bar($name);
		$data['result'] = $this->Bar_model->get_all_bars();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
	
	function search($name)
	{
		$this->load->model('Bar_model');
		$data['result'] = $this->Bar_model->search_bar($name);
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
	
	function viewBarReviewed($name)
	{
		$this->load->model('Bar_model');
		$this->load->model('BarSpecial_model');
		$this->load->model('BarReview_model');
		$this->load->model('image_model');
		$data['result'] = $this->Bar_model->get_bar($name);
		$bar = $data['result']->row();
		$data['image'] = $this->image_model->get_scale_image_string($bar->image_id,300,500);
		$data['specials'] = $this->BarSpecial_model->get_bar_specials($name);
		$data['reviews'] = $this->BarReview_model->get_reviews_for_bar($name);
		$data['rating'] = $this->BarReview_model->get_average_for_bar($name);
		/* User has not just submitted a review, set reviewed to false
		* so that it displays the review form */
		$data['reviewed'] = TRUE;
		$this->load->view('header');
		$this->load->view('Bar/Bar_single_view', $data);
		$this->load->view('footer');
	}
}
?>