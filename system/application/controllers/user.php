<?php
class User extends Controller {
	
	function index()
	{
		$this->load->model('user_model');
		$data['result'] = $this->user_model->get_all_users();
		$this->load->view('header');
		$this->load->view('user/user_view', $data);
		$this->load->view('footer');
	}

	function insert()
	{
		$this->load->view('header');
		$this->load->view('user/signup');
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('user_model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
		$email = $this->input->post('email');
		
		$this->user_model->create_drink($username, $password, $password_confirm, $email);
		
		$data['result'] = $this->user_model->get_all_users();
		$this->load->view('header');
		$this->load->view('user/user_view', $data);
		$this->load->view('footer');
	}

	function promote($username)
	{
		$this->load->model('user_model');
		$this->user_model->promote_user($username);
		$data['result'] = $this->user_model->get_all_users();
		$this->load->view('header');
		$this->load->view('user/user_view', $data);
		$this->load->view('footer');
	}
	
	function delete($username)
	{
		$this->load->model('user_model');
		$this->user_model->delete_user($username);
		$data['result'] = $this->user_model->get_all_users();
		$this->load->view('header');
		$this->load->view('user/user_view', $data);
		$this->load->view('footer');
	}
	
	function search($username = "")
	{
		$this->load->model('user_model');
		
        $username = $username ? $username : $this->input->post('username');
		
		$data['result'] = $this->user_model->search_user($username);
		$this->load->view('header');
		$this->load->view('user/user_view', $data);
		$this->load->view('footer');
	}
}
?>