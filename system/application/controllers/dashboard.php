<?php
class Dashboard extends Controller {

	function Dashboard()
	{
		parent::Controller();	
	}

	function index()
	{
		$this->load->model('BarSpecial_model');
		$this->load->model('Event_model');
		$data['result'] = $this->BarSpecial_model->get_todays_specials();
		$data['events'] = $this->Event_model->get_upcoming_events();
		$data['title']  = 'Dashboard | CU Nightlife';   
	    $this->load->view('Dashboard/dashboard_view', $data);
	}
	
	function adminApprovals()
	{
		if ($this->session->userdata('admin') == FALSE)
	    {
	        redirect('/index.php');
	    }
	
		$this->load->model('BarReview_model');
		$data['barreviews'] = $this->BarReview_model->get_non_approved_reviews();
		$this->load->model('EventReview_model');
		$data['eventreviews'] = $this->EventReview_model->get_non_approved_reviews();
		$this->load->model('drink_review_model');
		$data['drinkreviews'] = $this->drink_review_model->get_non_approved_reviews();
		$this->load->view('header');
		$this->load->view('Dashboard/admin_approvals', $data);
		$this->load->view('footer');
	}
}
?>