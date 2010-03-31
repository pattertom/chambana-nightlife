<?php
class Search extends Controller {

	function show_all()
	{
		$this->load->model('Search_model');
		$data['result'] = $this->Search_model->get_all_results();
		$this->load->view('header');
		$this->load->view('Search/Search_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('Search_model');
		$data['result'] = $this->Search_model->get_all_results();
		$this->load->view('header');
		$this->load->view('Search/Search_view', $data);
		$this->load->view('footer');
	}
	
	function searcher($name = "")
	{
		$this->load->model('Search_model');
		
		$name = $name ? $name : $this->input->post('drink');
		
		$data['result'] = $this->Search_model->search_all($name);
		$this->load->view('header');
		$this->load->view('Search/Search_view', $data);
		$this->load->view('footer');
	}
}
?>