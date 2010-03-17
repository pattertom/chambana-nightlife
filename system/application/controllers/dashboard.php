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

	    $data['title']  = 'Dashboard | CU Nightlife';    
	    $this->load->view('dashboard_view', $data);
	}
}
?>