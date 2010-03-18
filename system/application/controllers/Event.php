<?php
class Event extends Controller {

	function show_all()
	{
		$this->load->model('Event_model');
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('Event_model');
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}

	function insert()
	{
		$this->load->view('header');
		$this->load->view('Event/Event_insert_form');
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('Event_model');
        
		$name = $this->input->post('name');
        $price = $this->input->post('price');
		$type = $this->input->post('type');
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $address = $this->input->post('address');
        
		if($name && $price && $type && $description && $date && $address) {
            $this->Event_model->create_event($name, $price, $type, $description, $date, $address);
		}
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function delete($id)
	{
		$this->load->model('Event_model');
		$this->Event_model->delete_event($id);
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function search($name)
	{
		$this->load->model('Event_model');
		$data['result'] = $this->Event_model->search_event($name);
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
}
?>