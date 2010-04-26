<?php
class Admin extends Controller {

	function index()
	{
		//if ($this->session->userdata('admin') == FALSE)
	        //redirect('dashboard/index');
	
		$this->load->view('header');
		$this->load->view('Admin/Admin_view');
		$this->load->view('footer');
	}
	
	function edit_event()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	    
		$this->load->model('Event_model');
        
		$name = $this->input->post('name');
        $price = $this->input->post('price');
		$type = $this->input->post('type');
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $address = $this->input->post('address');
        
		if($name && $price && $type && $description && $date && $address) {
            $this->Event_model->edit_event($name, $price, $type, $description, $date, $address);
		}
		$data['result'] = $this->Event_model->get_all_events();
		$this->load->view('header');
		$this->load->view('Event/Event_view', $data);
		$this->load->view('footer');
	}
	
	function edit_drink()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
	        
		$this->load->model('Drink_model');
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		
		$this->Drink_model->edit_drink($name, $description);
		
		$data['result'] = $this->Drink_model->get_all_drinks();
		$this->load->view('header');
		$this->load->view('Drink/Drink_view', $data);
		$this->load->view('footer');
	}
	
	function edit_bar()
	{
	    if ($this->session->userdata('admin') != TRUE)
	        redirect('dashboard/index');
            
		$this->load->model('Bar_model');
		$name = $this->input->post('name');
        
		$description = $this->input->post('description');
		$description = nl2br($description);
		$description = quotes_to_entities($description);
        $specials = $this->input->post('specials');
        $address = $this->input->post('address');
        $weburl = $this->input->post('weburl');
        
		if($name &&  $description && $specials && $address) {
		
			$this->Bar_model->edit_bar($name, $description, $specials, $address, $weburl);
		}
		$data['result'] = $this->Bar_model->get_all_bars();
		$this->load->view('header');
		$this->load->view('Bar/Bar_view', $data);
		$this->load->view('footer');
	}
}
?>