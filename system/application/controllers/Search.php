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
		$this->load->view('header');
		$this->load->view('Search/search');
		$this->load->view('footer');
	}
	
	function specific_search()
	{
		$this->load->model('Search_model');
		$result = $this->input->post('searchIn');
		$bar = $event = $drink = FALSE;
		for($i = 0; $i < count($result); $i++)
		{
			if($result[$i] == 'bars') $bar = true;
			else if($result[$i] == 'events') $event = true;
			else if($result[$i] == 'drinks') $drink = true;
		}
        $search_term = $this->input->post('query');
        
		if($bar) $data['bar'] = $this->Search_model->search_bars($search_term);
		else $data['bar'] = false;
		if($event) $data['event'] = $this->Search_model->search_events($search_term);
		else $data['event'] = false;
		if($drink) $data['drink'] = $this->Search_model->search_drinks($search_term);
		else $data['drink'] = false;
		$this->load->view('header');
		$this->load->view('search/view_results', $data);
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