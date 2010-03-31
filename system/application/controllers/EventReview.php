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
	
	function create($id)
	{
		$this->load->model('EventReview_model');
		$userName = $this->input->post('userName');
        $event_id = $this->input->post('event_id');
        $rating = $this->input->post('rating');
        $reviewContent = $this->input->post('reviewContent');
        $reviewContent = nl2br($reviewContent);
		$reviewContent = quotes_to_entities($reviewContent);
		
		if($userName && $event_id && $rating && $reviewContent) {
            $this->EventReview_model->create_event_review($userName, $event_id, $rating, $reviewContent);
		}
		
		$data['result'] = $this->EventReview_model->get_all_event_reviews();
		redirect('event/view_event_reviewed/'.$id);
	}
	
	function delete($id)
	{
		$this->load->model('EventReview_model');
		$this->EventReview_model->delete_event_reviews($id);
		$data['result'] = $this->EventReview_model->get_all_event_reviews($id);
		redirect('dashboard/adminApprovals');
	}
	
	function approve($id)
	{
		$this->load->model('EventReview_model');
		$this->EventReview_model->approve_event_review($id);
		$data['result'] = $this->EventReview_model->get_all_event_reviews();
		redirect('dashboard/adminApprovals');
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