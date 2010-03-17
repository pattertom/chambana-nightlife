<?php
class Login extends Controller {

	function Login()
	{
		parent::Controller();
        $this->load->database();
        $this->load->helper('security');
	}

	function index()
	{
	    if ($this->session->userdata('logged_in') == TRUE)
	    {
	        redirect('dashboard/index');
	    }

	    $data['title'] = 'CU Nightlife';
	    $data['username'] = array('id' => 'username', 'name' => 'username');
	    $data['password'] = array('id' => 'password', 'name' => 'password');	        
	    $this->load->view('login/login_view', $data);
	}

	function process_login()
	{
	    
	    $this->load->model('login_model');
	    $username = $this->input->post('username');    
	    $password  = $this->input->post('password');
		
		$this->login_model->validate_login($username, $password);
		
		$this->load->view('header');
		$this->load->view('login/login_view');
		$this->load->view('footer');
	}

	function logout()
	{
	    $this->session->sess_destroy();

	    redirect('login/index');
	}
}
?>