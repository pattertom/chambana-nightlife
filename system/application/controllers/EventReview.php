<?php
class EventReview extends Controller {

	function show_all()
	{
		$this->load->model('EventReview_model');
		$data['result'] = $this->EventReview_model->get_all_event_reviews();
		$this->load->view('header');
		$this->load->view('EventReview/EventReview_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('EventReview_model');
		$data['result'] = $this->EventReview_model->get_all_event_reviews();
		$this->load->view('header');
		$this->load->view('EventReview/EventReview_view', $data);
		$this->load->view('footer');
	}
	
	function insert()
	{
		$this->load->view('header');
		$this->load->view('EventReview/EventReview_insert_form');
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('EventReview_model');
		$userName = $this->input->post('userName');
        $eventName = $this->input->post('eventName');
		$approvedByAdmin = $this->input->post('approvedByAdmin');
        $rating = $this->input->post('rating');
        $reviewContent = $this->input->post('reviewContent');
        $ts = $this->input->post('ts');
		
		if($userName && $eventName && $approvedByAdmin && $rating && $reviewContent && $ts) {
            $this->EventReview_model->create_event_review($userName, $barName, $approvedByAdmin,
                                            $rating, $reviewContent, $ts);
		}
		
		$data['result'] = $this->EventReview_model->get_all_event_reviews();
		$this->load->view('header');
		$this->load->view('EventReview/EventReview_view', $data);
		$this->load->view('footer');
	}
	
	function delete($name)
	{
		$this->load->model('EventReview_model');
		$this->Drink_model->delete_event_reviews($name);
		$data['result'] = $this->EventReview_model->get_all_event_reviews($name);
		$this->load->view('header');
		$this->load->view('EventReview/Event_review_view', $data);
		$this->load->view('footer');
	}
	
	function search($name = "")
	{
		$this->load->model('EventReview_model');
		
		$name = $name ? $name : $this->input->post('eventreview');
		
		$data['result'] = $this->EventReview_model->search_event_reviews($name);
		$this->load->view('header');
		$this->load->view('EventReview/EventReview_view', $data);
		$this->load->view('footer');
	}
}
?>