<?php
class Dashboard extends Controller {

	function Dashboard()
	{
		parent::Controller();	
	}

	function index()
	{
	    if ($this->session->userdata('logged_in') != TRUE)
	    {
	        redirect('login/index');
	    }
 
		$this->load->model('BarSpecial_model');
		$this->load->model('Event_model');
		$data['result'] = $this->BarSpecial_model->get_todays_specials();
		$data['events'] = $this->Event_model->get_all_events();
		$data['title']  = 'Dashboard | CU Nightlife';   
	    $this->load->view('Dashboard/dashboard_view', $data);
	}
}
?>