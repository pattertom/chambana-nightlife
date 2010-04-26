<?php
class Tag extends Controller {
	
	function index()
	{
	    
	}

	function insert()
	{       
		$this->load->view('header');
		$this->load->view('tag/insert');
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('user_model');
		$tag = $this->input->post('tag');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
		$email = $this->input->post('email');
		
		$this->user_model->create_drink($tag, $password, $password_confirm, $email);
		
		$data['result'] = $this->user_model->get_all_users();
		$this->load->view('header');
		$this->load->view('user/user_view', $data);
		$this->load->view('footer');
	}
	
	function delete($tag)
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->model('user_model');
		$this->user_model->delete_user($tag);
		$data['result'] = $this->user_model->get_all_users();
		$this->load->view('header');
		$this->load->view('user/user_view', $data);
		$this->load->view('footer');
	}
	
	function search($tag = "")
	{
		$this->load->model('tag_model');
		
        $tag = $tag ? $tag : $this->input->post('tag');
		
		$data['result'] = $this->user_model->search_user($tag);
		$this->load->view('header');
		$this->load->view('tag/tag_view', $data);
		$this->load->view('footer');
	}
}
?>