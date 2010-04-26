<?php
class BarSpecial extends Controller {

	function show_all()
	{
	    if ($this->session->userdata('admin') == FALSE)
	        redirect('dashboard/index');
	        
		$this->load->model('BarSpecial_model');
		$data['result'] = $this->BarSpecial_model->get_all_barspecials();
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
	    if ($this->session->userdata('admin') == FALSE)
	        redirect('dashboard/index');
	        
		$this->load->model('BarSpecial_model');
		$data['result'] = $this->BarSpecial_model->get_all_barspecials();
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_view', $data);
		$this->load->view('footer');
	}

	function insert()
	{
	    if ($this->session->userdata('admin') == FALSE)
	        redirect('dashboard/index');
	        
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_insert_form');
		$this->load->view('footer');
	}
	
	function create()
	{
	    if ($this->session->userdata('admin') == FALSE)
	        redirect('dashboard/index');
	        
		$this->load->model('BarSpecial_model');
        $barName = $this->input->post('barName');
		$isWeekly = $this->input->post('isWeekly');
		$weeklyDay = $this->input->post('weeklyDay');
        $description = $this->input->post('description');
        $ts = $this->input->post('ts');
        
		if($barName && $description) {
            $this->BarSpecial_model->create_barspecial($barName, $isWeekly,
                                            $weeklyDay, $description, $ts);
		}
		$data['result'] = $this->BarSpecial_model->get_all_barspecials();
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_view', $data);
		$this->load->view('footer');
	}
	
	function delete($id)
	{
	    if ($this->session->userdata('admin') == FALSE)
	        redirect('dashboard/index');
	        
		$this->load->model('BarSpecial_model');
		$this->BarSpecial_model->delete_barspecial($id);
		$data['result'] = $this->BarSpecial_model->get_all_barspecials();
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_view', $data);
		$this->load->view('footer');
	}
	
	function search($name)
	{
		$this->load->model('BarReview_model');
		$data['result'] = $this->BarReview_model->search_barreview($name);
		$this->load->view('header');
		$this->load->view('BarReview/BarReview_view', $data);
		$this->load->view('footer');
	}
}
?>