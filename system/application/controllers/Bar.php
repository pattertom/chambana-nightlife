<?php
class Bar extends Controller {

	function show_all()
	{
		$this->load->model('Bar_model');
		$data['result'] = $this->Bar_model->get_all_drinks();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('Bar_model');
		$data['result'] = $this->Bar_model->get_all_bars();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}

	function insert()
	{
		$this->load->view('header');
		$this->load->view('Bar/Bar_insert_form');
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('Bar_model');
		$name = $this->input->post('name');
        $rating = $this->input->post('rating');
		$description = $this->input->post('description');
        $specials = $this->input->post('specials');
        $address = $this->input->post('address');
        
		if($name && $rating && $description && $specials && $address) {
			$this->Bar_model->create_bar($name, $rating, $description, $specials, $address);
		}
		$data['result'] = $this->Bar_model->get_all_bars();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
	
	function delete($name)
	{
		$this->load->model('Bar_model');
		$this->Bar_model->delete_bar($name);
		$data['result'] = $this->Bar_model->get_all_bars();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
	
	function search($name)
	{
		$this->load->model('Bar_model');
		$data['result'] = $this->Bar_model->search_bar($name);
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
}
?>