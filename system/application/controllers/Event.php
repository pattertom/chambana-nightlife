<?php
class Event extends Controller {

	function show_all()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->model('Event_model');
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('Event_model');
		$this->load->model('image_model');
		$data['result'] = $this->Event_model->get_upcoming_events();
		$images = array();
		foreach ($data['result']->result() as $row)
		{
			$images[] = $this->image_model->get_scale_image_string($row->image_id,150,150);
		}
		$data['images'] = $images;
		$this->load->view('header');
		$this->load->view('Event/Event_view_all', $data);
		$this->load->view('footer');
	}

	function insert()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->view('header');
		$this->load->view('Event/Event_insert_form');
		$this->load->view('footer');
	}
	
	function create()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	    
		$this->load->model('Event_model');
        
		$name = $this->input->post('name');
        $price = $this->input->post('price');
		$type = $this->input->post('type');
		$tags = $this->input->post('tags');
		$tags = explode(",", $tags);
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $address = $this->input->post('address');
        
		if($name && $price && $type && $description && $date && $address) {
            $this->Event_model->create_event($name, $price, $type, $description, $date, $address, $tags);
		}
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function delete($id)
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->model('Event_model');
		$this->Event_model->delete_event($id);
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function search($name)
	{
		$this->load->model('Event_model');
		$data['result'] = $this->Event_model->search_event($name);
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function view_event($id)
	{
		$this->load->model('Event_model');
		$this->load->model('EventReview_model');
		$this->load->model('image_model');
		$this->load->model('tag_model');
		$data['result'] = $this->Event_model->get_event($id);
		$data['tags'] = $this->tag_model->get_all_tags_from($id);
		$event = $data['result']->row();
		$data['image'] = $this->image_model->get_scale_image_string($event->image_id,300,500);
		$data['reviews'] = $this->EventReview_model->get_reviews_for_event($id);
		$data['reviewed'] = FALSE;
		$this->load->view('header');
		$this->load->view('Event/Event_single_view', $data);
		$this->load->view('footer');
	}
	
	function view_event_reviewed($id)
	{
		$this->load->model('Event_model');
		$this->load->model('EventReview_model');
		$this->load->model('image_model');
		$data['result'] = $this->Event_model->get_event($id);
		$event = $data['result']->row();
		$data['image'] = $this->image_model->get_scale_image_string($event->image_id,300,500);
		$data['reviews'] = $this->EventReview_model->get_reviews_for_event($id);
		$data['reviewed'] = TRUE;
		$this->load->view('header');
		$this->load->view('Event/Event_single_view', $data);
		$this->load->view('footer');
	}
	
	function view_tag($tag)
	{
		$this->load->model('Event_model');
		$this->load->model('image_model');
		$this->load->model('tag_model');
		$data['result'] = $this->tag_model->get_all_events_with($tag);
		$images = array();
		foreach ($data['result']->result() as $row)
		{
			$images[] = $this->image_model->get_scale_image_string($row->image_id,150,150);
		}
		$data['images'] = $images;
		$this->load->view('header');
		$this->load->view('Event/Event_view_all', $data);
		$this->load->view('footer');
	}
}
?>